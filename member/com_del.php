<?php
    include("config.php");
    $com_id = $_GET['com_id'];

$sql = "DELETE FROM company WHERE com_id='$com_id';";

if ($conn->query($sql) === TRUE) {
  header("location: com_show.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>