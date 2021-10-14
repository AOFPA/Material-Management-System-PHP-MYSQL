<?php
    include "config.php";
    if($conn->connect_error){
        echo "error";
    
    }
    $opt = $_POST['optinsert'];
    if($opt=="record"){
        $com_id = $_GET['com_id'];
        $pro_id = $_POST['pro_id']; 
        $com_id = $_GET['com_id'];

        $sql = "INSERT INTO `record` (`rec_id`, `pro_id`, `com_id`) VALUES (NULL, '$pro_id', '$com_id'); ";
    }elseif($opt=="product"){
      $pro_name = $_POST['pro_name']; 
      $pro_stock = $_POST['pro_stock']; 
      $cate_id = $_POST['cate_id']; 
      $pro_list = $_POST['pro_list']; 
      $pro_cost = $_POST['pro_cost']; 
      $pro_send = $_POST['pro_send']; 
      $sql = "INSERT INTO `product` (`pro_name`, `pro_stock`,`cate_id`,`pro_list`,`pro_cost`,`pro_send`) VALUES ('$pro_name', '$pro_stock','$cate_id','$pro_list','$pro_cost','$pro_send'); ";
    }elseif($opt=="company"){
      $com_name = $_POST['com_name']; 
      $sql = "INSERT INTO `company` (`com_name`) VALUES ('$com_name'); ";
    }elseif($opt=="category"){
      $cate_name = $_POST['cate_name'];
      $sql = "INSERT INTO category(cate_name) VALUES('$cate_name');";
    }

    if ($conn->query($sql) === TRUE) {
        if($opt=='record'){
            header("location: rec_show.php?com_id=" . $com_id);
        }else if($opt=='product'){
          header("location: pro_show.php");
        }else if($opt=='company'){
          header("location: com_show.php");
        }elseif($opt=='category'){
          header("location: cate_show.php");
        }

      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    $conn->close();
