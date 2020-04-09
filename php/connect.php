<?php
    session_start();
    $conn = new mysqli('localhost','root','','smartwatch');
    $conn->set_charset("utf8");

    if($conn->connect_errno){
        die("Connect Failed !!".$conn->connection_error);
    }



?>