<?php
include("config.php");

$sql = "SELECT pro_id,pro_name,cate_name,cate_id FROM view_pro_cate
        ORDER BY pro_id;";
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
      <th>สินค้า</th>
      <th>ประเภท</th>
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
     <td><?php echo $row['pro_id'] ?></td>
     <td><?php echo $row['pro_name'] ?></td>
     <td><?php echo $row['cate_name'] ?></td>
     <td>

       <a href="pro_up.php?pro_id=<?php echo $row['pro_id'] ?>&cate_id=<?php echo $row['cate_id'] ?>"  data-toggle="modal" data-target="#create" data-whatever="@mdo" class="btn btn-warning btn-sm">แก้ไข</a>
       <a onclick="return confirm_delete()" href="pro_del.php?pro_id=<?php echo $row['pro_id'] ?>" class="btn btn-danger btn-sm">ลบ</a>
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

