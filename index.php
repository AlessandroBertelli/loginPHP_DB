<!DOCTYPE html>
<?php
if (isset($_COOKIE["LOGIN"])) {
    header("Location: home.php");
}
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="stileLogin.css" rel="stylesheet" type="text/css"> <!-- Connessione con file CSS -->
    <title>Login Vaccine Portal</title>
</head>

<body>

    <h2>Accesso membri vaccinatori
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Flag_of_Italy.svg/1200px-Flag_of_Italy.svg.png" width="40" height="20">
    </h2>


    <form action="/esercizi/checkData.php" method="post">
        <div class="imgcontainer">
            <img src="https://images.wired.it/wp-content/uploads/2020/11/18212248/vaccino_coronavirus_efficacia.jpg" class="avatar">
        </div>

        <div class="container">

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Inserisci Username" name="username" required>
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Inserisci Password" name="password" required>
            <label for="ricordami"><i>Rimani collegato</i></label>
            <input type="checkbox" name="ricordami" value="1" default="0" />
            <button type="submit">Login</button>

        </div>

        <div class="container" style="background-color:#f1f1f1">
            <span class="psw">Dimenticato <a href="/esercizi/forgotPassword.php">password? </a></span>
            <span class="psw" style="float:right">Non sei ancora dei nostri?<a href="/esercizi/register.php"> Registrati!</a></span>
        </div>
    </form>

</body>

</html>