<?php
//verifico se sono passati parametri nel get
if (isset($_GET["username"]) && isset($_GET["password"]) && isset($_GET["nome"])) {
    //importo variabili dal GET
    $username = $_GET["username"];
    $password = $_GET["password"];
    $nome = $_GET["nome"];
    $cognome = $_GET["cognome"];
    $email = $_GET["email"];

    //verifica esistenza di un utente con lo stesso nome
    $hostname = "localhost";
    $userDB = "root";
    $passwordDB = "root";
    $connection = mysqli_connect($hostname, $userDB, $passwordDB);
    $query = "SELECT * FROM esercizi.utenti WHERE username=\"" . @$_GET["username"] . "\"; ";
    $result = mysqli_query($connection, $query, MYSQLI_STORE_RESULT);
    if (mysqli_num_rows($result) == 1) {
        //se esiste un utente comunico e reindirizzo alla pagina di registrazione
        alert("Esiste già un utente registrato con questo username riprova!");
    } else {
        //in questo caso l'utente non esiste e procedo alla registrazione a DB
        $query = "INSERT INTO esercizi.utenti ( `nome`, `cognome`, `username`, `password`, `email`) VALUES 
        (\"" . $nome . "\",\"" . $cognome . "\",\"" . $username . "\",\"" . $password . "\",\"" . $email . "\"); ";
        $result = mysqli_query($connection, $query, MYSQLI_STORE_RESULT);
        if ($result) {
            $msg = "Utente " . $username . " registrato correttamente!";
            echo "<script>alert('$msg');window.location.href='index.php';</script>";
        } else {
            alert("Errore durante la registrazione!");
        }
    }
}

function alert($msg)
{
    echo "<script>alert('$msg');window.location.href='register.php';</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="stileLogin.css" rel="stylesheet" type="text/css"> <!-- Connessione con file CSS -->
    <title>Register Vaccine Portal</title>
</head>

<body>

    <h2>Pagina registrazione utenza
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Flag_of_Italy.svg/1200px-Flag_of_Italy.svg.png" width="40" height="20">
    </h2>


    <form action="register.php" method="get">
        <div class="container">

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Inserisci Username" name="username" required>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Inserisci Password" name="password" required>
            <label for="nome"><b>Nome</b></label>
            <input type="text" placeholder="Inserisci nome" name="nome" required>
            <label for="cognome"><b>Cognome</b></label>
            <input type="text" placeholder="Inserisci cognome" name="cognome" required>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Inserisci email" name="email" required>
            <button type="submit">Registrati</button>

        </div>
        <div class="container" style="background-color:#f1f1f1">
            <span class="psw">Torna alla pagina di<a href="index.php"> login!</a></span>
        </div>
    </form>

</body>

</html>