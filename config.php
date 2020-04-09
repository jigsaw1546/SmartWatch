<?php
// นำค่าภาษาที่เลือกมาเก็บไว้ที่ตัวแปร โดยกำหนดค่าเริ่มต้นให้เป็นภาษาไทย ถ้ายังไม่ได้คลิกเลือกภาษา
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'th' ;

if($lang == 'th')
{
    $home = 'หน้าแรก';
    $store = 'สินค้า';
    $about = 'เกี่ยวกับเรา';
    $signin = 'เข้าสู่ระบบ';
    $signup = 'สมัครสมาชิก';
    $signout = 'ออกจากระบบ';
    $changeprofile = "แก้ไขข้อมูลส่วนตัว";
    $changepassword = "เปลี่ยนรหัสผ่าน";
    $Service = "บริการ";
    $Freeshipping = "จัดส่งฟรี";
    $Support24hr = "ดูแลตลอด 24 ชัวโมง";
    $CashonDelivery = "เก็บเงินปลายทาง";
    $Contact = "ติดต่อ";
    $faddress = "บ้านบึง ชลบุรี 20220";
    $femail = "info@example.com";
    $ftel = "+ 01 234 567 88";
    $lusername = "ชื่อผู้ใช้";
    $lpassword = "รหัสผ่าน"; 
    $click = " คลิ๊ก";
    $close = "ปิด";
    $gname = "ชื่อ";
    $glname = "นามสกุล";
    $gemail = "อีเมลล์";
    $gtel = "เบอร์โทรศัพท์";
    $gconfpass = "โปรดใส่รหัสผ่านอีกครั้ง";
    $NewPassword = "รหัสผ่านใหม่";
    $gconfpass2 = "โปรดใส่รหัสผ่านใหม่อีกครั้ง";
    $orderhistory= "ประวัติการสั่งซื้อ";
    $history= "ประวัติ";
    $price="ราคา";
    $baht="บาท";
    $cart= "ตะกร้า";
    $cartforme="ตะกร้าของฉัน";
    $cartmore="ดูตะกร้าสินค้าทั้งหมด";
    $image="รูปภาพ";
    $nameproduct="ชื่อสินค้า";
    $price="ราคา";
    $date="วันที่";
    $continue="ทำรายการต่อ";
    $confirm="ยืนยันรายการ";
    $totalprice = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ราคารวมสินค้าทั้งหมด";
    $discountall="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ส่วนลดสำหรับโปรโมชั่นทั้งหมด";
    $allprice="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำนวนเงินทั้งหมด";
    $notshipping="(ไม่รวมค่าจัดส่ง)";
    $address="ที่อยู่";
    $deliverytype="รูปแบบการจัดส่ง";
    $r50= "ลงทะเบียน / 50 ต่อชิ้น";
    $e80= " Ems / 80 ต่อชิ้น";
    $historys="เว็บไซต์นี้สร้างขึ้นมาเพื่อเพิ่มความสะดวกสะบายในการซื้อนาฬิกา ทางบริษัทได้ทำขึ้นเมื่อปี 2563";
    $map="แผนที่";
    $profile="ประวัติส่วนตัว";
    $user="ชื่อผู้ใช้งาน";
    $name="ชื่อ";
    $lname="นามสกุล";
    $mail="อีเมลล์";
    $tel="เบอร์โทรศัพท์";
    $add="ที่อยู่";


    
}
else if($lang == 'en')
{
    $home = 'Home';
    $store = 'Product';
    $about = 'About';
    $signin = 'Sign in';
    $signup = 'sign up';
    $signout = 'Sign out';
    $changeprofile = "Change Profile";
    $changepassword = "Change Password";
    $Service = "Service";
    $Freeshipping = "Free shipping";
    $Support24hr = "Support 24 hr";
    $CashonDelivery = "Cash on Delivery";
    $Contact = "Contact";
    $faddress = "Banbung. Chonburi 20220";
    $femail = "info@example.com";
    $ftel = "+ 01 234 567 88";
    $lusername = "Username";
    $lpassword = "Password"; 
    $click = " Click";
    $close = "Close";
    $gname = "Name";
    $glname = "Last Name";
    $history= "History";
    $gemail = "Email";
    $gtel = "Telephone Number";
    $gconfpass = "Confirm Password";
    $NewPassword = "New Password";
    $gconfpass2 = "Confirm Password";
    $orderhistory= "Order History";
    $price="Price";
    $baht="Baht";
    $cart="Cart";
    $cartforme="My Cart";
    $cartmore="View all shopping carts";
    $image="IMAGE";
    $nameproduct="NAME PRODUCT";
    $price="PRICE";
    $date="DATE";
    $continue="Continue";
    $confirm="CONFIRM ORDER";
    $totalprice = " Total price of all products";
    $discountall ="Discount for all promotions";
    $allprice="total amount of payment";
    $notshipping="(Not including shipping)";
    $address="Address";
    $deliverytype="Delivery type";
    $r50= "Register / 50 per piece";
    $e80= " Ems / 80 per piece";
    $historys="This website was created to make it easier to buy watches. The company made in year 2020.";
    $map="Map";
    $profile="Profile";
    $user="Username";
    $name="Name";
    $lname="Last Name";
    $mail="E-mail";
    $tel="Telephone";
    $add="Address";
}   

// <?php echo $about?>