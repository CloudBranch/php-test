<?php

require 'config.php';

$connection = new mysqli($serverName, $username, $secret, $databaseName);

if ($connection->connect_error) {
    die("Connection Error: " . $connection->connect_error);
}

?>

<table style="border:2px solid black;position:fixed;top:0;left:0;background:#FFFFFF;">

<tr style="border:2px solid black;">

  <th>Comments about candy</th>
  <th>Comments about call me / don't call me</th>
  <th>Comments about who referred me</th>
  <th>Comments about signature requirements upon delivery</th>
  <th>Miscellaneous comments (everything else)</th>

</tr>

<tr style="border:2px solid black;">

  <td align="center" style="color:orange;width:150px;border:2px solid orange;">ORANGE</td>

  <td align="center" style="color:red;width:150px;border:2px solid red;">RED</td>

  <td align="center" style="color:green;width:150px;border:2px solid green;">GREEN</td>

  <td align="center" style="color:blue;width:150px;border:2px solid blue;">BLUE</td>

  <td align="center" style="color:black;width:150px;border:2px solid black;">BLACK</td>

</tr>

</table>

<br>

<?php

$data = $connection->query("SELECT * FROM sweetwater_test");

if ($data->num_rows > 0) {

    echo "<table style='border:2px solid orange;margin-top:100px;'><tr><th>orderid</th><th>comments</th><th>shipdate_expected</th></tr>";

    while($row = $data->fetch_assoc()) {

      if (strpos($row["comments"], 'candy') !== false) {
        echo "<tr><td style='width:150px;border:2px solid orange;'>" . $row["orderid"]. "</td><td style='width:150px;border:2px solid orange;'>" . $row["comments"]. "</td><td style='width:150px;border:2px solid orange;'>" . $row["shipdate_expected"]. "</td></tr>";
      }
      /* else if (strpos($row["comments"], 'call') !== false) {
        echo "<tr><td style='width:150px;border:2px solid red;'>" . $row["orderid"]. "</td><td style='width:150px;border:2px solid red;'>" . $row["comments"]. "</td><td style='width:150px;border:2px solid red;'>" . $row["shipdate_expected"]. "</td></tr>";
      }
      else if (strpos($row["comments"], 'referred') !== false) {
        echo "<tr><td style='width:150px;border:2px solid green;'>" . $row["orderid"]. "</td><td style='width:150px;border:2px solid green;'>" . $row["comments"]. "</td><td style='width:150px;border:2px solid green;'>" . $row["shipdate_expected"]. "</td></tr>";
      }
      else if (strpos($row["comments"], 'signature') !== false) {
        echo "<tr><td style='width:150px;border:2px solid blue;'>" . $row["orderid"]. "</td><td style='width:150px;border:2px solid blue;'>" . $row["comments"]. "</td><td style='width:150px;border:2px solid blue;'>" . $row["shipdate_expected"]. "</td></tr>";
      }
      else {
        echo "<tr><td style='width:150px;border:2px solid black;'>" . $row["orderid"]. "</td><td style='width:150px;border:2px solid black;'>" . $row["comments"]. "</td><td style='width:150px;border:2px solid black;'>" . $row["shipdate_expected"]. "</td></tr>";
      } */
    }
    echo "</table>";
} else {
    echo "0 results";
}

echo "<br>";

$data2 = $connection->query("SELECT * FROM sweetwater_test");

if ($data2->num_rows > 0) {

  echo "<table style='border:2px solid red;'><tr><th>orderid</th><th>comments</th><th>shipdate_expected</th></tr>";

  while($row = $data2->fetch_assoc()) {

    if (strpos($row["comments"], 'call') !== false) {
      echo "<tr><td style='width:150px;border:2px solid red;'>" . $row["orderid"]. "</td><td style='width:150px;border:2px solid red;'>" . $row["comments"]. "</td><td style='width:150px;border:2px solid red;'>" . $row["shipdate_expected"]. "</td></tr>";
    }
  }
  echo "</table>";
} else {
  echo "0 results";
}

echo "<br>";

$data3 = $connection->query("SELECT * FROM sweetwater_test");

if ($data3->num_rows > 0) {

  echo "<table style='border:2px solid green;'><tr><th>orderid</th><th>comments</th><th>shipdate_expected</th></tr>";

  while($row = $data3->fetch_assoc()) {

    if (strpos($row["comments"], 'referred') !== false) {
      echo "<tr><td style='width:150px;border:2px solid green;'>" . $row["orderid"]. "</td><td style='width:150px;border:2px solid green;'>" . $row["comments"]. "</td><td style='width:150px;border:2px solid green;'>" . $row["shipdate_expected"]. "</td></tr>";
    }
  }
  echo "</table>";
} else {
  echo "0 results";
}

echo "<br>";

$data4 = $connection->query("SELECT * FROM sweetwater_test");

if ($data4->num_rows > 0) {

  echo "<table style='border:2px solid blue;'><tr><th>orderid</th><th>comments</th><th>shipdate_expected</th></tr>";

  while($row = $data4->fetch_assoc()) {

    if (strpos($row["comments"], 'signature') !== false) {
      echo "<tr><td style='width:150px;border:2px solid blue;'>" . $row["orderid"]. "</td><td style='width:150px;border:2px solid blue;'>" . $row["comments"]. "</td><td style='width:150px;border:2px solid blue;'>" . $row["shipdate_expected"]. "</td></tr>";
    }
  }
  echo "</table>";
} else {
  echo "0 results";
}

echo "<br>";

$data5 = $connection->query("SELECT * FROM sweetwater_test");

if ($data5->num_rows > 0) {

  echo "<table style='border:2px solid black;'><tr><th>orderid</th><th>comments</th><th>shipdate_expected</th></tr>";

  while($row = $data5->fetch_assoc()) {

    if (strpos($row["comments"], 'candy') !== true) {
      if (strpos($row["comments"], 'call') !== true) {
        if (strpos($row["comments"], 'referred') !== true) {
          if (strpos($row["comments"], 'signature') !== true) {
            echo "<tr><td style='width:150px;border:2px solid black;'>" . $row["orderid"]. "</td><td style='width:150px;border:2px solid black;'>" . $row["comments"]. "</td><td style='width:150px;border:2px solid black;'>" . $row["shipdate_expected"]. "</td></tr>";
          }
        }
      }
    }
  }
  echo "</table>";
} else {
  echo "0 results";
}

$connection->close();
?>