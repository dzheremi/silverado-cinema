<?php
class Booking {
  public $id;
  public $customer_id;
  public $voucher_id;
  public $time;
  private $written = false;

  public function __construct($customer_id, $voucher_id) {
    $this->id = $this->getNextId();
    $this->customer_id = $customer_id;
    $this->voucher_id = $voucher_id;
    $this->time = time();
  }

  public function customer() {
    return Customer::find($this->customer_id);
  }

  public function booking_items() {
    return BookingItem::findByBookingId($this->id);
  }

  public static function findAll() {
    $bookings = readAll('booking');
    return $bookings;
  }

  public static function find($id) {
    $bookings = Booking::findAll();
    if(!empty($bookings)) {
      foreach($bookings as $booking) {
        if($booking->id === $id) {
          return $booking;
        }
      }
    }
    return false;
  }

  public static function findByCustomerId($id) {
    $bookings = Booking::findAll();
    $results = [];
    if(!empty($bookings)) {
      foreach($bookings as $booking) {
        if($booking->customer_id === $id) {
          array_push($results, $booking);
        }
      }
    }
    return $results;
  }

  public function save() {
    $bookings = Booking::findAll();
    if(!$this->written) {
      $this->written = true;
      if(empty($bookings)) {
        $bookings = [];
      }
      array_push($bookings, $this);
      if(saveAll($bookings, 'booking')) {
        return true;
      } else {
        return false;
      }
    } else {
      foreach($bookings as $index => $booking) {
        if($booking->id === $this->id) {
          $bookings[$index] = $this;
          if(saveAll($bookings, 'booking')) {
            return true;
          } else {
            return false;
          }
        }
      }
    }
  }

  private function getNextId() {
    $bookings = Booking::findAll();
    $last_id = 0;
    if(!empty($bookings)) {
      foreach($bookings as $booking) {
        if($booking->id > $last_id) {
          $last_id = $booking->id;
        }
      }
    }
    return $last_id + 1;
  }

}
?>
