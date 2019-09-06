<?php
class ScreeningSeat {
  public $id;
  public $seat_id;
  public $screening_id;
  public $booked;
  private $written = false;

  public function __construct($seat_id, $screening_id, $booked = false) {
    $this->id = $this->getNextId();
    $this->seat_id = $seat_id;
    $this->screening_id = $screening_id;
    $this->booked = $booked;
  }

  public function screening() {
    return Screening::find($this->screening_id);
  }

  public function seat() {
    return Seat::find($this->seat_id);
  }

  public static function findAll() {
    $screening_seats = readAll('screening_seat');
    return $screening_seats;
  }

  public static function find($id) {
    $screening_seats = ScreeningSeat::findAll();
    if(!empty($screening_seats)) {
      foreach($screening_seats as $seat) {
        if($seat->id === $id) {
          return $seat;
        }
      }
    }
    return false;
  }

  public static function findByScreeningId($id) {
    $screening_seats = ScreeningSeat::findAll();
    $results = [];
    if(!empty($screening_seats)) {
      foreach($screening_seats as $seat) {
        if($seat->screening_id === $id) {
          array_push($results, $seat);
        }
      }
    }
   return $results; 
  }

  public static function findBySeatId($id) {
    $screening_seats = ScreeningSeat::findAll();
    if(!empty($screening_seats)) {
      foreach($screening_seats as $seat) {
        if($seat->seat_id === $id) {
          array_push($results, $seat);
        }
      }
    }
    return $results;
  }

  public static function bookSeat($screening_id, $seat_id){
    $screening_seats = ScreeningSeat::findAll();
    foreach($screening_seats as $seat) {
      if($seat->screening_id === $screening_id && $seat->seat_id === $seat_id) {
        $seat->booked = true;
        $seat->save();
      }
    }
  }

  public function save(){
    $screening_seats = ScreeningSeat::findAll();
    if(!$this->written) {
      $this->written = true;
      if(empty($screening_seats)) {
        $screening_seats = [];
      }
      array_push($screening_seats, $this);
      if(saveAll($screening_seats, 'screening_seat')) {
        return true;
      } else {
        return false;
      }
    } else {
      foreach($screening_seats as $index => $seat) {
        if($seat->id === $this->id) {
          $screening_seats[$index] = $this;
          if(saveAll($screening_seats, 'screening_seat')) {
            return true;
          } else {
            return false;
          }
        }
      }
    }
  }

  public function calculate_price($ticket) {
    $screening = $this->screening();
    switch(strftime('%w', strtotime($screening->date))) {
      case '1':
      case '2':
        return $ticket->discount_price;
        break;
      case '3':
      case '4':
      case '5':
        if($screening->time === '1pm') {
          return $ticket->discount_price;
        } else {
          return $ticket->price;
        }
        break;
      default:
        return $ticket->price;
        break;
    }
  }

  private function getNextId() {
    $screening_seats = ScreeningSeat::findAll();
    $last_id = 0;
    if(!empty($screening_seats)) {
      foreach($screening_seats as $seat) {
        if($seat->id > $last_id) {
          $last_id = $seat->id;
        }
      }
    }
    return $last_id + 1;
  }

}
?>
