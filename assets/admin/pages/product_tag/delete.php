<?php 
include_once('../authen.php');
include_once('../../connect.php');
?>
<?php
    $product_tag_id=$_GET['product_tag_id'];
    $sql="DELETE FROM `product_tag` WHERE product_tag_id = $product_tag_id";
   
    if (mysqli_query($conn, $sql)) {
        echo '<script> alert("ลบข้อมูลเสร็จสิ้น!")</script>'; 
        header('Refresh:0; url=index.php');
	} else {
        echo "Error deleting record: " . mysqli_error($connect);
        header('Refresh:0; url=index.php');
	}
	mysqli_close($conn);
?>