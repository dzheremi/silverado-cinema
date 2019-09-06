<section class="content">
    <h1>Movies Time</h1>
<?php
$count = 0;
foreach($movies as $movie) {
  $count++;
?>
		<table>
			<tr>
        <td class="movie-cover" rowspan="2"><img src="<?php echo($movie->poster_url); ?>" alt="<?php echo($movie->name) ?>" /></td>
        <td class="movie-title"><?php echo($movie->name); ?> (<?php echo($movie->category); ?>)</td>
			</tr>
			<tr>
				<td class="movie-description">
<?php
  foreach($movie->screenings() as $screening) {
?>
              <a href="?section=ticket&page=display_ticket_form&movie_id=<?php echo($screening->movie()->id); ?>&screening_id=<?php echo($screening->id);?>">
              <?php echo($screening->niceDate()); ?> - <?php echo($screening->time); ?>
              </a><br/>
<?php 
  }
?>
				</td>
			</tr>
		</table>
<?php
    if(sizeof($movies) != $count){echo("<hr/>");}
  }
?>
		</section>
