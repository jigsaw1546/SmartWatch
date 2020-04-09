
    <?php 
    require_once('../../connect.php');
    date_default_timezone_set('Asia/Bangkok');
    $date=date('Y-m-d');
    //echo '<pre>',print_r ($_POST),'<pre>';
    if(isset($_POST['submit'])){
        //echo '<pre>',print_r ($_FILES['file']),'<pre>';
        $product_type_name=$_POST['product_tag_name'];
        $product_type_id=$_POST['product_tag_id'];
        $sql="INSERT INTO `product_tag` VALUES ('$product_type_id','$product_type_name','$date')";
        $res= $conn->query($sql) or die($conn->error);

            if($res){
               
                echo '<script>alert("เพิ่มTagสินค้าสำเร็จแล้ว") </script>';
               header('Refresh:0; url=index.php');//สำเร็จ
            }else{
                echo $sql;
            }

       
    }else{
        header('Location: ../../../../login.php');  
    }   
    ?>