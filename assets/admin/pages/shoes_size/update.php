<?php 
include_once('../authen.php');
include_once('../../connect.php');
?>
<?php

//echo '<pre>',print_r ($_POST),'<pre>';
$shoes_id=$_POST['shoes_id'];
$shoes_size=$_POST['shoes_size'];
$shoes_name=$_POST['shoes_name'];
$sql="UPDATE `shoes_size` SET `shoes_size` = '$shoes_size', `shoes_name` = '$shoes_name' WHERE `shoes_id` = '$shoes_id'";
if(mysqli_query($conn,$sql)){
    echo '<script> alert("แก้ไขข้อมูลเสร็จสิ้น!")</script>'; 
    header('Refresh:0; url=index.php');
}else{
    echo "Sql Error:ไม่สามารถแก้ไขข้อมูลได้".$sql; 
    header('Refresh:5; url=index.php');
}
    //echo '<pre>'.print_r($_POST),'<pre>';

?>