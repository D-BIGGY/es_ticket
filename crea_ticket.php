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
        <form action="#" method="GET">
            <select name="dispositivi" id="disp">
                <?php
                    $stampa = mysqli_query($con, "SELECT * FROM apparecchio");
                    while($row = mysqli_fetch_assoc($stampa)){
                        echo "<option value=".$row["id_app"].">".$row["marca"]." ".$row["Modello"]." [".$row["tipo"]."]</option>";
                    }
                ?>
            </select>
            <select name="anomalia" id="anoma">
                
                <?php
                    $stampa = mysqli_query($con, "SELECT * FROM anomalia");
                    while($row = mysqli_fetch_assoc($stampa)){
                        echo "<option value=".$row["id_anomalia"].">".$row["marca"]." ".$row["descrizione"]."</option>";
                    }
                ?>
            </select>
            <select name="pda" id="pda">
                
                <?php
                    $stampa = mysqli_query($con, "SELECT * FROM pda");
                    while($row = mysqli_fetch_assoc($stampa)){
                        echo "<option value=".$row["id_pda"].">".$row["denominazione"]." [".$row["indirizzo"]." ".$row["citta"]."]</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Invia">
        </form>
    </body>
</html>
<?php
}
?>