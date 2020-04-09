<?php 
 require_once('../php/connect.php');
 $cart_id=$_GET['cart_id'];
 $sql="DELETE FROM `cart` WHERE cart_id = $cart_id";

 if (mysqli_query($conn, $sql)) {
     echo '<script> alert("ลบข้อมูลเสร็จสิ้น!")</script>'; 
     header('Refresh:0; url=../index.php');
 } else {
     echo "Error deleting record: " . mysqli_error($connect);
     header('Refresh:0; url=../index.php');
 }
 mysqli_close($conn);


?>