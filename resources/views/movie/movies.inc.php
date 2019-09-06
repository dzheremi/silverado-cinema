		<section class="content">
      <h1>Current Movies</h1>
<?php
foreach ($movies as $movie) {
?>
      <a class="movie" href="#movie_<?php echo($movie->id); ?>">
        <table style="width: 100%;">
          <tr>
            <td class="movie-cover" rowspan="2"><img src="<?php echo($movie->poster_url); ?>" alt="<?php echo($movie->name); ?>" /></td>
            <td class="movie-title"><?php echo($movie->name); ?> (<?php echo($movie->category); ?>)</td>
          </tr>
          <tr>
            <td class="movie-description"><?php echo($movie->summary); ?></td>
          </tr>
        </table>
      </a>
<?php
} 
?>
		</section>
<?php
displaySideSections();
foreach ($movies as $movie) {
?>
		<div class="modal" id="movie_<?php echo($movie->id); ?>" aria-hidden="true">
			<div class="modal-dialog">
        <div class="modal-header">
          <div style="width: 50%; display: inline-block;">
            <h3><?php echo($movie->name); ?></h3>
          </div>
          <div style="width: 49%; display: inline-block; text-align: right;">
            <div style="width: 100%; text-align: right;">
              <a href="?section=ticket&page=displayTicketForm&movie_id=<?php echo($movie->id); ?>" class="btn">Buy Tickets</a>
              <a href="#close" class="btn">Close</a>
            </div>
          </div>
				</div>
				<div class="modal-body">
					<table style="width: 100%">
						<tr>
							<td rowspan="4" style="width: 20%"><img src="<?php echo($movie->poster_url); ?>" alt="<?php echo($movie->name); ?>" height="70" style="width: 120" /></td>
							<td class="mobile" style="width: 20%"><b>Movie Genre</b></td>
              				<td style="width: 60%" class="mobile"><?php echo($movie->category); ?></td>
						</tr>
                        <tr>
                            <td><b>Movie Rating</b></td>
                            <td style="width: 60%" class="mobile"><img src="<?php echo $movie->rating; ?>" alt="Movie Rating Unavailable"/></td>
                        </tr>
						<tr class="mobile" style="">
							<td class="top-column" style="width: 20%"><b>Sessions</b></td>
              <td style="width: 60%">
<?php
  foreach($movie->screenings() as $screening) {
?>
                <a href="?section=ticket&page=displayTicketForm&movie_id=<?php echo($screening->movie()->id); ?>&screening_id=<?php echo($screening->id);?>"><?php echo($screening->niceDate()); ?> - <?php echo($screening->time); ?></a><br/>
<?php
  }
?>
              </td>
						</tr>
						<tr class="mobile">
							<td class="top-column" style="width: 20%"><b>Description</b></td>
              <td style="width: 60%"><?php echo($movie->plot); ?></td>
						</tr>
                        <tr class="mobile">
                            <td colspan="3" align="center"><video width="80%" height="400" controls>
                                    <source src="<?php echo $movie->trailer_url ?>" type="video/mp4">
                                    Your browser does not support Video.
                                </video></td>
                        </tr>
					</table>
				</div>
			</div>
		</div>
<?php
}
?>
