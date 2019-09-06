<html>
<head>
    <title>Tickets Display - Silverado Cinema</title>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT%20Sans%20Caption">
    <link rel="stylesheet" type="text/css" href="../../../public/css/style.css">
    <!-- Viewport obtained from: http://www.w3schools.com/css/css_rwd_viewport.asp -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
    <style>
        #non-printable {
            display: inline;
        }
        @media print {
            #non-printable {
                display: none;
            }
        }
    </style>
</head>
<body class="ticket-background">
    <div id="non-printable">
        <?php
            displayNavigation('Tickets');
        ?>
    </div>
    <h3>
        Silverado Cinema
    </h3>
    <h4>Your Tickets</h4>
    <p>
        Please print the page and bring it with you to the cinema
    </p>
    <hr>
    <h4>
        Customer Details
    </h4>
    <div style="text-indent: 20px">
        <p>
            <b>Name: </b> <?php echo($customer->first_name . ' ' . $customer->last_name); ?>
        </p>
        <p>
            <b>Email Address: </b> <?php echo($customer->email_address); ?>
        </p>
        <p>
            <b>Phone Number: </b> <?php echo($customer->phone); ?>
        </p>
<?php
        if($voucher_id != null) {
?>
            <p>
                <b>Voucher Number: </b> <?php echo($voucher_id); ?>
            </p>
<?php
        }
?>
    </div>
    <hr>
    <?php
    foreach($cart->booking_item as $item) {
        $screening = $item->screening();
        $seat = $item->seat();
        $ticket = $item->ticket();
        $movie = $screening->movie();
        if($last != $screening->id)
        {
                echo('<h4>' . $movie->name . '</h4>');
                echo('<h5 style="text-indent: 20px;">' . $screening->niceDate() . ' at ' . $screening->time . '</h5>');
        }
            echo('<p style="text-indent: 20px;">1 x ' . $seat->ticket_type . ' (' . $ticket->name . ') - $' . $item->price . '</p>');
            echo('<p style="text-indent: 40px;"> Seat: ' . $seat->row . $seat->seat . '</p>');
        $total = $total + $item->price;
        $last = $screening->id;
    }
    echo('<h5><b>Total: </b>$' . $total . '</h5>');
    ?>
</body>
</html>