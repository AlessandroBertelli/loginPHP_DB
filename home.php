<html>
<?php
if (isset($_GET['logout'])) {
    setcookie('LOGIN', $_COOKIE['LOGIN'], time() - 360000);
    header("Location: index.php");
}

//estraggo tutti i dati a partire dal coockie
$username = $_COOKIE["LOGIN"];
$hostname = "localhost";
$userDB = "root";
$passwordDB = "root";
$connection = mysqli_connect($hostname, $userDB, $passwordDB);
$query = "SELECT * FROM esercizi.utenti WHERE username=\"" . @$username . "\";";
$result = mysqli_query($connection, $query, MYSQLI_STORE_RESULT);
if (mysqli_num_rows($result) == 1) {
    $datiUtente = mysqli_fetch_array($result);
    $nome = $datiUtente["nome"];
    $cognome = $datiUtente["cognome"];
}

?>

<head>
    <title>Dashboard Vaccine Portal</title>
</head>

<body>
    <div class="container" style="background-color:#f1f1f1" align="right">
        <span class="psw">Effettua <a href="home.php?logout=1">logout</a></span>
    </div>
    <h1>Dashboard vaccinatori
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Flag_of_Italy.svg/1200px-Flag_of_Italy.svg.png" width="40" height="20">
    </h1>
    <div>
        <?php
        echo "<h3>Benvenuto nella tua area privata,</h3>";
        echo "<h2 style=\"color:green\">" . $nome . " " . $cognome . "</h2>"
        ?>
    </div>
    <img src="https://media.tenor.com/images/2b62b93b3b484358cad3d9d6255fb866/tenor.gif" width="400" height="400">
    <p></p>
    <strong style="color:red">ATTENZIONE!</strong>
    <p>Le operazioni sui vacini sono attualmente sospese per via della mancata consegna odierna, riprovare in settimana!</p>
</body>

</html>