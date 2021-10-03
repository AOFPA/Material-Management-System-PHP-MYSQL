<?php include('css.php');
include("config.php");
error_reporting(0);
$com_id = $_GET['com_id'];
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
        <?php include('menu_rec.php'); ?>
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
                    <div class="row">
                      <div class="pull-right">
                        <div class="box-body">
                          <div class="form-group">


                            <form method="GET" action="rec_show.php">



                              <select onchange='this.form.submit()' id="com_id" name="com_id" class="form-control">
                                <option value="" disabled selected>เลือกบริษัท</option>
                                <?php
                                $usql = "SELECT * FROM company";
                                $res = $conn->query($usql);
                                if ($res->num_rows > 0) {
                                  while ($row = $res->fetch_assoc()) {
                                    echo "<option  value=" . '"' . $row['com_id'] . '"' . ">"
                                      . $row['com_name']  . "</option>";
                                  }
                                }


                                ?>

                              </select>

                              <!-- <br>
                      <button type="sunmit" class="btn btn-success ">ตกลง</button> -->
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php include('list.php'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- FORM CREATE -->
      <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">เพิ่มรายการ</h4>
            </div>
            <div class="modal-body">
              <form method="POST" action="insert.php?com_id=<?php echo $com_id ?>">
                <input type="hidden" id="optinsert" name="optinsert" value="record">

                <div class="form-group">
                  <label for="cars">ประเภท:</label>
                  <select id="cate_id" name="cate_id" class="form-control">
                  <option selected disabled>กรุณาเลือกประเภทสินค้า</option>
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
                  <label for="cars">เลือกสินค้า:</label>
                  <select id="pro_id" name="pro_id" class="form-control">
                  <!-- <option selected disabled>กรุณาเลือกประเภทก่อน</option> -->
              
                    
                    <!-- <?php
                    $usql02 = "SELECT * FROM product";
                    $res02 = $conn->query($usql02);
                    if ($res02->num_rows > 0) {
                      while ($row02 = $res02->fetch_assoc()) {
                        echo "<option  value=" . '"' . $row02['pro_id'] . '"' . ">"
                          . $row02['pro_name']  . "</option>";
                      }
                    }
                    ?> -->
                  </select>
                </div>

                <div class="form-group">
                  <label for="rec_cost" class="control-label">ราคาทุน</label>
                  <input type="text" class="form-control" id="rec_cost" name="rec_cost" placeholder="0.00">
                </div>

                <div class="form-group">
                  <label for="rec_list" class="control-label">ราคาปลีก</label>
                  <input type="text" class="form-control" id="rec_list" name="rec_list" placeholder="0.00">
                </div>

                <div class="form-group">
                  <label for="rec_send" class="control-label">ราคาส่ง
                  </label>
                  <input type="text" class="form-control" id="rec_send" name="rec_send" placeholder="0.00">
                </div>


                <a href="rec_show.php?com_id=<?php echo $com_id ?>" class="btn btn-default">ยกเลิก</a>
                <button type="submit" class="btn btn-primary">เพิ่ม</button>

                <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
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
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>

</body>

</html>
<?php include('footerjs.php');

$conn->close();
?>