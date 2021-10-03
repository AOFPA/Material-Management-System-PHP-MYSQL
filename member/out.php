<?php 
include('css.php');
include("config.php");

$pro_id = $_GET['pro_id'];
$sql = "SELECT * FROM product
        WHERE pro_id='$pro_id';";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
?>

<body>
    <br>

<div class="container">
<h4>นำออกจำนวนสินค้า</h4>
                                        <form method="POST" action="update.php">
                                            <input type="hidden" id="optupdate" name="optupdate" value="out">

                                           

                                            <div class="form-group">
                                                <input style="width:50%;" type="hidden" class="form-control" id="pro_id" name="pro_id" value=<?php echo $row['pro_id']; ?>>
                                                <label for="pro_id">รหัสสินค้า</label>
                                                <input style="width:50%;" type="text" class="form-control" id="pro_id" name="pro_id" value=<?php echo $row['pro_id']; ?> disabled>
                                            </div>

                                            <div class="form-group">
                                                <input style="width:50%;" type="hidden" class="form-control" id="pro_name" name="pro_name" value=<?php echo $row['pro_name']; ?>>
                                                <label for="pro_id">สินค้า</label>
                                                <input style="width:50%;" type="text" class="form-control" id="pro_name" name="pro_name" value=<?php echo "\"" . $row['pro_name'] . "\""; ?> disabled>
                                            </div>

                                          
                                            <div class="form-group">
                                                <label for="pro_stock">นำเอา</label>
                                                <input style="width:25%;" type="text" class="form-control" id="pro_stock" name="pro_stock" placeholder="0">
                                            </div> 

                                           
                                            <button onclick="return confirm_up()" type="sunmit" class="btn btn-danger">นำออก</button>
                                            <button type="reset" class="btn btn-success">ล้าง</button>
                                            <a href="index.php" class="btn btn-primary">ยกเลิก</a>
                                            </div>
                                    </form>
</div>                 
<br>
<br>
</body>

</html>
<?php
$conn->close(); 
?>