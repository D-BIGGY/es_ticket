<?php 
include_once("connection.php");
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="logga.css">
    </head>
    <body>
    <div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="#" method="POST">
            <h1>Crea Account</h1>
            <input type="text" placeholder="Nome" name="Nome" required=""/>
            <input type="text" placeholder="Cognome" name="Cognome" required=""/>
            <input type="text" placeholder="Username" name="Username" required=""/>
            <input type="password" placeholder="Password" name="Password" required=""/>
            <input type="password" placeholder="Reinserisci la password" name="Password2" required=""/>
            <input type="email" placeholder="Email" name="Email" required=""/>
            <input type="text" placeholder="Indirizzo" name="Indirizzo" required=""/>
            <input type="text" placeholder="NumeroDiTelefono" name="Telefono" required="" />
            <input type="hidden" name="type" value="registra">
            <button>Registrati</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="#" method="POST">
            <h1>Accedi</h1>
            <input type="text" placeholder="Username" name="Username"required=""/>
            <input type="password" placeholder="Password" name="Password"required=""/>
            <input type="hidden" name="type" value="login">
            <button>Accedi</button>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Bentornato!</h1>
                <p>Accedi per accedere a tutte le aree di interesse</p>
                <button class="ghost" id="signIn">Accedi</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Salve!</h1>
                <p>Inserisci i uoi dati per poter interagire con noi!</p>
                <button class="ghost" id="signUp">Regitrati</button>
            </div>
        </div>
    </div>
    <?php
        if(isset($_POST["type"]) && $_POST["type"]== "registra"){
            echo("registra");
            $replace = ["'","-","\"","\\","|","!","£","$","%","&","/","(",")","=","?","^","<",">","*","+","_",",",";",".",":","[","]","{","}","#","@","°","§"];
            $nome = str_replace($replace,"",$_POST["Nome"]);
            $cognome = str_replace($replace,"",$_POST["Cognome"]);
            $username = $_POST["Username"];
            $pw = $_POST["Password"];
            $pw2 = $_POST["Password2"];
            $mail = $_POST["Email"];
            $indirizzo  =str_replace($replace,"",$_POST["Indirizzo"]);
            $telefono = str_replace($replace,"",$_POST["Telefono"]);
            $go = true;
            if($pw!=$pw2){
                $go=false;
            }
            if($nome == ""  && $cognome == "" && $indirizzo == "" && $telefono == ""){
                $go =false;
            }
            if($go){
                $stampa = mysqli_query($con,
                    "INSERT INTO cliente (nomeUtente, nome, cognome, password, email, indirizzo, telefono) VALUES ('".$username."', '".$nome."', '".$cognome."', '".md5($pw)."', '".$mail."', '".$indirizzo."', '".$telefono."')");
            }
            }else if(isset($_POST["type"]) && $_POST["type"] == "login"){//else if perchè altrimenti conterebbe anche quando non è settato
                $pw = md5($_POST["Password"]);
                echo $pw;
                $stampa = mysqli_query($con, "SELECT * FROM cliente WHERE cliente.nomeUtente = '".$_POST["Username"]."'AND cliente.password ='".$pw."'");
                var_dump($stampa);
                if(mysqli_num_rows($stampa) >0){
                    $robba = mysqli_fetch_assoc($stampa);
                    $_SESSION["id"] = $robba["id_cliente"];
                    $_SESSION["nomeUtente"] = $robba["nomeUtente"];
                    header("location: index.php");
                }
            }
    ?>
    </body>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</html>
