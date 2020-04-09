
    <?php 
    require_once('../../connect.php');
    //echo '<pre>',print_r ($_POST),'<pre>';
    if(isset($_POST['submit'])){
       // echo '<pre>',print_r ($_FILES['file']),'<pre>';
        $file=$_POST['file'];
        $product_name=$_POST['product_name'];
        $product_detail=$_POST['product_detail'];
        $product_price=$_POST['product_price'];
        $product_code=$_POST['product_code'];
        $product_tag=$_POST['product_tag'];
        $product_date=$_POST['product_date'];
       $temp=explode('.',$_FILES['file']['name']);
        $new_namestore=round(microtime(true)*9999) . '.' . end($temp);
        $url='../../../../assets/image/store/'. $new_namestore;
        if(move_uploaded_file($_FILES['file']['tmp_name'],$url)){
            $sql="INSERT INTO `product` VALUES ('','$product_name','$product_detail','$new_namestore','$product_code','$product_price','$product_tag','$product_date')";
        $res= $conn->query($sql) or die($conn->error);
            if($res){
                $_SESSION['product_image'] = $new_namestore;
               echo '<script>alert("เพิ่มสินค้าสำเร็จแล้ว") </script>';
                header('Refresh:0; url=index.php');//สำเร็จ
            }else{
                echo $sql;
            }
        }

       
    }else{
       header('Location: ../../../../login.php');  
    }   
    ?>