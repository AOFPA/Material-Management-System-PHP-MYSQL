<?php include('css.php');
include("config.php");
error_reporting(0);
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Main Header -->
    <?php include('menutop.php'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../dist/img/profile.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>คุณ</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <?php include('menu_pro.php'); ?>
      </section>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <section class="content-header">
        <!-- <h1>
        ::สวัสดีคุณ ::
        
        </h1> -->
      </section>

      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box-body">
                    <?php include('pro_read.php'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>




      <!-- FORM CREATE --------------------------------------------------------------------------------->
      <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">เพิ่มสินค้า</h4>
            </div>
            <div class="modal-body">


              <form method="POST" action="insert.php">
                <input type="hidden" id="optinsert" name="optinsert" value="product">



                <div class="form-group">
                  <label for="pro_name" class="control-label">ชื่อสินค้า</label>
                  <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="**จำเป็นต้องกรอก**">
                </div>

                <div class="form-group">
                  <label for="cars">ประเภท:</label>
                  <select id="cate_id" name="cate_id" class="form-control">
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
                  <label for="pro_cost" class="control-label">ราคาทุน</label>
                  <input type="text" class="form-control" id="pro_cost" name="pro_cost" placeholder="0.00">
                </div>

                <div class="form-group">
                  <label for="pro_list" class="control-label">ราคาปลีก</label>
                  <input type="text" class="form-control" id="pro_list" name="pro_list" placeholder="0.00">
                </div>

                <div class="form-group">
                  <label for="pro_send" class="control-label">ราคาส่ง
                  </label>
                  <input type="text" class="form-control" id="pro_send" name="pro_send" placeholder="0.00">
                </div>

                <div class="form-group">
                  <label for="pro_stock" class="control-label">จำนวนสินค้า</label>
                  <input type="text" class="form-control" id="pro_stock" name="pro_stock" placeholder="0">
                </div>

                <div class="form-group">
                  <label for="pro_note" class="control-label">หมายเหตุ</label>
                  <input type="text" class="form-control" id="pro_note" name="pro_note" placeholder="ไม่จำเป็นต้องระบุ">
                </div>

                <button type="submit" class="btn btn-primary">เพิ่ม</button>
                <a href="pro_show.php" class="btn btn-default">ยกเลิก</a>

              </form>
            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>
      <!-- End Form ------------------------------------------------------------------------------------>


</body>

</html>
<?php include('footerjs.php');
$conn->close();

?>