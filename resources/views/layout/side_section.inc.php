<?php
function displaySideSections() {
  $movies = Movie::findAll();
?>
    <section class="side">
      <div id="cart" style="display: none;">
      </div>
      <div>
        <h2>Reprint Tickets</h2>
        <p>To reprint your tickets, enter your booking number and surname into the boxes below.</p>
        <form name="reprint" method="GET" action="index.php">
        <div style="text-align: center">
          <input type="hidden" name="section" value="booking"/>
          <input type="hidden" name="page" value="confirm_booking"/>
          <input type="text" name="id" placeholder="Booking Number"/><br/>
          <input type="text" name="surname" placeholder="Surname"/><br/>
          <a class="btn" href="javascript:void(0)" onclick="reprint.submit()">Reprint Tickets</a>
        </div>
        </form>
      </div>
      <h2>Now Showing</h2>
      <div id="slider">
        <figure>
<?php
foreach($movies as $movie) {
?>
          <a href="?section=movie&page=displayMovies#movie_<?php echo($movie->id); ?>"><img src="<?php echo($movie->poster_url); ?>" alt="<?php echo($movie->name); ?>"/></a>
<?php
}
?>
        </figure>
      </div>
      <br/><br/>
    </section>
    <script>
      function getCart() {
        $.post(
          "?section=cart&page=get_cart",
          {},
          function(returnedData, status) {
            if(status=="success")
            {
              if(returnedData.trim() == "FALSE")
              {
                $("#cart").html("");
                $("#cart").hide();
              } else {
                $("#cart").html(returnedData);
                $("#cart").show();
              }
            } else {
              alert("Cannot load your cart.");
            }
          });
      }
      function removeFromCart(line_no) {
        $.post(
          "?section=cart&page=remove_from_cart",
          {id: line_no},
          function(returnedData, status) {
            if(status=="success")
            {
              getCart();
            } else {
              alert("Cannot remove item from your cart.");
            }
          });
      }
      getCart();
    </script>
<?php
}
?>
