<?php 
include_once("connection.php");
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
            <input type="text" placeholder="Nome" required=""/>
            <input type="text" placeholder="Cognome" required=""/>
            <input type="text" placeholder="Username" required=""/>
            <input type="password" placeholder="Password" required=""/>
            <input type="email" placeholder="Email" required=""/>
            <input type="text" placeholder="Indirizzo" required=""/>
            <input type="text" placeholder="Numero di telefono" required="" />
            <input type="hidden" name="action" value="registra">
            <button>Registrati</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="#" method="POST">
            <h1>Accedi</h1>
            <input type="text" placeholder="Username" required=""/>
            <input type="password" placeholder="Password" required=""/>
            <input type="hidden" name="action" value="login">
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
        if(isset($_POST["action"]) && $_POST["action"] == "registra"){
            $nome = $_POST["Nome"];
            $cognome = $_POST["Cognome"];
            $username = $_POST["Username"];
            $pw = $_POST["Password"]
            //fai mettere 2 volte la pw per sicurezza
                
            $stampa = $mysqli_query("INSERT INTO `cliente` (`nomeUtente`, `nome`, `cognome`, `password`, `email`, `indirizzo`, `telefono`) VALUES ('".."', 'Matteo', 'Atzeni', 'password', 'matzeni@chilesotti.it', 'via valdellette', '0445 535550');")
        }else if(isset($_POST["action"]) && $_POST["action"] == "login"){//else if perchè altrimenti conterebbe anche quando non è settato

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
