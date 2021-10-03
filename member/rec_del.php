<?php
    include("config.php");
    $rec_id = $_GET['rec_id'];
    $com_id = $_GET['com_id'];

$sql = "DELETE FROM record WHERE rec_id='$rec_id';";

if ($conn->query($sql) === TRUE) {
  header("location: rec_show.php?com_id=" . $com_id);
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>