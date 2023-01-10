<?php
class DataBase {
  private $host = 'localhost';
  private $user = 'panda';
  private $password = '123456';
  private $dbname = 'panda';
  private $conn;

  public function connect() {
    $this->conn = null;

    try {
      $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    } catch(PDOException $error) {
      echo 'Something went wrong: ' . $error->getMessage();
    }

    return $this->conn;
  }

  public function insert($table, $data) {
    $keys = array_keys($data);
    $values = array_values($data);

    $query = "INSERT INTO $table (" . implode(', ', $keys) . ") VALUES (" . implode(', ', array_fill(0, count($values), '?')) . ")";
    $stmt = $this->conn->prepare($query);

    foreach ($values as $value) {
      $stmt->execute([$value]);
    }

    return $stmt->rowCount();
  }
}

$database = new Database();
$conn = $database->connect();