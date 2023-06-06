<?php  
session_start();
if(isset($_POST["buttonlogin"])){
    header("location: login.php");
}
if(isset($_POST['crea_ticket'])) {
    header("location: crea_ticket.php");
}
if(isset($_POST['visualizza_elencoTicket'])) {
    header("location: elenco_ticket.php");
}
?>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>Home Page</title>
    </head>
    <body>
        <div class="row" id="header">
            <div class="col-4" id="logo">
               <img src="img/logo.png" alt="logo" onclick="login.php"></div>
            <div class="col-4"> <p class="text-center">Riparazione dipositivi</p> </div>
            <div class="col-4" id="user"> 
                <a href="login.php">
                    <img src="img/icona_utente.png" alt="utente" class="float-right">
                </a>
            </div>
        </div>
        <div id="corpo" class="row">
            <div class="col-8">
                <img src="img/negozio.webp" alt="negozio">
            </div>
            <div class="col-4" id="descrizione">
                <h2>descrizione</h2>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>
        <div class="operazioni">
            <form action="" method="POST">
                <input type="submit" name="buttonlogin" value="login"/>
                <input type="submit" name="crea_ticket" value="crea ticket">
                <input type="submit" name="visualizza_elencoTicket" value = "visualizza i tuoi ticket">
            </form>
        </div>
        <footer>
            <h2>Contatti</h2>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </footer>
    </body>
    <?php
        if(isset($_SESSION["id"]) && $_SESSION["time"] == 0){
            echo "<script type='text/javascript'>alert('accesso effettuato come ".$_SESSION["nomeUtente"]."');</script>";
            $_SESSION["time"] = 1;
        }
    ?>
</html>