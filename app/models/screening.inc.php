<?php
class Screening {
  public $id;
  public $movie_id;
  public $date;
  public $time;
  private $written = false;

  public function __construct($movie_id, $date, $time) {
    $this->id = $this->getNextId();
    $this->movie_id = $movie_id;
    $this->date = $date;
    $this->time = $time;
  }

  public function movie() {
    return Movie::find($this->movie_id);
  }

  public function booking_items() {
    return BookingItem::findByScreeningId($this->id);
  }

  public function screening_seats() {
    return ScreeningSeat::findByScreeningId($this->id);
  }

  public static function findAll() {
    $screenings = readAll('screening');
    $results = [];
    if(!empty($screenings)) {
      foreach($screenings as $screening) {
        if(strtotime($screening->date) > strtotime("now")) {
          array_push($results, $screening);
        }
      }
      for($i=1; $i < sizeof($results); $i++) {
        if(strtotime($results[$i - 1]->date) > strtotime($results[$i]->date))
        {
          $tmp = $results[$i - 1];
          $results[$i - 1] = $results[$i];
          $results[$i] = $tmp;
        }
      }
    }
    return $results;
  }

  public static function find($id) {
    $screenings = Screening::findAll();
    if(!empty($screenings)) {
      foreach($screenings as $screening) {
        if($screening->id === $id) {
          return $screening;
        }
      }
    }
    return false;
  }

  public static function findByMovieId($id) {
    $screenings = Screening::findAll();
    $results = [];
    if(!empty($screenings)) {
      foreach($screenings as $screening) {
        if($screening->movie_id === $id) {
          array_push($results, $screening);
        }
      }
    }
    return $results;
  }

  public static function findByDateTime($movie_id, $date, $time){
    $screenings = Screening::findAll();
    if(!empty($screenings)) {
      foreach($screenings as $screening) {
        if($screening->movie_id === $movie_id) {
          if($screening->date === $date) {
            if($screening->time === $time) {
              return $screening;
            }
          }
        }
      }
    }
    return false;
  }

  public function niceDate() {
    return strftime('%A %e %B', strtotime($this->date));
  }

  public function save() {
    $screenings = Screening::findAll();
    if(!$this->written) {
      $this->written = true;
      if(empty($screenings)) {
        $screenings = [];
      }
      array_push($screenings, $this);
      if(saveAll($screenings, 'screening')) {
        return true;
      } else {
        return false;
      }
    } else {
      foreach($screenings as $index => $screening) {
        if($screening->id === $this->id) {
          $screenings[$index] = $this;
          if(saveAll($screenings, 'screening')) {
            return true;
          } else {
            return false;
          }
        }
      }
    }
  }

  private function getNextId() {
    $screenings = Screening::findAll();
    $last_id = 0;
    if(!empty($screenings)) {
      foreach($screenings as $screening) {
        if($screening->id > $last_id) {
          $last_id = $screening->id;
        }
      }
    }
    return $last_id + 1;
  }

}

function loadScreenings() {
  $data = getJSONData();
  foreach($data as $key => $val) {
    $code = $key;
    $movie = Movie::findByCode($code);
    if($movie) {
      foreach($val as $detail_key => $detail) {
        switch($detail_key) {
        case 'screenings':
          foreach($detail as $day => $time) {
            $seconds_in_day = 86400;
            $x = 1;
            $date = '';
            while($x <= 7) {
              $i = time() + ($seconds_in_day * $x);
              if(date('l', $i) === $day) {
                $date = strftime('%Y-%m-%d', $i);
              }
              $x++;
            }
            if(!empty($date)) {
              $screening = Screening::findByDateTime($movie->id, $date, $time);
              if($screening) {
                $screening->date = $date;
                $screening->time = $time;
                $screening->save();
              } else {
                $screening = new Screening($movie->id, $date, $time);
                $screening->save();
                $seats = Seat::findAll();
                foreach($seats as $seat) {
                  $screening_seat = new ScreeningSeat($seat->id, $screening->id);
                  $screening_seat->save();
                }
              }
            }
          }
          break;
        }
      }
    }
  }
}
?>
