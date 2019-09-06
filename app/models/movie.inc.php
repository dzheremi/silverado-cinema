<?php
class Movie {
  public $id;
  public $code;
  public $category;
  public $name;
  public $rating;
  public $summary;
  public $plot;
  public $poster_url;
  public $trailer_url;
  private $written = false;

  public function __construct($code, $category, $name, $rating, $summary, $plot, $poster_url, $trailer_url) {
    $this->id = $this->getNextId();
    $this->code = $code;
    $this->category = $category;
    $this->name = $name;
    $this->rating = $rating;
    $this->summary = $summary;
    $this->plot = $plot;
    $this->poster_url = $poster_url;
    $this->trailer_url = $trailer_url;
  }

  public function screenings() {
    return Screening::findByMovieId($this->id);
  }

  public static function findAll() {
    $movies = readAll('movie');
    return $movies; 
  }

  public static function find($id) {
    $movies = Movie::findAll();
    if(!empty($movies)) {
      foreach($movies as $movie) {
        if($movie->id === $id) {
          return $movie;
        }
      }
    }
    return false;
  }

  public static function findByCode($code) {
    $movies = Movie::findAll();
    if(!empty($movies)) {
      foreach($movies as $movie) {
        if($movie->code === $code) {
          return $movie;
        }
      }
    }
    return false;
  }

  public function save() {
    $movies = Movie::findAll();
    if(!$this->written) {
      $this->written = true;
      if(empty($movies)) {
        $movies = [];
      }
      array_push($movies, $this);
      if(saveAll($movies, 'movie')) {
        return true;
      } else {
        return false;
      }
    } else {
      foreach($movies as $index => $movie) {
        if($movie->id === $this->id) {
          $movies[$index] = $this;
          if(saveAll($movies, 'movie')) {
            return true;
          } else {
            return false;
          }
        }
      }
    }
  }

  private function getNextId() {
    $movies = Movie::findAll();
    $last_id = 0;
    if(!empty($movies)) {
      foreach($movies as $movie) {
        if($movie->id > $last_id) {
          $last_id = $movie->id;
        }
      }
    }
    return $last_id + 1;
  }

}

function loadMovies() {
  $data = getJSONData();
  foreach($data as $key => $val) {
    $code = $key;
    $name = '';
    $summary = '';
    $poster_url = '';
    $trailer_url = '';
    $rating = '';
    $plot = '';
    foreach($val as $detail_key => $detail) {
      switch($detail_key) {
      case 'title':
        $name = $detail;
        break;
      case 'summary':
        $summary = $detail;
        break;
      case 'poster':
        $poster_url = $detail;
        break;
      case 'trailer':
        $trailer_url = $detail;
        break;
      case 'rating':
        $rating = $detail;
        break;
      case 'description':
        foreach($detail as $description) {
          $plot .= $description . "\n";
        }
        break;
      }
    }
    $movie = Movie::findByCode($code);
    $category = '';
    switch($code) {
    case 'AF':
      $category = 'Drama';
      break;
    case 'CH':
      $category = 'Childrens';
      break;
    case 'RC':
      $category = 'Romantic Comedy';
      break;
    case 'AC':
      $category = 'Action';
      break;
    }
    if($movie) {
      $movie->code = $code;
      $movie->category = $category;
      $movie->name = $name;
      $movie->rating = $rating;
      $movie->summary = $summary;
      $movie->plot = $plot;
      $movie->poster_url = $poster_url;
      $movie->trailer_url = $trailer_url;
      $movie->save();
    } else {
      $movie = new Movie($code, $category, $name, $rating, $summary, $plot, $poster_url, $trailer_url);
      $movie->save();
    }
  }
}
?>
