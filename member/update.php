<?php
    include "config.php";

    $opt = $_POST['optupdate'];
    if($opt=="record"){
        $rec_id = $_POST['rec_id'];
        $pro_id = $_POST['pro_id']; 
        $com_id = $_POST['com_id'];

        $com_link = $_GET['com_link'];

        $sql = "UPDATE record SET pro_id='$pro_id',com_id='$com_id' WHERE rec_id='$rec_id';";

    }elseif($opt=="product"){
        $pro_id = $_POST['pro_id'];
        $pro_name = $_POST['pro_name'];
        $cate_id = $_POST['cate_id'];
        $pro_list = $_POST['pro_list']; 
        $pro_cost = $_POST['pro_cost']; 
        $pro_send = $_POST['pro_send']; 
        $pro_note = $_POST['pro_note']; 
        $sql = "UPDATE product SET pro_name='$pro_name',cate_id='$cate_id', pro_list ='$pro_list',pro_cost='$pro_cost',pro_send='$pro_send',pro_note='$pro_note' WHERE pro_id='$pro_id';";
    }elseif($opt=="company"){
        $com_id = $_POST['com_id'];
        $com_name = $_POST['com_name'];
        $sql = "UPDATE company SET com_name='$com_name' WHERE com_id='$com_id';";
    }elseif($opt=="stock"){
        $pro_id = $_POST['pro_id'];
        $pro_stock = $_POST['pro_stock'];
        $sql = "UPDATE product SET pro_stock='$pro_stock' WHERE pro_id='$pro_id';";
    }elseif($opt=="add"){
        $pro_id = $_POST['pro_id'];
        $pro_stock = $_POST['pro_stock'];
        $sql = "UPDATE product SET pro_stock=pro_stock+'$pro_stock' WHERE pro_id='$pro_id';";
    }elseif($opt=="out"){
        $pro_id = $_POST['pro_id'];
        $pro_stock = $_POST['pro_stock'];
        $sql = "UPDATE product SET pro_stock=pro_stock-'$pro_stock' WHERE pro_id='$pro_id';";
    }elseif($opt=="category"){
        $cate_id = $_POST['cate_id'];
        $cate_name = $_POST['cate_name'];
        $sql = "UPDATE category SET cate_name='$cate_name' WHERE cate_id ='$cate_id';";
    }elseif($opt=="product01"){
        $pro_id = $_POST['pro_id'];
        $pro_name = $_POST['pro_name'];
        $cate_id = $_POST['cate_id'];
        $pro_list = $_POST['pro_list']; 
        $pro_cost = $_POST['pro_cost']; 
        $pro_send = $_POST['pro_send']; 
        $pro_note = $_POST['pro_note']; 
        $sql = "UPDATE product SET pro_name='$pro_name',cate_id='$cate_id', pro_list ='$pro_list',pro_cost='$pro_cost',pro_send='$pro_send',pro_note='$pro_note' WHERE pro_id='$pro_id';";
    }

    $res = $conn->query($sql);
    if($res){
        if($opt=="record"){
            header("Location: rec_show.php?com_id=" . $com_link);
        }else if ($opt=="product"){
            header("Location: pro_show.php");
        }else if ($opt=="company"){
            header("Location: com_show.php");
        }else if ($opt=="stock"){
            header("Location: index.php");
        }else if ($opt=="add"){
            header("Location: index.php");
        }else if ($opt=="out"){
            header("Location: index.php");
        }else if ($opt=="category"){
            header("Location: cate_show.php");
        }else if ($opt=="product01"){
            header("Location: pro_cate.php?cate_id=" . $cate_id);
        }
    }else{
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
?>