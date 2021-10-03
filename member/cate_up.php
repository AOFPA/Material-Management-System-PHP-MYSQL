<?php 
include('css.php');
include("config.php");

$cate_id = $_GET['cate_id'];
$sql = "SELECT * FROM category
        WHERE cate_id='$cate_id';";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
?>

<body>
<?php include('top.php'); ?>
<br>
<div class="container">


                                        <form method="POST" action="update.php">
                                            <input type="hidden" id="optupdate" name="optupdate" value="category">
                                           

                                            <div class="form-group">
                                                <input style="width:50%;" type="hidden" class="form-control" id="cate_id" name="cate_id" value=<?php echo $row['cate_id']; ?>>
                                                <label for="cate_id">รหัส</label>
                                                <input style="width:50%;" type="text" class="form-control" id="cate_id" name="cate_id" value=<?php echo $row['cate_id']; ?> disabled>
                                            </div>

                                          

                                            <div class="form-group">
                                                <label for="cate_name">ประเภท</label>
                                                <input style="width:50%;" type="text" class="form-control" id="cate_name" name="cate_name" value=<?php echo "\"" . $row['cate_name'] . "\"";?>>
                                            </div> 

                                           
                                            <button onclick="return confirm_up()" type="sunmit" class="btn btn-danger">แก้ไข</button>
                                            <button type="reset" class="btn btn-success">ล้าง</button>
                                            <a href="cate_show.php" class="btn btn-primary">ยกเลิก</a>
                                            </div>
                                    </form>
                                    </div>
                                    <br>

</body>

</html>
<?php 
$conn->close(); ?>