<?php
include("config.php");

$sql = "SELECT * FROM company
        ORDER BY com_id;";
$result = $conn->query($sql);

?>
<div class="pull-right">
  <button data-toggle="modal" data-target="#create" data-whatever="@mdo" class="btn btn-success">เพิ่มข้อมูล</button>
  </div>
  <br>
  <br>
<table id="example1" class="table table-bordered table-hover table-striped">
  <thead >
    <tr class="info">
      <th>รหัส</th>
      <th>บริษัท</th>
      <th width="15%">ดำเนินการ</th>
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
     <td><?php echo $row['com_id'] ?></td>
     <td><?php echo $row['com_name'] ?></td>
     <td>
     <a href="rec_show.php?com_id=<?php echo $row['com_id'] ?>" class="btn btn-primary btn-sm">สินค้า</a>
       <a  href="com_up.php?com_id=<?php echo $row['com_id'] ?>" data-toggle="modal" data-target="#create" data-whatever="@mdo" class="btn btn-warning btn-sm">แก้ไข</a>
       <a href="com_del.php?com_id=<?php echo $row['com_id'] ?>" onclick="return confirm_delete()" class="btn btn-danger btn-sm">ลบ</a>
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

