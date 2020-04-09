
    <?php 
    require_once('../../connect.php');
    //echo '<pre>',print_r ($_POST),'<pre>';
    if(isset($_POST['submit'])){
        //echo '<pre>',print_r ($_FILES['file']),'<pre>';
        $shoes_size=$_POST['shoes_size'];
        $shoes_name=$_POST['shoes_name'];
        $sql="INSERT INTO `shoes_size` VALUES ('','$shoes_size','$shoes_name')";
        $res= $conn->query($sql) or die($conn->error);

            if($res){
                echo '<script>alert("เพิ่มสินค้าสำเร็จแล้ว") </script>';
               header('Refresh:0; url=index.php');//สำเร็จ
            }else{
                echo $sql;
            }

       
    }else{
        header('Location: ../../../../login.php');  
    }   
    ?>