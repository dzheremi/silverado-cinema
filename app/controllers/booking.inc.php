<?php

function printTicket() {
    if(isset($_GET['id']) && isset($_GET['surname'])) {
        if($booking = Booking::find(intval($_GET['id']))) {
            $booking_items = $booking->booking_items();
            $customer = $booking->customer();
            if(strtoupper($_GET['surname']) === strtoupper($customer->last_name)) {
              include(__DIR__ . '/../../resources/views/booking/tickets.inc.php');
            } else {
                header('Location: ' . urlFor('information', 'displayHome'));
            }
        } else {
            header('Location: ' . urlFor('information', 'displayHome'));
        }
    } else {
        header('Location: ' . urlFor('information', 'displayHome'));
    }
}

function confirmBooking() {
    if(isset($_GET['id']) && isset($_GET['surname'])) {
        if($booking = Booking::find(intval($_GET['id']))) {
            $booking_items = $booking->booking_items();
            $customer = $booking->customer();
            if(strtoupper($_GET['surname']) === strtoupper($customer->last_name)) {
                displayHeader("Booking Confirmation");
                displayNavigation("Tickets");
                include(__DIR__ . '/../../resources/views/booking/confirmation.inc.php');
                displayFooter();
            } else {
                header('Location: ' . urlFor('information', 'displayHome'));
            }
        }
    } else {
      header('Location: ' . urlFor('information', 'displayHome'));
    }
}

function render() {
    if(isset($_GET["page"])) {
        $func = decodeFunctionName($_GET["page"]);
        $func();
    } else {
        displayHome();
    }
}
?>
