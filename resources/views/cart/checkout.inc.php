<div class="modal" id="checkout" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-header">
            <div style="width: 50%; display: inline-block;">
                <h3>Checkout</h3>
            </div>
            <div style="width: 49%; display: inline-block; text-align: right;">
                <div style="width: 100%; text-align: right;">
                    <a href="#close" class="btn">Close</a>
                </div>
            </div>
        </div>
        <div class="modal-body">
            <table style="width: 100%;">
            <?php
                $last = -1;
                $total = 0;
                foreach($cart->booking_item as $item)
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
                    echo('<td colspan="4">' . $screening->niceDate() . ' @ ' . $screening->time . '</td>' . "\n");
                    echo('</tr>' . "\n");
                }
                echo('<tr>' . "\n");
                    echo('<td>1 x ' . $seat->ticket_type . ' (' . $ticket->name . ')</td><td>Seat: ' . $seat->row . $seat->seat . '</td><td style="text-align: right;" colspan="2">$' . money_format('%.2n', $item->price) . '</td>' . "\n");
                    echo('</tr>' . "\n");
                $total = $total + $item->price;
                $last = $screening->id;
                }
                echo('<tr>' . "\n");
                    echo('<td style="text-align: right;" colspan="2"><b>Total:</b></td><td style="text-align: right;" colspan="2">$' . money_format('%.2n', $total) . '</td>' . "\n");
                    echo('</tr>' . "\n");
                echo('</table>' . "\n");
            ?>
            <form method="POST" name="form" action="?section=cart&page=perform_checkout">
                <table width="80%">
                    <tr>
                        <td><b>First Name</b></td>
                        <td><input type="text" name="first_name" pattern="[A-Za-z]{1,}" required></td>
                    </tr>
                    <tr>
                        <td><b>Last Name</b></td>
                        <td><input type="text" name="last_name" pattern="[A-Za-z]{1,}" required></td>
                    </tr>
                    <tr>
                        <td><b>Email Address</b></td>
                        <td><input type="email" name="email_address" required></td>
                    </tr>
                    <tr>
                        <td><b>Phone Number</b></td>
                        <td><input type="text" name="phone_number" pattern="[0-9]{10}" required></td>
                    </tr>
                    <tr>
                        <td><b>Meal and Movie Deal Voucher</b></td>
                        <td><input type="text" name="movie_voucher" pattern="[0-9]{5}-[0-9]{5}-[A-Z]{2}"></td>
                    </tr>
                </table>
                <div style="text-align: right;">
                  <input type="submit" style="width: 20%;" name="Confirm Purchase" class="btn"></input>
                </div>
            </form>
        </div>
    </div>
</div>
