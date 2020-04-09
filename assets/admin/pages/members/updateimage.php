<?php 
    require_once('../../connect.php');
    if (isset($_POST['submit'])) {
        $mem_id=$_REQUEST['mem_id'];
        $temp = explode('.',$_FILES['file']['name']);
        $new_name = round(microtime(true)*9999) . '.' . end($temp); 
        $url = '../../../../assets/image/profile/'. $new_name ;
        if ( move_uploaded_file($_FILES['file']['tmp_name'], $url ) ) {
            $sql = "UPDATE `members` SET `mem_image` = '".$new_name."' WHERE `mem_id` = '".$mem_id."' ";
            $result = $conn->query($sql) or die($conn->error);
            if($result){    
                $_SESSION['mem_image'] = $new_name;
                echo '<script> alert("อัพเดทรูปภาพสำเร็จแล้ว") </script>';
                header('Refresh:0; url=form-edit.php?mem_id='.$mem_id.'');//สำเร็จ
            }
        }

    } else {
        echo '<script> alert("อัพเดทรูปภาพไม่สำเร็จ") </script>';
        header('location:form-edit.php?mem_id='.$mem_id.'');//ไม่สำเร็จ
    }


?>