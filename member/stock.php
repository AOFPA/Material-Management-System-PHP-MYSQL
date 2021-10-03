<?php
include("config.php");

$sql = "SELECT * FROM view_pro_cate
        ORDER BY pro_id;";
$result = $conn->query($sql);

?>

<table id="example1" class="table table-bordered  table-hover table-striped">
  <thead >
    <tr class="info">
      <th>รหัส</th>
      <th>สินค้า</th>
      <th>ประเภท</th>
      <th>คงเหลือ</th>
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
     <td><?php echo $row['pro_stock'] ?></td>
     <td>
       <a href="add.php?pro_id=<?php echo $row['pro_id'] ?>" data-toggle="modal" data-target="#add" data-whatever="@mdo" class="btn btn-success btn-sm">+</a>
       <a href="stock_up.php?pro_id=<?php echo $row['pro_id'] ?>" data-toggle="modal" data-target="#add" data-whatever="@mdo" class="btn btn-primary btn-sm">แก้ไข</a>
       <a href="out.php?pro_id=<?php echo $row['pro_id'] ?>" data-toggle="modal" data-target="#add" data-whatever="@mdo" class="btn btn-danger btn-sm">-</a>
       
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

