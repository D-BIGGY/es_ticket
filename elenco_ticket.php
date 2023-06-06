<?php 
session_start();
include_once("connection.php");
if(!isset($_SESSION["id"])){
    header("location: login.php");
}else{
?>
<html>
    <head>

    </head>
    <body>
        <?php
            
        ?>
        <h1>elenco ticket</h1>
    </body>
</html>
<?php
}
?>