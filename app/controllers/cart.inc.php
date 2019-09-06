<?php

function displayCart() {
  global $movies;
  displayHeader("Cart");
  displayNavigation("Cart");
  include(__DIR__ . "/../../resources/views/cart/cart.inc.php");
  displaySideSections();
  displayFooter();
}

function getCart() {
  $cart = new Cart();
  if($cart->booking_item)
  {
    echo('<h2>Your Cart</h2>' . "\n");
    echo('<table style="width: 100%;">' . "\n");
    $last = -1;
    $total = 0;
    foreach($cart->booking_item as $key => $item)
    {
      $screening = $item->screening();
      $seat = $item->seat();
      $ticket = $item->ticket();
      $movie = $screening->movie();
      if($last != $screening->id)
      {
        echo('<tr>' . "\n");
        echo('<td colspan="3"><b>' . $movie->name . '</b></td>' . "\n");
        echo('</tr>' . "\n");
        echo('<tr>' . "\n");
        echo('<td colspan="4">' . $screening->niceDate() . ' @  ' . $screening->time . '</td>' . "\n");
        echo('</tr>' . "\n");
      }
      echo('<tr>' . "\n");
      echo('<td>1 x ' . $seat->ticket_type . ' (' . $ticket->name . ')</td><td>Seat: ' . $seat->row . $seat->seat . '</td><td style="text-align: right;">$' . money_format('%.2n', $item->price) . '</td><td><a href="javascript:void(0);" onclick="removeFromCart(' . $key . ');">X</a></td>' . "\n");
      echo('<script>' . "\n");
      echo('var screening = $("#screening_id");' . "\n");
      echo('var seat = $("img[src=\'public/images/map/Seats_Green_' . $seat->map_index . '.gif\']");' . "\n");
      echo('if(seat && screening) {' . "\n");
      echo('if(screening.val() == "' . $screening->id . '") {' . "\n");
      echo('seat.attr("src", "public/images/map/Seats_' . $seat->map_index . '.gif");' . "\n");
      echo('}' . "\n");
      echo('}' . "\n");
      echo('</script>' . "\n");
      echo('</td>' . "\n");
      echo('</tr>' . "\n");
      $total = $total + $item->price;
      $last = $screening->id;
    }
    echo('<tr>' . "\n");
    echo('<td style="text-align: right;" colspan="2"><b>Total:</b></td><td style="text-align: right;">$' . money_format('%.2n', $total) . '</td><td></td>' . "\n");
    echo('</tr>' . "\n");
    echo('</table>' . "\n");
    echo('<div style="text-align: right; width: 100%;"><a class="btn" href="#checkout">Checkout</a></div>' . "\n");
    include(__DIR__ . '/../../resources/views/cart/checkout.inc.php');
  }else{
    echo('FALSE');
  }
}

function addToCart() {
  $cart = new Cart();
  $screening_seat = ScreeningSeat::find(intval($_POST['screening_seat_id']));
  $ticket = TicketType::find(intval($_POST['ticket_id']));
  $item = new BookingItem(0, $screening_seat->screening()->id, $screening_seat->seat()->id, $ticket->id, $screening_seat->calculate_price($ticket));
  $cart->addItem($item);
  $cart->save();
  echo('TRUE');
}

function removeFromCart() {
  $cart = new Cart();
  $items = [];
  foreach($cart->booking_item as $key => $item)
  {
    if($key != intval($_POST['id']))
    {
      array_push($items, $item);
    }
  }
  $cart->booking_item = $items;
  $cart->save();
}

function performCheckout()
{

  $cart = new Cart();

  if(filter_var($_POST['email_address'], FILTER_VALIDATE_EMAIL)) {
    if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['phone_number'])) {
      $customer = new Customer($_POST['first_name'], $_POST['last_name'], $_POST['email_address'], $_POST['phone_number']);
    }
  }
  $customer->save();
  $voucherCode = $_POST['movie_voucher'];
  $pattern = '/^[0-9]{5}\-[0-9]{5}\-[A-Z]{2}$/';
  if(preg_match($pattern, $voucherCode))
  {
    $voucherCode = str_replace('-', '', $voucherCode);
    $checkSum1 = (($voucherCode[0] * $voucherCode[1] + $voucherCode[2]) * $voucherCode[3] + $voucherCode[4]) % 26;
    $checkSum2 = (($voucherCode[5] * $voucherCode[6] + $voucherCode[7]) * $voucherCode[8] + $voucherCode[9]) % 26;
    if($checkSum1 === (ord($voucherCode[10]) - 65))
    {
      if($checkSum2 === (ord($voucherCode[11]) - 65))
      {
        $voucherCode = $_POST['movie_voucher'];
      } else {
        $voucherCode = null;
      }
    } else {
      $voucherCode = null;
    }
  } else {
    $voucherCode = null;
  }

  $booking = new Booking($customer->id, $voucherCode);
  $booking->save();

  foreach($cart->booking_item as $item)
  {
    ScreeningSeat::bookSeat($item->screening_id, $item->seat_id);
    $booking_item = new BookingItem($booking->id, $item->screening_id, $item->seat_id, $item->ticket_id, $item->price);
    $booking_item->save();
  }

  $_SESSION['persistant'] = null;

  header('Location: ' . urlFor('booking', 'confirmBooking', $booking->id, "&surname=" . $customer->last_name));

}

function render() {
  if(isset($_GET["page"])) {
    $func = decodeFunctionName($_GET["page"]);
    $func();
  } else {
    displayCart();
  }

}
?>
