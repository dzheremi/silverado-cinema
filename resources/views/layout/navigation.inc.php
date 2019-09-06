<?php
    function displayNavigation($active) {
?>
        <header>
            <a href="<?php echo(urlFor("information", "displayHome")); ?>"><img class="logo" src="public/images/logo.png" alt="Silverado Cinemas"/></a>
            <nav>
                <ul class="menu">
                    <li><a <?php if ($active == "Movies") {
                            echo('class="active"');
                        } ?> href="<?php echo(urlFor("movie", "displayMovies")); ?>">Movies</a></li>
                    <li><a <?php if ($active == "Times") {
                            echo('class="active"');
                        } ?> href="<?php echo(urlFor("movie", "displayMovieTimes")); ?>">Times</a></li>
                    <li><a <?php if ($active == "Tickets") {
                            echo('class="active"');
                        } ?> href="<?php echo(urlFor("ticket", "displayTicketForm")); ?>">Tickets</a></li>
                    <li><a <?php if ($active == "About") {
                            echo('class="active"');
                        } ?> href="<?php echo(urlFor("information", "displayAboutUs")); ?>">About Us</a></li>
                    <li><a <?php if ($active == "Contact") {
                            echo('class="active"');
                        } ?> href="<?php echo(urlFor("contact", "displayContactForm")); ?>">Contact Us</a></li>
                </ul>
            </nav>
        </header>
<?php
    }
?>
