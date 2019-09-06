<html>
<head>
    <title>Tickets Display - Silverado Cinema</title>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=PT%20Sans%20Caption">
    <!-- Viewport obtained from: http://www.w3schools.com/css/css_rwd_viewport.asp -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin-top: 5px;
            margin-bottom: 5px;
            margin-right: 5px;
            margin-left: 5px;
            /* Extended fonts concept obtained from:
             * https://developers.google.com/fonts/docs/getting_started */
            font-family: 'PT Sans Caption', serif;
        }
        hr {
            border: none;
            border-top: 3px dotted #000000;
            height: 1px;
        }
    </style>
</head>
<body>
<div>
    <div style="text-align: center;">
        <img src="public/images/logo.png">
    </div>
    <h1 style="text-align: center;">Your Tickets</h1>
    <p>
        Please bring this document with you to the cinema.
    </p>
    <p>Booking Number:</p>
    <h2>
        <?php echo(str_pad($booking->id, 6, "0", STR_PAD_LEFT)); ?>
    </h2>
    <h2>
        Customer Details
    </h2>
    <div style="text-indent: 20px">
        <p>
            <b>Name: </b> <?php  echo($customer->first_name . ' ' . $customer->last_name); ?>
        </p>
        <p>
            <b>Email Address: </b> <?php echo($customer->email_address); ?>
        </p>
        <p>
            <b>Phone Number: </b> <?php echo($customer->phone); ?>
        </p>
        <?php
        if($booking->voucher_id) {
            ?>
            <p>
                <b>Voucher Number: </b> <?php echo($booking->voucher_id); ?>
            </p>
            <?php
        }
        ?>
    </div>
    <hr>
<?php
    foreach($booking_items as $item) {
        if($item->booking_id == $booking->id) {
            $screening = $item->screening();
            $seat = $item->seat();
            $ticket = $item->ticket();
            $movie = $screening->movie();
?>
            <table width="100%">
                <tr>
                    <td>
                        <h2><?php echo($movie->name); ?></h2>
                    </td>
                    <td>
                        <h3><?php echo($screening->niceDate() . ' at ' . $screening->time); ?></h3>
                    </td>
                    <td rowspan="4" style="text-align: right;">
                        <img src='https://chart.googleapis.com/chart?cht=qr&chl=http%3A%2F%2Ftitan.csit.rmit.edu.au%2F~s3550425%2Fwp%2Fa3%2Findex.php%3Fsection%3Dbooking%26page%3Dprint_ticket%26id%3D<?php echo($booking->id); ?>%26surname%3D<?php echo($customer->last_name); ?>&chs=180x180&choe=UTF-8&chld=L|2' alt=''>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>Ticket Type: <?php echo($seat->ticket_type); ?> (<?php echo($ticket->name); ?>)</td>
                    <td>Price: $<?php echo(money_format('%.2n', $item->price)); ?></td>
                </tr>
                <tr>
                    <td>Seat: <h2><?php echo($seat->row . $seat->seat); ?></h2></td>
                    <td></td>
                </tr>
            </table>
            <hr>
<?php
            $total += $item->price;
        }
    }
    echo('<h2><b>Total: </b>$' . money_format('%.2n', $total) . '</h2>');
    if($booking->voucher_id) {
        echo('<h5><b>Total after Meal and Movie Deal Discount: </b>$' . money_format('%.2n', ($total * 0.8)) . '</h5>');
    }
?>
</div>
<script>
    window.print();
</script>
</body>
</html>
