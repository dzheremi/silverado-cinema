<?php
class BookingItem {
  public $id;
  public $booking_id;
  public $screening_id;
  public $seat_id;
  public $ticket_id;
  public $price;
  private $written = false;

  public function __construct($booking_id, $screening_id, $seat_id, $ticket_id, $price) {
    $this->id = $this->getNextId();
    $this->booking_id = $booking_id;
    $this->screening_id = $screening_id;
    $this->seat_id = $seat_id;
    $this->ticket_id = $ticket_id;
    $this->price = $price;
  }

  public function booking() {
    return Booking::find($this->booking_id);
  }

  public function seat() {
    return Seat::find($this->seat_id);
  }

  public function screening() {
    return Screening::find($this->screening_id);
  }

  public function ticket() {
    return TicketType::find($this->ticket_id);
  }

  public static function findAll() {
    $booking_items = readAll('booking_item');
    return $booking_items;
  }

  public static function find($id) {
    $booking_items = BookingItem::findAll();
    if(!empty($booing_items)) {
      foreach($booking_items as $item) {
        if($item->id === $id) {
          return $item;
        }
      }
    }
    return false;
  }

  public static function findByBookingId($id) {
    $booking_items = BookingItem::findAll();
    $results = [];
    if(!empty($booking_items)) {
      foreach($booking_items as $item) {
        if($item->booking_id === $id) {
          array_push($results, $item);
        }
      }
    }
    return $results;
  }

  public static function findByScreeningId($id) {
    $booking_items = BookingItem::findAll();
    if(!empty($booking_items)) {
      foreach($booking_items as $item) {
        if($item->screening_id === $id) {
          array_push($results, $item);
        }
      }
    }
    return $results;
  }

  public static function findBySeatId($id){
    $booking_items = BookingItem::findAll();
    $results = [];
    if(!empty($booking_items)) {
      foreach($booking_items as $item) {
        if($item->seat_id === $id) {
          array_push($results, $item);
        }
      }
    }
    return $results;
  }

  public function save(){
    $booking_items = BookingItem::findAll();
    if(!$this->written) {
      $this->written = true;
      if(empty($booking_items)) {
        $booking_items = [];
      }
      array_push($booking_items, $this);
      if(saveAll($booking_items, 'booking_item')) {
        return true;
      } else {
        return false; 
      }
    } else {
      foreach($booking_items as $index => $item) {
        if($item->id === $this->id) {
          $booking_items[$index] = $this;
          if(saveAll($booking_items, 'booking_item')) {
            return true;
          } else {
            return false;
          }
        }
      }
    }
  }

  private function getNextId() {
    $booking_items = BookingItem::findAll();
    $last_id = 0;
    if(!empty($booking_items)) {
      foreach($booking_items as $item) {
        if($item->id > $last_id) {
          $last_id = $item->id;
        }
      }
    }
    return $last_id + 1;
  }

}
?>
