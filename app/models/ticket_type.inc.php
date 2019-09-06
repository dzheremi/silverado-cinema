<?php
class TicketType {
  public $id;
  public $name;
  public $type;
  public $price;
  public $discount_price;
  private $written = false;

  public function __construct($name, $type, $price, $discount_price) {
    $this->id = $this->getNextId();
    $this->name = $name;
    $this->type = $type;
    $this->price = $price;
    $this->discount_price = $discount_price;
  }

  public function seats() {
    return Seat::findByTicketType($this->type);
  }

  public static function findAll() {
    $ticket_types = readAll('ticket_type');
    return $ticket_types;
  }

  public static function find($id) {
    $ticket_types = TicketType::findAll();
    if(!empty($ticket_types)) {
      foreach($ticket_types as $ticket) {
        if($ticket->id === $id) {
          return $ticket;
        }
      }
    }
    return false;
  }

  public static function findByTicketType($type)
  {
    $ticket_types = TicketType::findAll();
    $results = [];
    if(!empty($ticket_types)) {
      foreach($ticket_types as $ticket) {
        if($ticket->type === $type) {
          array_push($results, $ticket);
        }
      }
    }
    return $results;
  }

  public function save() {
    $ticket_types = TicketType::findAll();
    if(!$this->written) {
      $this->written = true;
      if(empty($ticket_types)) {
        $ticket_types = [];
      }
      array_push($ticket_types, $this);
      if(saveAll($ticket_types, 'ticket_type')) {
        return true;
      } else {
        return false;
      }
    } else {
      foreach($ticket_types as $index => $ticket) {
        if($ticket->id === $this->id) {
          $ticket_types[$index] = $this;
          if(saveAll($ticket_types, 'ticket_type')){
            return true;
          } else {
            return false;
          }
        }
      }
    }
  }

  private function getNextId() {
    $ticket_types = TicketType::findAll();
    $last_id = 0;
    if(!empty($ticket_types)) {
      foreach($ticket_types as $ticket) {
        if($ticket->id > $last_id) {
          $last_id = $ticket->id;
        }
      }
    }
    return $last_id + 1;
  }

}

function injectTicketTypes() {
  $ticket = new TicketType("Adult", "Standard Seating", 18, 12);
  $ticket->save();

  $ticket = new TicketType("Concession", "Standard Seating", 15, 10);
  $ticket->save();

  $ticket = new TicketType("Child", "Standard Seating", 12, 8);
  $ticket->save();

  $ticket = new TicketType("Adult", "First Class", 30, 25);
  $ticket->save();

  $ticket = new TicketType("Child", "First Class", 25, 20);
  $ticket->save();

  $ticket = new TicketType("1 Adult", "Beanbag", 30, 20);
  $ticket->save();

  $ticket = new TicketType("2 Adults", "Beanbag", 30, 20);
  $ticket->save();

  $ticket = new TicketType("1 Child", "Beanbag", 30, 20);
  $ticket->save();

  $ticket = new TicketType("2 Children", "Beanbag", 30, 20);
  $ticket->save();

  $ticket = new TicketType("3 Children", "Beanbag", 30, 20);
  $ticket->save();
}

?>
