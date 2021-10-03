<?php 
    include("config.php");
    if(isset($_POST['function']) && $_POST['function'] == 'category'){
        $cate_id = $_POST['id'];
        $sql = "SELECT * FROM view_pro_cate WHERE cate_id = '$cate_id' ";
        $res = $conn->query($sql);
        echo "<option selected disabled>กรุณาเลือกสินค้า</option>" ;
        while ($row = $res->fetch_assoc()) {
            echo "<option  value=" . '"' . $row['pro_id'] . '"' . ">"
              . $row['pro_name']  . "</option>";
          }
        exit();
    }
    // echo $_POST['function'];
    // exit();
?>