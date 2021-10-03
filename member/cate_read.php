<?php
include("config.php");

$sql = "SELECT * FROM category
        ORDER BY cate_id;";
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
      <th>ประเภท</th>
      <th width="15%">ดำเนินการ</th>
    </tr>
  </thead>

  <tbody >
  <?php
  if($result->num_rows > 0) {

    while($row = $result->fetch_assoc()){

  ?>
    <tr>
     <td><?php echo $row['cate_id'] ?></td>
     <td><?php echo $row['cate_name'] ?></td>
     <td>
       <a href="cate_up.php?cate_id=<?php echo $row['cate_id'] ?>" data-toggle="modal" data-target="#create" data-whatever="@mdo" class="btn btn-warning btn-sm">แก้ไข</a>
       <a href="cate_del.php?cate_id=<?php echo $row['cate_id'] ?>" onclick="return confirm_delete()" class="btn btn-danger btn-sm">ลบ</a>
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

