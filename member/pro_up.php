<?php
include('css.php');
include("config.php");

$pro_id = $_GET['pro_id'];
$cate_id = $_GET['cate_id'];
$sql = "SELECT * FROM view_pro_cate
        WHERE pro_id='$pro_id';";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
?>

<body>
    <?php include('top.php'); ?>
    <br>
    <div class="container">

        <form method="POST" action="update.php">
            <input type="hidden" id="optupdate" name="optupdate" value="product">


            <div class="form-group">
                <input style="width:50%;" type="hidden" class="form-control" id="pro_id" name="pro_id" value=<?php echo $row['pro_id']; ?>>
                <label for="pro_id">รหัสสินค้า</label>
                <input style="width:50%;" type="text" class="form-control" id="pro_id" name="pro_id" value=<?php echo $row['pro_id']; ?> disabled>
            </div>



            <div class="form-group">
                <label for="pro_name">ชื่อสินค้า</label>
                <input style="width:50%;" type="text" class="form-control" id="pro_name" name="pro_name" value=<?php echo "\"" . $row['pro_name'] . "\""; ?>>
            </div>

            <div class="form-group">
                <label for="cate_id">ประเภท</label>
                <select id="cate_id" name="cate_id" class="form-control" style="width:300px;">
                    <?php

                    echo "<option value=" . '"' . $row['cate_id'] . '"' . ">"
                        . $row['cate_name'] . "</option>";

                    $usql = "SELECT * FROM category WHERE cate_id != $cate_id
                                                                 ORDER BY cate_id;";
                    $res = $conn->query($usql);
                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_assoc()) {
                            echo "<option value=" . '"' . $row['cate_id'] . '"' . ">"
                                . $row['cate_name'] . "</option>";
                        }
                    }
                    $res = $conn->query($sql);
                    $row = $res->fetch_assoc();
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="pro_cost" class="control-label">ราคาทุน</label>
                <input style="width:50%;" type="text" class="form-control" id="pro_cost" name="pro_cost" value=<?php echo "\"" . $row['pro_cost'] . "\""; ?>>
            </div>

            <div class="form-group">
                <label for="pro_list" class="control-label">ราคาปลีก</label>
                <input style="width:50%;" type="text" class="form-control" id="pro_list" name="pro_list" value=<?php echo "\"" . $row['pro_list'] . "\""; ?>>
            </div>

            <div class="form-group">
                <label for="pro_send" class="control-label">ราคาส่ง
                </label>
                <input style="width:50%;" type="text" class="form-control" id="pro_send" name="pro_send" value=<?php echo "\"" . $row['pro_send'] . "\""; ?>>
            </div>


            <button onclick="return confirm_up()" type="sunmit" class="btn btn-danger">แก้ไข</button>
            <button type="reset" class="btn btn-success">ล้าง</button>
            <a href="pro_show.php" class="btn btn-primary">ยกเลิก</a>
    </div>
    </form>

    </div>
    ิ<br>

</body>

</html>
<?php
$conn->close(); ?>