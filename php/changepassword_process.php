<?php 
 require_once('connect.php');

 if(isset($_POST['submit'])){
    $oldpassword = $_POST['oldpassword'];
    $npassword = $_POST['npassword'];
    $repassword = $_POST['repassword'];

    if($npassword == $repassword){
        $sql="SELECT * FROM members WHERE  mem_id = '".$_SESSION["mem_id"]."'";
        $result = $conn->query($sql);
        $row= $result->fetch_assoc();

        if(password_verify($oldpassword, $row['mem_password'])){
            $hashed_password = password_hash($npassword, PASSWORD_DEFAULT);
             $sql_pw = "UPDATE `members` SET 
                        `mem_password` = '".$hashed_password."'
                        WHERE mem_id ='".$_SESSION["mem_id"]."'";
            $result_pw = $conn->query($sql_pw)or die($conn->error);
            if($result_pw){
                echo '<script> alert("เปลี่ยนรหัสผ่านสำเร็จ")</script>';
                header('Refresh:0; url=../index.php');
            }

                        

        }else{
            echo '<script> alert("รหัสผ่านเดิมไม่ถูกต้อง")</script>';
            header('Refresh:0; url=../index.php');
        }

    }else{
        echo '<script>alert("รหัสผ่านใหม่ไม่ตรงกัน")</script>';
        header('Refresh:0; url=../index.php');
    }
 }else{
     header('location:../index.php');
 }

?>