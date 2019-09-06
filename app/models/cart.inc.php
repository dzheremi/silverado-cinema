<?php
class Cart {
  public $booking;
  public $booking_item;
  public $customer;
  public $movie;
  public $screening;
  public $screening_seat;
  public $seat;
  public $ticket_type;

  public function __construct() {
    $this->booking = unserialize($_SESSION['persistant']['booking']);
    $this->booking_item = unserialize($_SESSION['persistant']['booking_item']);
    $this->customer = unserialize($_SESSION['persistant']['customer']);
    $this->movie = unserialize($_SESSION['persistant']['movie']);
    $this->screening = unserialize($_SESSION['persistant']['screening']);
    $this->screening_seat = unserialize($_SESSION['persistant']['screening_seat']);
    $this->seat = unserialize($_SESSION['persistant']['seat']);
    $this->ticket_type = unserialize($_SESSION['persistant']['ticket_type']);
  }

  public function save() {
    $_SESSION['persistant']['booking'] = serialize($this->booking);
    $_SESSION['persistant']['booking_item'] = serialize($this->booking_item);
    $_SESSION['persistant']['customer'] = serialize($this->customer);
    $_SESSION['persistant']['movie'] = serialize($this->movie);
    $_SESSION['persistant']['screening'] = serialize($this->screening);
    $_SESSION['persistant']['screening_seat'] = serialize($this->screening_seat);
    $_SESSION['persistant']['seat'] = serialize($this->seat);
    $_SESSION['persistant']['ticket_type'] = serialize($this->ticket_type);
  }

  public function addItem($item) {
    if(!empty($this->booking_item)) {
      array_push($this->booking_item, $item);
    } else {
      $this->booking_item[0] = $item;
    }
  }

}
?>
