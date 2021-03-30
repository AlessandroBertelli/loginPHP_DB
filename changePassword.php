<html>

<head>
    <title>Modify Vaccine Portal</title>
    <link href="stileLogin.css" rel="stylesheet" type="text/css"> <!-- Connessione con file CSS -->
</head>

<body>

    <h2>Modifico password membro
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

        if (isset($_POST["username"]) && isset($_POST["password"])) {

            //se mi vengono passati i dati corretti restituisco la password
            $query = "UPDATE esercizi.utenti SET password=\"" . @$_POST["password"] . "\" WHERE (username=\"" . $_POST["username"] . "\");";
            $result = mysqli_query($connection, $query, MYSQLI_STORE_RESULT);
            if ($result) {
                alert("Password aggiornata correttamente!");
            } else {
                alert("Errore durante l'aggiornamento della password!");
            }
        } else if (isset($_POST["username"])) {
            echo "<form action=\"changePassword.php\" method=\"post\">";
            echo "<label for=\"password\"><b>Nuova password</b></label>";
            echo "<input type=\"text\" placeholder=\"Inserisci nuova password\" name=\"password\" required>";
            echo "<input name = \"username\" type=\"hidden\" value=\"" . $_POST["username"] . "\">";
            echo "<button type=\"submit\">Modifica password</button></div></form>";
        }

        function alert($msg)
        {
            echo "<script>alert('$msg');window.location.href='index.php';</script>";
        }
        ?>

    </div>
    <div class="container" style="background-color:#f1f1f1">
        <span class="psw">Torna a <a href="/esercizi/index.php">login</a></span>
    </div>
</body>

</html>