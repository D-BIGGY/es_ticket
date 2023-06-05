<?php
$err = false;
try {
    $con = mysqli_connect("127.0.0.1","root","","mappa_audio");
}catch(Exception $e) {
    $err =true;
}
?>