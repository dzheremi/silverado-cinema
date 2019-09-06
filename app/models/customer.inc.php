<?php
class Customer {
  public $id;
  public $first_name;
  public $last_name;
  public $email_address;
  public $phone;
  private $written = false;

  public function __construct($first_name, $last_name, $email_address, $phone)
  {
    $this->id = $this->getNextId();
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->email_address = $email_address;
    $this->phone = $phone;
  }

  public function bookings() {
    return Bookings::findByCustomerId($this->id);
  }

  public static function findAll() {
    $customers = readAll('customer');
    return $customers;
  }

  public static function find($id) {
    $customers = Customer::findAll();
    if(!empty($customers)) {
      foreach($customers as $customer) {
        if($customer->id === $id) {
          return $customer;
        }
      }
    }
    return false;
  }

  public function save() {
    $customers = Customer::findAll();
    if(!$this->written) {
      $this->written = true;
      if(empty($customers)) {
        $customers = [];
      }
      array_push($customers, $this);
      if(saveAll($customers, 'customer')) {
        return true;
      } else {
        return false;
      }
    } else {
      foreach($customers as $index => $customer) {
        if($customer->id === $this->id) {
          $customers[$index] = $this;
          if(saveAll($customers, 'customer')) {
            return true;
          } else {
            return false;
          }
        }
      }
    }
  }

  private function getNextId() {
    $customers = Customer::findAll();
    $last_id = 0;
    if(!empty($customers)) {
      foreach($customers as $customer) {
        if($customer->id > $last_id) {
          $last_id = $customer->id;
        }
      }
    }
    return $last_id + 1;
  }

}
?>
