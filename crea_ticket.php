<?php 
if(!$_SESSION["logged"]){
    header("location: login.php");
}else{
?>
<html>
    <head>

    </head>
    <body>
        <h1>creazione ticket</h1>
    </body>
</html>
<?php
}
?>