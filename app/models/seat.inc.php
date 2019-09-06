<?php
class Seat {
  public $id;
  public $row;
  public $seat;
  public $ticket_type;
  public $map_index;
  private $written = false;

  public function __construct($row, $seat, $ticket_type, $map_index = '') {
    $this->id = $this->getNextId();
    $this->row = $row;
    $this->seat = $seat;
    $this->ticket_type = $ticket_type;
  }

  public function booking_items() {
    return BookingItem::findBySeatId($this->id);
  }

  public function screening_seats() {
    return ScreeningSeat::findBySeatId($this->id);
  }

  public function ticket_types() {
    return TicketType::findByTicketType($this->ticket_type);
  }

  public static function findAll() {
    $seats = readAll('seat');
    return $seats;
  }

  public static function find($id) {
    $seats = Seat::findAll();
    if(!empty($seats)) {
      foreach($seats as $seat) {
        if($seat->id === $id) {
          return $seat;
        }
      }
    }
    return false;
  }

  public static function findByTicketType($type) {
    $seats = Seat::findAll();
    $results = [];
    if(!empty($seats)) {
      foreach($seats as $seat) {
        if($seat->ticket_type === $type) {
          array_push($results, $seat);
        }
      }
    }
    return $results;
  }

  public function save() {
    $seats = Seat::findAll();
    if(!$this->written) {
      $this->written = true;
      if(empty($seats)) {
        $seats = [];
      }
      array_push($seats, $this);
      if(saveAll($seats, 'seat')) {
        return true;
      } else {
        return false;
      }
    } else {
      foreach($seats as $index => $seat) {
        if($seat->id === $this->id) {
          $seats[$index] = $this;
          if(saveAll($seats, 'seat')) {
            return true;
          } else {
            return false;
          }
        }
      }
    }
  }

  private function getNextId() {
    $seats = Seat::findAll();
    $last_id = 0;
    if(!empty($seats)) {
      foreach($seats as $seat) {
        if($seat->id > $last_id) {
          $last_id = $seat->id;
        }
      }
    }
    return $last_id + 1;
  }

}

function injectSeats() {
  $rows = ["E", "F", "G", "H"];

  $record = new Seat("A", 1, "Beanbag");
  $record->save();
  $record = new Seat("A", 2, "Beanbag");
  $record->save();

  $record = new Seat("B", 1, "Beanbag");
  $record->save();
  $record = new Seat("B", 2, "Beanbag");
  $record->save();
  $record = new Seat("B", 3, "Beanbag");
  $record->save();

  $record = new Seat("C", 1, "Beanbag");
  $record->save();
  $record = new Seat("C", 2, "Beanbag");
  $record->save();
  $record = new Seat("C", 3, "Beanbag");
  $record->save();
  $record = new Seat("C", 4, "Beanbag");
  $record->save();

  $record = new Seat("D", 1, "Beanbag");
  $record->save();
  $record = new Seat("D", 2, "Beanbag");
  $record->save();
  $record = new Seat("D", 3, "Beanbag");
  $record->save();
  $record = new Seat("D", 4, "Beanbag");
  $record->save();

  foreach($rows as $row) {
    $seat = 1;
    while($seat <= 14) {
      if($seat <= 5) {
        $record = new Seat($row, $seat, "Standard Seating");
        $record->save();
      } elseif ($seat > 5 && $seat <= 9) {
        if($row != "H") {
          $record = new Seat($row, $seat, "First Class");
          $record->save();
        }
      } elseif ($seat > 9) {
        $record = new Seat($row, $seat, "Standard Seating");
        $record->save();
      }
      $seat++;
    }
  }
}

?>
