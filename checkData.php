<html>

<head>
    <title>Check Vaccine Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="stileLogin.css" rel="stylesheet" type="text/css">
</head>

<body>
    <h1>Pagina di verifica credenziali.</h1>
    <form>
        <div class="container">
            <?php
            $hostname = "localhost";
            $user = "root";
            $password = "root";
            $connection = mysqli_connect($hostname, $user, $password);
            $query = "SELECT * FROM esercizi.utenti WHERE username=\"" . @$_POST["username"] . "\" AND password=\"" . $_POST["password"] . "\"; ";
            $result = mysqli_query($connection, $query, MYSQLI_STORE_RESULT);
            if (mysqli_num_rows($result) == 1) {
                $datiUtente = mysqli_fetch_array($result);
                if (isset($_POST["ricordami"]))
                    // ricordo l'utente per 24 ore
                    $Validita = 86400;
                else
                    // ricordo l'utente per 2 ore
                    $Validita = 72000;

                creazioneCookie($datiUtente["username"], $Validita);
                header('Location: home.php');
            } else {
                echo "<img src=\"https://i.ytimg.com/vi/hnBuaJDNagU/hqdefault.jpg\" class =\"avatar\">";
                echo "<h2 style=\"color:red\">Ops...!</h2>";
                echo "<h4>Non siamo riusciti a trovare la tua utenza!</h4>";
                echo "<div class=\"container\" style=\"background-color:#f1f1f1\"";
                echo "<span class=\"psw\">Torna al <a href=\"index.php\">login</a> oppure <a href=\"register.php\">registrati</a></span></div>";
            }



            function creazioneCookie($Utente, $Validita)
            {
                setcookie('LOGIN', $Utente, time() + $Validita); // Coockie che identifica l'utente
            }
            ?>
        </div>

    </form>
</body>

</html>