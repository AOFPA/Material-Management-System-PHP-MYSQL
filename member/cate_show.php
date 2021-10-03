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
        <?php include('menu_cate.php'); ?>
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
                    <?php include('cate_read.php'); ?>
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
              <h4 class="modal-title" id="exampleModalLabel">เพิ่มประเภทสินค้า</h4>
            </div>
            <div class="modal-body">


              <form method="POST" action="insert.php">
                <input type="hidden" id="optinsert" name="optinsert" value="category">



                <div class="form-group">
                  <label for="cate_name" class="control-label">ชื่อประเภทสินค้า</label>
                  <input type="text" class="form-control" id="cate_name" name="cate_name" placeholder="ตัวอย่าง เช่น ไม้ เหล็ก">
                </div>


                <button type="submit" class="btn btn-primary">เพิ่ม</button>
                <a href="cate_show.php" class="btn btn-default">ยกเลิก</a>

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