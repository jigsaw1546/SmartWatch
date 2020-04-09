<?php 
 function redirect($path){
    header('refresh:0; url=../'.$path.'.php');

}
function datathai1($s){
	if($s!='0000-00-00'){
		$d=explode("-",$s);
		$y=$d[0]+543;
		return $d[2]."/".$d[1]."/".$y;	
		}else{
			return $s;
			}
	}
?>
<?php 
function datethai2($S){
	if($S!='0000-00-00'){
		$d=explode("-",$S);
		$y=$d(2)+543;
		return $d[2]."/".$d[1]."/".$y;
		}else{
			return $S;
			}
	}

//Alert แจ้งเตือนต่างๆ
function Alert_Return($text){	
	echo "<script language=\"javascript\">";
	echo "alert('$text');";
	echo "history.back();";
	echo "</script>";		
		}
//Alert แจ้งเตือนต่างๆ
function Alert($text,$link){	
	echo "<script language=\"javascript\">";
	echo "alert('$text');";
	echo "window.location='$link'";
	echo "</script>";		
		}

//แปลงวันที่จาก d-m-Y => Y-m-d
function cover_date($date){
    if($date!=""){
        $date=explode("-",$date);
        return $date[2]."-".$date[1]."-".$date[0];
    }
    
}
//เพิ่มไฟล์อัพโหลด
function Upload_File ($filename,$folder){
	//เก็บรูปไว้ในโฟลเดอร์ปลายทาง
	move_uploaded_file($_FILES["file"]["tmp_name"],"$folder".$filename);
	
	}
function Chk_Insert ($sql,$text,$link){
		if($sql>0){
			
		Alert($text,$link);
		
		}
		else {
		
		Alert_Return('Not Complete!');
		
		}
		
		}
			
?>
<?php 
function Chk_Update($sql,$text){	
	if($sql>0){
		
		Alert_Return($text);
		
		}
		
		else{
		
		Alert_Return('Not Complete!');
		
		}
		
	}	
?>
<?php //<?php echo datathai1($rowdist['new_date'])วิธีเรียกใช้ ?>
























<?php

?>