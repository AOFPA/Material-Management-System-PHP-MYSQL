<?php
    include("config.php");
    $cate_id = $_GET['cate_id'];

$sql = "DELETE FROM category WHERE cate_id='$cate_id';";

if ($conn->query($sql) === TRUE) {
  header("location: cate_show.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>