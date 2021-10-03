<?php
include("config.php");

$com_id = $_GET['com_id'];

$sql = "SELECT * FROM view_rec_pro_cate_com
        WHERE com_id = $com_id
        ORDER BY rec_id;";
$result = $conn->query($sql);

$sql01 = "SELECT * FROM company
        WHERE com_id = $com_id;";

$res = $conn->query($sql01);
$com = $res->fetch_assoc()
?>
  <div class="pull-right">
  <button data-toggle="modal" data-target="#create" data-whatever="@mdo" class="btn btn-success">เพิ่มข้อมูล</button>
  </div>
 

  <h3  class="col-md-6 col-md-offset-3 text-center" for="com_id"><?php echo $com['com_name'] ?></h3>
  

<table id="example1" class="table table-bordered  table-hover table-striped">
  <thead >
    <tr class="info">
      <th>ลำดับ</th>
      <th>สินค้า</th>
      <th>ประเภท</th>
      <th>ทุน</th>
      <th>ปลีก</th>
      <th>ส่ง</th>
      <th  width="15%">ดำเนินการ</th>
    </tr>
  </thead>

  <tbody >
  <?php
  if($result->num_rows > 0) {
    $no = 0;
    while($row = $result->fetch_assoc()){
    $no = ++$no ; 
  ?>
    <tr>
     <td><?php echo $no ?></td>
     <td><?php echo $row['pro_name'] ?></td>
     <td><?php echo $row['cate_name'] ?></td>
     <td><?php echo $row['rec_cost'] ?></td>
     <td><?php echo $row['rec_list'] ?></td>
     <td><?php echo $row['rec_send'] ?></td>
     <td>
       <a  href="rec_up.php?com_id=<?php echo $com_id ?>&rec_id=<?php echo $row['rec_id'] ?>&pro_id=<?php echo $row['pro_id'] ?>" data-toggle="modal" data-target="#create" data-whatever="@mdo" class="btn btn-warning btn-sm">แก้ไข</a>
       <a onclick="return confirm_delete()" href="rec_del.php?rec_id=<?php echo $row['rec_id'] ?>&com_id=<?php echo $row['com_id'] ?>" class="btn btn-danger btn-sm">ลบ</a>
     </td>
    </tr>
    <?php
        }
  }
  // else {
  //   echo "0 results";
  // }

  ?>
  </tbody>

</table>

