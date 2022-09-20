<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/index-style.css">
    <link rel="stylesheet" href="./style/search-style.css">
    <link rel="stylesheet" href="./style/login-style.css">
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
    <!-- action='verification.php' -->
        <h2 class='titles'>logowanie</h2>
            <form method='POST'>
                <input type="text" name="login" class="inputs" placeholder="podaj login">
                <p></p>
                <input type="password" name="haslo" class="inputs" placeholder="•••••••••••••••••••">
                <p></p>
                <button type="submit" class="orange_button">zaloguj</button>
            </form>
    </main>
    <?php
    if(isset($_POST['login']) && isset($_POST['haslo'])) {
       $db = mysqli_connect('127.0.0.1', 'root', '', 'strona_biblioteka');
       if($db) {
            $login = $_POST['login'];
            // $pwd = md5($_POST['haslo']); Version of query with hashed passwords
            $pwd = $_POST['haslo'];
            $sql = "SELECT id_konta, nazwa_usera, imie, nazwisko, email, data_urodzenia, data_dolaczenia FROM konta WHERE nazwa_usera = '$login' AND haslo = '$pwd'";
            $query = mysqli_query($db, $sql);
            if( mysqli_num_rows($query) > 0) {
                $results = mysqli_fetch_array($query);
                session_start();
                $_SESSION['dane_usera'] = $results;
                header("Location: ./zalogowany.php");
            } else {
                echo "<p class='red_message'> złe dane logowania </p>";
            }
       } else {
           echo "Sorry you won't be able to login due to database connection problem. <br> Try again later.";
       }
    }
    ?>
</body>
</html>