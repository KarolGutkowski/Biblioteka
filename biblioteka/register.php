<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/index-style.css">
    <link rel="stylesheet" href="./style/search-style.css">
    <link rel="stylesheet" href="./style/register-style.css">
</head>
<body>
<div class='nav-wrapper'>
    <nav>
        <h1>biblioteka</h1>
        <ul>
            <a href="index.php">
                <li>Strona główna</li>
            </a>
            <a href="search.php">
                <li>Szukaj</li>
            </a>
            <a href="login.php">
                <li>Logowanie</li>
            </a>
            <a href="register.php">
                <li>Rejestracja</li>
            </a>
        </ul>
    </nav>
</div>
<main>
    <h2 class='titles'>rejestracja</h2>
        <form method='POST'>
            <input type="text" name="name" class="inputs" placeholder="imię">
            <p></p>
            <input type="text" name="surname" class="inputs" placeholder="nazwisko">
            <p></p>
            <input type="email" name="email" class="inputs" placeholder="email">
            <p></p>
            <input type="text" name="login" class="inputs" placeholder="login">
            <p></p>
            <input type="password" name="haslo" class="inputs" placeholder="•••••••••••••••••••">
            <p></p>
            <input type="date" name="date_of_birth" class="inputs" placeholder="login">
            <p></p>
            <button type="submit" class="orange_button">zarejestruj</button>
        </form>
</main>

<?php
    if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['login']) && isset($_POST['haslo']) && isset($_POST['date_of_birth'])) {
        $db = mysqli_connect('127.0.0.1', 'root', '', 'strona_biblioteka');
        if($db) {
            $login = $_POST['login'];
            $exists = "SELECT nazwa_usera FROM konta WHERE nazwa_usera = '$login'";
            $query_exists = mysqli_query($db, $exists);
        if (mysqli_num_rows($query_exists) == 0) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
            $date = $_POST['date_of_birth'];
            $today = date('Y-m-d');
            $sql = "INSERT INTO konta (nazwa_usera,haslo, imie, nazwisko, email, data_urodzenia, data_dolaczenia) VALUES ('$login','$haslo','$name','$surname','$email','$date','$today')";
            $query = mysqli_query($db, $sql);
            if($query) {
                echo 'rejestracja udana';
            } else {
                echo 'problem z rejestracją';
            }
            } else {
                echo 'ten login jest już zajęty';
        }
    }
        mysqli_close($db);
    }

?>
</body>
</html>