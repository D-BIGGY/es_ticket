<?php 
if(!$_SESSION["logged"]){
    header("location: login.php");
}else{
?>
<html>
    <head>

    </head>
    <body>
        <h1>elenco ticket</h1>
    </body>
</html>
<?php
}
?>