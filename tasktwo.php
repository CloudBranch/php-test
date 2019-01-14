<?php

require 'config.php';

$connection = new mysqli($serverName, $username, $secret, $databaseName);

if ($connection->connect_error) {
    die("Connection Error: " . $connection->connect_error);
}

$sql = "SELECT * FROM sweetwater_test";
$data = $connection->query($sql);

if ($data->num_rows > 0) {

  while($row = $data->fetch_assoc()) {

    if(preg_match_all('/\d{2}\/\d{2}\/\d{2}/', $row["comments"], $matches)) {

      $extracted_date = $matches[0][0];
      $orderid = $row['orderid'];

      $sql = "UPDATE sweetwater_test SET shipdate_expected='" . $extracted_date . "' WHERE orderid=" . $orderid;

      if ($connection->query($sql) === TRUE) {
        echo "Database date with OrderID = " . $orderid . " was modified successfully!";
        echo '<br>';
      } else {
        echo "Error : " . $connection->error;
      }
    }
  }
} else {
  echo "No results found!";
}
$connection->close();
?>