<section class="content">
  <h1>Purchase Tickets</h1>
  <div id="movie-selection">
    <label for="movie">
      <span>Movie</span>
      <select id="movie">
        <option value="0">Select a movie...</option>
<?php 
foreach($movies as $movie)
{
?>
        <option value="<?php echo($movie->id); ?>"><?php echo($movie->name); ?></option>
<?php
}
?>
      </select>
    </label>
    <div class="sessions" id="sessions" style="display: none;">
    </div>
  </div>
  <div id="seating" style="display: none;">
  </div>
		<div class="modal" id="ticket_type" aria-hidden="true">
			<div class="modal-dialog">
        <div class="modal-header">
          <div style="width: 50%; display: inline-block;">
            <h3>Select a Ticket Option</h3>
          </div>
          <div style="width: 49%; display: inline-block; text-align: right;">
            <div style="width: 100%; text-align: right;">
              <a href="#close" class="btn">Close</a>
            </div>
          </div>
				</div>
        <div class="modal-body" id="ticket_options">
        </div>
      </div>
    </div>
</section>
<script>
<?php
if(isset($_GET['movie_id']))
{
?>
$("#movie").val('<?php echo($_GET['movie_id']); ?>');
$.post(
  "?section=ticket&page=get_screenings",
  {movie_id: <?php echo($_GET['movie_id']); ?>},
  function(returnedData, status) {
    if(status=="success") {
      $("#sessions").html(returnedData);
      $("#sessions").show();
    } else {
      alert("Unable to get screening times.");
    }
});
<?php
  if(isset($_GET['screening_id']))
  {
?>
$.post(
  "?section=ticket&page=get_seats",
  {screening_id: <?php echo($_GET['screening_id']); ?>},
  function(returnedData, status) {
    if(status=="success") {
      $("#seating").html(returnedData);
      $("#seating").show();
      $("#movie-selection").hide();
    } else {
      alert("Unable to get screening information.");
    }
});
<?php
  }
?>
<?php
}
?>

$("#movie").change(function(){
  $.post(
    "?section=ticket&page=get_screenings",
    {movie_id: $("#movie").val()},
    function(returnedData, status) {
      if(status=="success") {
        $("#sessions").html(returnedData);
        $("#sessions").show();
      } else {
        alert("Unable to get screening times.");
      }
  });
});

function showTickets(seatId){
  $.post(
    "?section=ticket&page=get_tickets",
    {screening_seat_id: seatId},
    function(returnedData, status) {
      if(status=="success")
      {
        $("#ticket_options").html(returnedData);
      } else {
        alert("Unable to get ticket options.");
      }
    });
}

function addToCart(seatId, ticketId){
  $.post(
    "?section=cart&page=add_to_cart",
    {screening_seat_id: seatId, ticket_id: ticketId},
    function(returnedData, status){
      if(status=="success")
      {
        if(returnedData.trim() == "TRUE")
        {
          getCart();
        }
      } else {
        alert('Unable to add item to your cart.');
      }
    });
}

</script>
