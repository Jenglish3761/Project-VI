<?php
  class Elevator {
    private $idNumber;
    private $floorNumber;
    private static $lastId = 100;

    public function __construct(int $floor){
      $this->idNumber = ++self::$lastId;//
      $this->floorNumber = $floor;
    }
    public static function getLastId(): int{
      return self::$lastId;
    }
    public function getId(): int{
      return $this->idNumber;
    }
    public function getFloor(): int{
      return $this->floorNumber;
    }
    public function setFloor(int $floor){
      $this->floorNumber = $floor;
    }
  }

  $elevator1 = new Elevator(5);//id=100 floor 5
  $elevator2 = new Elevator(6);//id=101 floor 6
  $elevator3 = new Elevator(7);//id=102 floor 7
  echo "Elevator 1 has ID: " . $elevator1->getId() . " and is located on floor " . $elevator1->getFloor() . "<br/>";
  echo "Elevator 2 has ID: " . $elevator2->getId() . " and is located on floor " . $elevator2->getFloor() . "<br/>";
  echo "Elevator 3 has ID: " . $elevator3->getId() . " and is located on floor " . $elevator3->getFloor() . "<br/>";
  $elevator1->setFloor(6);
  echo "Elevator 1 has ID: " . $elevator1->getId() . " and is located on floor " . $elevator1->getFloor() . "<br/>";

  echo "Referenced by class - The last ID that was assigned was: " . Elevator::getLastId() . "<br/>";
  echo "Referenced by object - The last ID that was assigned was: " . $elevator1::getLastId() . "<br/>";

  /*
  echo "Elevator " . $elevator1->getId() . " is located on floor " . $elevator1->getFloor();
  $elevator1->setFloor(1);
  echo "<br/>";
  echo "Elevator " . $elevator1->getId() . " is located on floor " . $elevator1->getFloor();
  */

 ?>
