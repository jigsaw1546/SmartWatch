<?php require_once('../php/connect.php');?>
<?php
date_default_timezone_set("Asia/Bangkok");
 //echo 'POST<pre>',print_r($_POST),'</pre>';
error_reporting(~E_NOTICE);
$product_id=$_POST['product_id'];
$mem_id=$_SESSION['mem_id'];
$datetime=date("Y-m-d H:i:s");

$carttotal=$_SESSION['carttotal'];


if(isset($mem_id)){
    $sqlse="SELECT * FROM product WHERE product_id = $product_id";
    $resultse= mysqli_query($conn,$sqlse);
    $rowse=mysqli_fetch_array($resultse);
    $product_price=$rowse['product_price'];
  
    if($carttotal==4){
        echo '<script>alert("เลือกสินค้าได้มากสุด4ชิ้น") </script>';
        header('Refresh:0; url=../stores.php');//สำเร็จ
       
    }else{
        if(isset($_POST['addcart'])){
            $sql="INSERT INTO `cart` VALUES ('','$product_id','$mem_id','$product_price','$datetime')";
             $res= $conn->query($sql) or die($conn->error);
                if($res){
                    echo '<script>alert("เพิ่มลงตระกร้าแล้ว") </script>';
                  header('Refresh:0; url=../stores.php');//สำเร็จ
                }else{
                    echo $sql;
                }
        }else{
            
            echo ("<script LANGUAGE='JavaScript'>
            window.location.href='../index.php';
            </script>"); 
        }
    }
    
}else{//เช็คเมื่อไม่ได้loginแล้วกดเพิม่สินค้า
    echo ("<script LANGUAGE='JavaScript'>
        window.alert(' เข้าสู่ระบบก่อน');
        window.location.href='../index.php';
        </script>"); 

}
?>