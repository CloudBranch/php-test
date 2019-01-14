<?php
require 'config.php';

try {
  $conn = new PDO("mysql:host=$serverName;dbname=$databaseName", $username, $secret);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM sweetwater_test"); 
  $stmt->execute();

  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

  foreach($stmt->fetch() as $k => $v) {

    if (strpos($v, 'Expected') !== false) {

      /* while(preg_match_all('/\d{2}\/\d{2}\/\d{2}/', $v, $matches)) {
        print_r($matches);
      //}*/

      $esd = $v;

      $new_array = explode("Expected Ship Date: ", $esd);

      $orderid = $new_array[0];
      $extracted_date = $new_array[1];

      $stmt = $conn->prepare("UPDATE sweetwater_test SET shipdate_expected='$extracted_date' WHERE orderid=$orderid");

      //$stmt->execute();

      print_r($new_array);
    }
  }
  echo 'Database Successfully Updated!';
}
catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
?>