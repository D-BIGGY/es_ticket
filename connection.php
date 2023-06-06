<?php
$err = false;
try {
    $con = mysqli_connect("127.0.0.1","root","","db_ticket");
}catch(Exception $e) {
    $err =true;
}
?>