<?php
class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) {
      echo "<table style='border:1px solid black;'>";
      echo "<tr><th>Order Id</th><th>Comment</th><th>Ship Date Expected</th></tr>";

        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
}

require 'config.php';

echo '<h1>Comments about candy</h1>';

try {
  $conn = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $secret);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM sweetwater_test"); 
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {

    if (strpos($v, 'candy') !== false) {
      echo $v;
    }
  }
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
echo "</table>";

echo '<h1>Comments about call me / don\'t call me</h1>';

try {
  $conn = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $secret);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM sweetwater_test"); 
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {

    if (strpos($v, 'call') !== false) {
      echo $v;
    }
  }
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

echo '<h1>Comments about who referred me</h1>';

try {
  $conn = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $secret);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM sweetwater_test"); 
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {

    if (strpos($v, 'referred') !== false) {
      echo $v;
    }
  }
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

echo '<h1>Comments about signature requirements upon delivery</h1>';

try {
  $conn = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $secret);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM sweetwater_test"); 
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {

    if (strpos($v, 'signature') !== false) {
      echo $v;
    }
  }
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

echo '<h1>Miscellaneous comments (everything else)</h1>';

try {
  $conn = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $secret);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM sweetwater_test"); 
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {

    if (strpos($v, 'candy') !== true) {
      if (strpos($v, 'call') !== true) {
        if (strpos($v, 'referred') !== true) {
          if (strpos($v, 'signature') !== true) {
            echo $v;
          }
        }
      }
    }
  }
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

?>