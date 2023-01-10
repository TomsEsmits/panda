<?php
include_once ($_SERVER['DOCUMENT_ROOT'] . '/config/Database.php');

class Fetch {
  public function __construct() {
   $this->checkPostAction();
  }

  public function checkPostAction() {
    if(!$_POST) return;

    switch ($_POST['action']) {
      case 'displayATableValues':
        Fetch::displayATableValues();
        break;
      case 'displayABCTableValues':
        Fetch::displayABCTableValues();
        break;
      case 'displayCBTableValues':
        Fetch::displayCBTableValues();
        break;
      case 'displayBTableValuesAscending':
        Fetch::displayBTableValuesAscending();
        break;
      case 'displayBTableValuesDescending':
        Fetch::displayBTableValuesDescending();
        break;
      default:
        echo 'Something went wrong!';
    }
  }

  static function displayATableValues() {
    $database = new Database();
    $conn = $database->connect();
    $table = 'table_a';

    $query = "SELECT * FROM $table";
    $stmt = $conn->query($query);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($rows);
    $conn = null;
  }

  static function displayABCTableValues() {
    $database = new Database();
    $conn = $database->connect();
    $table_a = 'table_a';
    $table_b = 'table_b';
    $table_c = 'table_c';

    $query = "SELECT ta.a_table_value, tb.b_table_value, tc.c_table_value 
              FROM $table_a AS ta JOIN $table_b AS tb ON ta.id = tb.id JOIN $table_c AS tc ON tb.id = tc.id";
    $stmt = $conn->query($query);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($rows);
    $conn = null;
  }

  static function displayCBTableValues() {
    $database = new Database();
    $conn = $database->connect();
    $table_b = 'table_b';
    $table_c = 'table_c';

    $query = "SELECT tb.b_table_value, tc.c_table_value FROM $table_b AS tb
              INNER JOIN $table_c AS tc ON tb.id = tc.id";
    $stmt = $conn->query($query);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($rows);
    $conn = null;
  }

  static function displayBTableValuesAscending() {
    $database = new Database();
    $conn = $database->connect();
    $table_b = 'table_b';

    $query = "SELECT * FROM $table_b ORDER BY b_table_value ASC";
    $stmt = $conn->query($query);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($rows);
    $conn = null;
  }

  static function displayBTableValuesDescending() {
    $database = new Database();
    $conn = $database->connect();
    $table_b = 'table_b';

    $query = "SELECT * FROM $table_b ORDER BY b_table_value DESC";
    $stmt = $conn->query($query);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($rows);
    $conn = null;
  }
}

new Fetch();