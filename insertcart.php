<?php 
if(isset($_SESSION['mem_id'])){
    echo $_SESSIOB['mem_id'];
    if(isset($_POST['addcart'])){
        echo "OK";
    }else{
        echo "No";
    }
}else{
    echo "กรุณาlogin";
}


?>