<?php 
include_once('../authen.php');
include_once('../../connect.php');
?>
<?php

//echo '<pre>',print_r ($_POST),'<pre>';
$product_tag_name=$_POST['product_tag_name'];
$product_tag_id=$_POST['product_tag_id'];
$sql="UPDATE `product_tag` SET`product_tag_name` = '$product_tag_name' WHERE `product_tag_id` = '$product_tag_id'";
if(mysqli_query($conn,$sql)){
    echo '<script> alert("แก้ไขข้อมูลเสร็จสิ้น!")</script>'; 
    header('Refresh:0; url=index.php');
}else{
    echo "Sql Error:ไม่สามารถแก้ไขข้อมูลได้".$sql; 
    header('Refresh:5; url=index.php');
}
    //echo '<pre>'.print_r($_POST),'<pre>';

?>