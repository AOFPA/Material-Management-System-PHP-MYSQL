<?php
    include("config.php");
    $pro_id = $_GET['pro_id'];
    $cate_id = $_GET['cate_id'];

$sql = "DELETE FROM product WHERE pro_id='$pro_id';";

if ($conn->query($sql) === TRUE) {
  header("location: pro_cate.php?cate_id=" . $cate_id);
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>