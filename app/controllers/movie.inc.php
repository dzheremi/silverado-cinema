<?php
function displayMovies() {
  displayHeader("Movies");
  displayNavigation("Movies");
  $movies = Movie::findAll();
  include(__DIR__ . "/../../resources/views/movie/movies.inc.php");
  displayFooter();
}

function displayMovieTimes() {
  displayHeader("Movie Times");
  displayNavigation("Times");
  $movies = Movie::findAll();
  include(__DIR__ . "/../../resources/views/movie/movie_times.inc.php");
  displaySideSections();
  displayFooter();
}

function render() {
  if(isset($_GET["page"])) {
    $func = decodeFunctionName($_GET["page"]);
    $func();
  } else {
    displayMovies();
  }
}
?>
