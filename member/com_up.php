<?php 
include('css.php');
include("config.php");

$com_id = $_GET['com_id'];
$sql = "SELECT * FROM company
        WHERE com_id='$com_id';";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
?>

<body >
<?php include('top.php'); ?>
<br>
<div class="container">

                                        <form method="POST" action="update.php">
                                            <input type="hidden" id="optupdate" name="optupdate" value="company">
                                           

                                            <div class="form-group">
                                                <input style="width:50%;" type="hidden" class="form-control" id="com_id" name="com_id" value=<?php echo $row['com_id']; ?>>
                                                <label for="com_id">รหัสบริษัท</label>
                                                <input style="width:50%;" type="text" class="form-control" id="com_id" name="com_id" value=<?php echo $row['com_id']; ?> disabled>
                                            </div>

                                          

                                            <div class="form-group">
                                                <label for="com_name">ชื่อบริษัท</label>
                                                <input style="width:50%;" type="text" class="form-control" id="com_name" name="com_name" value=<?php echo "\"" . $row['com_name'] . "\"";?>>
                                            </div> 

                                           
                                            <button onclick="return confirm_up()" type="sunmit" class="btn btn-danger">แก้ไข</button>
                                            <button type="reset" class="btn btn-success">ล้าง</button>
                                            <a href="com_show.php" class="btn btn-primary">ยกเลิก</a>
                                            </div>
                                    </form>
                                    </div>
ิ<br>
</body>

</html>
<?php 
$conn->close(); ?>