<?php 
include_once('../authen.php');
include_once('../../connect.php');
?>
<?php
    $product_id=$_GET['product_id'];
    $sql="DELETE FROM `product` WHERE product_id = $product_id";
   
    if (mysqli_query($conn, $sql)) {
        echo '<script> alert("ลบข้อมูลเสร็จสิ้น!")</script>'; 
        header('Refresh:0; url=index.php');
    } else {
        echo "Error deleting record: ";
         header('Refresh:0; url=index.php');
	}
	mysqli_close($conn);
?>