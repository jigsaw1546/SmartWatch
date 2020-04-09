<?php 
include_once('../authen.php');
include_once('../../connect.php');
?>
<?php
    $payment_id=$_GET['payment_id'];
    $sql="DELETE FROM `payment` WHERE payment_id = $payment_id";
   
    if (mysqli_query($conn, $sql)) {
        echo '<script> alert("ลบข้อมูลเสร็จสิ้น!")</script>'; 
        header('Refresh:0; url=index.php');
	} else {
        echo "Error deleting record: " . mysqli_error($connect);
        header('Refresh:0; url=index.php');
	}
	mysqli_close($conn);
?>