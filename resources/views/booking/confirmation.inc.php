<section class="content">
    <h3>Your booking has been successful!</h3>
    <p>Please pay for the tickets at the counter when you arrive.</p>
    <p>Your booking number is <b><?php echo(str_pad($booking->id, 6, "0", STR_PAD_LEFT)); ?></b>, please note this down in case you need to re-print your tickets.</p>
    <p>Use the button below to print your tickets now.</p>
    <a class="btn" target="_blank" href="<?php echo(urlFor('booking', 'printTicket', $booking->id, '&surname=' . $customer->last_name)); ?>">Print Tickets</a>
    <br/><br/>
</section>
<?php
displaySideSections();
?>
