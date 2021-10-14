<?php
include('css.php');
include("config.php");
$rec_id = $_GET['rec_id'];
$com_id = $_GET['com_id'];
$pro_id = $_GET['pro_id'];
$sql = "SELECT * FROM view_rec_pro_cate_com1
        WHERE rec_id='$rec_id';";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
?>

<body>
    <?php include('top.php'); ?>




    <div class="container">
        <br>


        <form method="POST" action="update.php?com_link=<?php echo $com_id ?>">
            <input type="hidden" id="optupdate" name="optupdate" value="record">


            <div class="form-group">
                <input style="width:50%;" type="hidden" class="form-control" id="rec_id" name="rec_id" value=<?php echo $row['rec_id']; ?>>
                <label for="rec_id">รหัส</label>
                <input style="width:50%;" type="text" class="form-control" id="rec_id" name="rec_id" value=<?php echo $row['rec_id']; ?> disabled>
            </div>

            <div class="form-group">
                <label for="cars">ประเภท:</label>
                <select id="cate_id" name="cate_id" class="form-control" style="width:300px;">
                    <option selected disabled><?php echo "ข้อมูลเดิม : " . $row['cate_name'] ?></option>
                    <?php
                    $usql02 = "SELECT * FROM category";
                    $res02 = $conn->query($usql02);
                    if ($res02->num_rows > 0) {
                        while ($row02 = $res02->fetch_assoc()) {
                            echo "<option  value=" . '"' . $row02['cate_id'] . '"' . ">"
                                . $row02['cate_name']  . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="pro_id">สินค้า</label>
                <select id="pro_id" name="pro_id" class="form-control" style="width:300px;">
                    <option selected disabled><?php echo "ข้อมูลเดิม : " . $row['pro_name'] ?></option>
                    <?php

                    // echo "<option value=" . '"' . $row['pro_id'] . '"' . ">"
                    //     . $row['pro_name'] . "</option>";

                    $usql = "SELECT * FROM product 
                                                                 ORDER BY pro_id;";
                    $res = $conn->query($usql);
                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_assoc()) {
                            echo "<option value=" . '"' . $row['pro_id'] . '"' . ">"
                                . $row['pro_name'] . "</option>";
                        }
                    }
                    $res = $conn->query($sql);
                    $row = $res->fetch_assoc();
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="com_id">บริษัท</label>
                <select id="com_id" name="com_id" class="form-control" style="width:300px;">
                

                    <?php

                    echo "<option value=" . '"' . $row['com_id'] . '"' . ">"
                        . $row['com_name'] . "</option>";

                    $usql = "SELECT * FROM company WHERE com_id != $com_id
                                                                 ORDER BY com_id;";
                    $res = $conn->query($usql);
                    if ($res->num_rows > 0) {
                        while ($row = $res->fetch_assoc()) {
                            echo "<option value=" . '"' . $row['com_id'] . '"' . ">"
                                . $row['com_name'] . "</option>";
                        }
                    }
                    $res = $conn->query($sql);
                    $row = $res->fetch_assoc();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <button onclick="return confirm_up()" type="sunmit" class="btn btn-danger">แก้ไข</button>
                <button type="reset" class="btn btn-success">ล้าง</button>
                <a href="rec_show.php?com_id=<?php echo $com_id ?>" class="btn btn-primary">ยกเลิก</a>
            </div>


            <script type="text/javascript">
                  $('#cate_id').change(function(){
                    var id = $(this).val();
                    $.ajax({
                      type: "post",
                      url: "ajax.php",
                      data: {id:id,function:'category'},
                      success: function(data) {
                        $('#pro_id').html(data)
                      }
                    });
                  });
                </script>
        </form>

    </div>

    <br>


</body>

</html>
<?php
$conn->close(); ?>