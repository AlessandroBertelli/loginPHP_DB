<html>

<head>
    <title>Recovery Vaccine Portal</title>
    <link href="stileLogin.css" rel="stylesheet" type="text/css"> <!-- Connessione con file CSS -->
</head>

<body>

    <h2>Recuero credenziali membri
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Flag_of_Italy.svg/1200px-Flag_of_Italy.svg.png" width="40" height="20">
    </h2>

    <div class="container">
        <div class="imgcontainer">
            <img src="https://images.wired.it/wp-content/uploads/2020/11/18212248/vaccino_coronavirus_efficacia.jpg" class="avatar">
        </div>
        <?php

        $hostname = "localhost";
        $userDB = "root";
        $passwordDB = "root";
        $connection = mysqli_connect($hostname, $userDB, $passwordDB);

        if (isset($_POST["username"]) && isset($_POST["cognome"]) && isset($_POST["nome"])) {
            //se mi vengono passati i dati corretti restituisco la password
            $query = "SELECT * FROM esercizi.utenti WHERE username=\"" . @$_POST["username"] . "\" AND nome=\"" . @$_POST["nome"] . "\" AND cognome=\"" . @$_POST["cognome"] . "\";";
            $result = mysqli_query($connection, $query, MYSQLI_STORE_RESULT);
            if (mysqli_num_rows($result) == 1) {
                $datiUtente = mysqli_fetch_array($result);
                echo "<div align=\"center\"><h3>Gentile " . $datiUtente["nome"] . " " . $datiUtente["cognome"] . ",</h3>";
                echo "<h2>la sua password per il portale è: <span style=\"color: red;\">" . $datiUtente["password"] . "</span></h2>";
                echo "<form action=\"changePassword.php\" method=\"post\">";
                echo "<input name = \"username\" type=\"hidden\" value=\"" . $_POST["username"] . "\">";
                echo "<p><button type=\"submit\" 
                style=\"background-color: grey; 
                color: white;
                padding: 4px 10px;
                margin: 2px 0;
                border: none;
                cursor: pointer;
                width: 10%;
                cursor: pointer;\">Click per cambiare la tua password</button></p></div></form>";
            } else {
                alert("Non esiste nessun utente con i dati che hai inserito, verifica la correttezza dei dati oppure registrati qua!");
            }
        } else {
            echo "<form action=\"forgotPassword.php\" method=\"post\"><div class=\"container\">";
            echo "<label for=\"username\"><b>Username</b></label>";
            echo "<input type=\"text\" placeholder=\"Inserisci Username\" name=\"username\" required>";
            echo "<label for=\"nome\"><b>Nome</b></label>";
            echo "<input type=\"text\" placeholder=\"Inserisci nome\" name=\"nome\" required>";
            echo "<label for=\"cognome\"><b>Cognome</b></label>";
            echo "<input type=\"text\" placeholder=\"Inserisci cognome\" name=\"cognome\" required>";
            echo "<button type=\"submit\">Recupera password</button></div></form>";
        }

        function alert($msg)
        {
            echo "<script>alert('$msg');window.location.href='register.php';</script>";
        }
        ?>

    </div>
    <div class="container" style="background-color:#f1f1f1">
        <span class="psw">Torna a <a href="/esercizi/index.php">login</a></span>
    </div>
</body>

</html>