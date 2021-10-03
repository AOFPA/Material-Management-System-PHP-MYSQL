<?php
    include("config.php");
    $pro_id = $_GET['pro_id'];

$sql = "DELETE FROM product WHERE pro_id='$pro_id';";

if ($conn->query($sql) === TRUE) {
  header("location: pro_show.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>