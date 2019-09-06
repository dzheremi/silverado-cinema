<?php
function displayTicketForm() {
  displayHeader("Movie Tickets");
  displayNavigation("Tickets");
  $movies = Movie::findAll();
  include(__DIR__ . "/../../resources/views/forms/tickets.inc.php");
  displaySideSections();
  displayFooter();
}

function getScreenings() {
  $movie = Movie::find(intval($_POST['movie_id']));
  $screenings = $movie->screenings();
  echo('<label for="screening">' . "\n");
  echo('<span>Screening Time</span>' . "\n");
  echo('<select id="screening">' . "\n");
  echo('<option value="0">Select a screening time...</option>' . "\n");
  foreach($screenings as $screening) {
    echo('<option value="' . $screening->id . '">' . $screening->niceDate() . ' - '. $screening->time . '</option>' . "\n");
  }
  echo('</select>' . "\n");
  echo('</label>' . "\n");
  echo('<script>' . "\n");
  echo('$("#screening").change(function(){' . "\n");
  echo('$.post(' . "\n");
  echo('"?section=ticket&page=get_seats",' . "\n");
  echo('{screening_id: $("#screening").val()},' . "\n");
  echo('function(returnedData, status) {' . "\n");
  echo('if(status=="success") {' . "\n");
  echo('$("#seating").html(returnedData);' . "\n");
  echo('$("#seating").show();' . "\n");
  echo('$("#movie-selection").hide();' . "\n");
  echo('} else {' . "\n");
  echo('alert("Unable to get screening information.");' . "\n");
  echo('}' . "\n");
  echo('});' . "\n");
  echo('});' . "\n");
  echo('</script>' . "\n");
}

function getSeats() {
  $screening = Screening::find(intval($_POST['screening_id']));
  $seats = $screening->screening_seats();
  $movie = $screening->movie();
  include(__DIR__ . '/../../resources/views/forms/section/seat_selection.inc.php');
}

function getTickets() {
  echo('<div style="width: 100%; text-align: center;">');
  $seat = ScreeningSeat::find(intval($_POST['screening_seat_id']));
  $ticket_types = $seat->seat()->ticket_types();
  echo('<h3>' . $seat->seat()->ticket_type . '</h3><br/>');
  foreach($ticket_types as $ticket) {
    echo('<a href="#close" onclick="addToCart(' . $seat->id . ', ' .  $ticket->id. ');" class="btn" style="width: 200px;">' . $ticket->name . ' - $' . money_format('%.2n', $seat->calculate_price($ticket)) . '</a><br/><br/>');
  }
  echo('</div>');
}

function render() {
  if (isset($_GET["page"])) {
    $func = decodeFunctionName($_GET["page"]);
    $func();
  } else {
    displayTicketForm();
  }
}
?>
