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
        <h1>elenco ticket</h1>
        <?php
            $sql = "SELECT stato, tempoStimato FROM ticket WHERE id_cliente = '".$_SESSION['id']."'";
            $resT = mysqli_query($con, $sql);
            $sql = "SELECT A.descrizione FROM anomalia AS A INNER JOIN ticket USING(id_anomalia) WHERE ticket.id_cliente = '".$_SESSION['id']."'";
            $resA = mysqli_query($con, $sql);
            $sql = "SELECT D.marca, D.modello FROM apparecchio AS D INNER JOIN ticket USING(id_app) WHERE ticket.id_cliente = '".$_SESSION['id']."'";
            $resD = mysqli_query($con, $sql);
            $sql = "SELECT P.denominazione, P.indirizzo, P.citta, P.web, P.telefono, P.email FROM pda AS P INNER JOIN ticket USING(id_pda) WHERE ticket.id_cliente = '".$_SESSION['id']."'";
            $resP = mysqli_query($con, $sql);
            while($rowT = mysqli_fetch_assoc($resT)) {
                $rowA = mysqli_fetch_assoc($resA);
                $rowD = mysqli_fetch_assoc($resD);
                $rowP = mysqli_fetch_assoc($resP);
                echo "
                    <p>".$rowD['marca']." ".$rowD['modello']." - Stato: ".$rowT['stato']." - Tempo stimato: ".$rowT['tempoStimato']." - Problema: ".$rowA['descrizione']."</p>
                    <p>Punto di Accettazione: ".$rowP['denominazione'].", ".$rowP['indirizzo'].", ".$rowP['citta']." - Sito: ".$rowP['web']." - Contatti: ".$rowP['telefono']." - ".$rowP['email']."</p>
                <br><br><br>";
            }
        ?>
        
    </body>
</html>
<?php
}
?>