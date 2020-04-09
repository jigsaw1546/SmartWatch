<?php 
// echo "<pre>";
// print_r($_POST); //เช็คการส่งค่าแบบARRAY
// echo "</pre>";
?>
<?php 
require_once('../../connect.php');
if (isset($_POST['submit'])) {
    $product_id=$_REQUEST['product_id']; ////รับค่า REQUEST //ค่ายังไม่มา
    $product_image = $_POST['product_image'];//รับค่า POST
    $product_name = $_POST['product_name'];
    $product_detail = $_POST['product_detail'];
    $product_price = $_POST['product_price'];
    $product_code = $_POST['product_code'];
    $product_tag = $_POST['product_tag'];
    $product_date = $_POST['product_date'];
  //  $imgUpload=$_FILES['imgUpload'];//รับค่า FILE
    $imgUpload_file= $_FILES['imgUpload']['name'];
    $temp = explode('.',$_FILES['imgUpload']['name']);
    $new_name = round(microtime(true)*9999) . '.' . end($temp); 
    $url = '../../../../assets/image/store/'. $new_name ;
        if(isset($product_image) != $imgUpload_file){ //ค่าเหมือนกัน เช่น aa.jpg aa.jpg
             $sql="UPDATE `product` SET `product_name` = '$product_name', `product_detail` = '$product_detail', `product_price` = '$product_price', `product_code` = '$product_code', `product_tag` = '$product_tag', `product_date` = '$product_date' WHERE `product_id`= '$product_id'";
             $result = $conn->query($sql) or die($conn->error);
             if($result){    
                echo '<script> alert("อัพเดทสำเร็จแล้ว") </script>';
                header('Refresh:0; url=form-edit.php?product_id='.$product_id.'');//สำเร็จ
             }
          
        }else{
            $product_image=$new_name;//เปลี่ยนค่า
            if ( move_uploaded_file($_FILES['imgUpload']['tmp_name'], $url ) ) {
                $sql="UPDATE `product` SET `product_name` = '$product_name',`product_image`='$product_image', `product_detail` = '$product_detail', `product_price` = '$product_price', `product_code` = '$product_code', `product_tag` = '$product_tag', `product_date` = '$product_date' WHERE `product_id`= '$product_id'";
                $result = $conn->query($sql) or die($conn->error);
                if($result){    
                    $_SESSION['product_image'] = $new_name;
                    echo '<script> alert("อัพเดทสำเร็จแล้ว") </script>';
                    header('Refresh:0; url=form-edit.php?product_id='.$product_id.'');//สำเร็จ
                }
            }
            
        }

} else {
    echo '<script> alert("อัพเดทไม่สำเร็จ") </script>';
    header('location:form-edit.php?product_id='.$product_id.'');//ไม่สำเร็จ
}
?>
