<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/index-style.css">
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
    <main class='display-suggested'>
        <h2><span class="highlight">Sugestia książki</span></h2>
    
    <?php
        $db = mysqli_connect('127.0.0.1', 'root', '', 'strona_biblioteka');
        if($db) {
            $sql = "SELECT zdjecie FROM ksiazka ORDER BY RAND() LIMIT 1";
            $query = mysqli_query($db, $sql);
            if (mysqli_num_rows($query) > 0) {
                $results = mysqli_fetch_array($query);
                $photo = $results['zdjecie'];
                echo "<img src='$photo' alt='zdjecie proponowanej ksiazki' class='suggested'>";
            }
        }
    ?>
    </main>
    <footer>
        <svg width="100" height="50" viewBox="0 0 100 50" fill="none" xmlns="http://www.w3.org/2000/svg" id="light">
            <rect x="25" width="50" height="50" fill="#161528"/>
            <circle cx="25" cy="25" r="25" fill="#161528"/>
            <circle cx="75" cy="25" r="22.5" fill="#161528" stroke="#CF7C00" stroke-width="5"/>
            <path d="M23.719 15.082C21.147 17.11 19 20.294 19 25C19 29.569 20.938 32.798 23.548 34.895C18.719 34.19 15 30.021 15 25C15 19.92 18.808 15.712 23.719 15.082ZM25 13C18.383 13 13 18.383 13 25C13 31.617 18.383 37 25 37C26.894 37 28.87 36.667 30.37 35.821C26.917 35.208 21 32.454 21 25C21 17.445 27.422 14.683 30.37 14.179C28.63 13.497 26.894 13 25 13V13ZM25 23.999C26.437 24.437 27.562 25.563 27.999 27C28.439 25.563 29.564 24.438 31 24C29.564 23.561 28.439 22.437 27.999 21C27.562 22.436 26.437 23.561 25 23.999ZM33.001 24C33.959 24.293 34.708 25.042 35.001 26.001C35.292 25.042 36.043 24.292 37 24C36.043 23.708 35.293 22.958 35 22C34.707 22.958 33.958 23.708 33.001 24ZM32.001 15C31.564 16.437 30.438 17.562 29.003 18.001C30.441 18.441 31.564 19.565 32.004 21.003C32.441 19.565 33.567 18.44 35 18.001C33.567 17.564 32.441 16.437 32.001 15Z" fill="white"/>
            <path d="M67.069 26H63V24H67.069C67.028 24.328 67 24.661 67 25C67 25.339 67.028 25.672 67.069 26ZM70.103 18.688L67.222 15.807L65.808 17.221L68.689 20.102C69.1 19.573 69.574 19.099 70.103 18.688ZM81.312 20.102L84.193 17.221L82.779 15.807L79.898 18.688C80.426 19.099 80.9 19.574 81.312 20.102ZM75 17C75.339 17 75.672 17.028 76 17.069V13H74V17.069C74.328 17.028 74.661 17 75 17ZM75 33C74.661 33 74.328 32.972 74 32.931V37H76V32.931C75.672 32.972 75.339 33 75 33ZM82.931 24C82.972 24.328 83 24.661 83 25C83 25.339 82.972 25.672 82.931 26H87V24H82.931ZM79.898 31.312L82.778 34.192L84.193 32.778L81.313 29.898C80.901 30.426 80.427 30.9 79.898 31.312ZM68.688 29.897L65.808 32.777L67.222 34.191L70.102 31.311C69.574 30.9 69.099 30.426 68.688 29.897ZM75 19C71.686 19 69 21.686 69 25C69 28.314 71.686 31 75 31C78.314 31 81 28.314 81 25C81 21.686 78.314 19 75 19Z" fill="white"/>
        </svg>

        <!-- <svg width="100" height="50" viewBox="0 0 100 50" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="25" width="50" height="50" fill="white"/>
        <circle cx="25" cy="25" r="22.5" fill="white" stroke="#CF7C00" stroke-width="5"/>
        <circle cx="75" cy="25" r="25" fill="white"/>
        <path d="M23.719 15.082C21.147 17.11 19 20.294 19 25C19 29.569 20.938 32.798 23.548 34.895C18.719 34.19 15 30.021 15 25C15 19.92 18.808 15.712 23.719 15.082V15.082ZM25 13C18.383 13 13 18.383 13 25C13 31.617 18.383 37 25 37C26.894 37 28.87 36.667 30.37 35.821C26.917 35.208 21 32.454 21 25C21 17.445 27.422 14.683 30.37 14.179C28.63 13.497 26.894 13 25 13V13ZM25 23.999C26.437 24.437 27.562 25.563 27.999 27C28.439 25.563 29.564 24.438 31 24C29.564 23.561 28.439 22.437 27.999 21C27.562 22.436 26.437 23.561 25 23.999ZM33.001 24C33.959 24.293 34.708 25.042 35.001 26.001C35.292 25.042 36.043 24.292 37 24C36.043 23.708 35.293 22.958 35 22C34.707 22.958 33.958 23.708 33.001 24ZM32.001 15C31.564 16.437 30.438 17.562 29.003 18.001C30.441 18.441 31.564 19.565 32.004 21.003C32.441 19.565 33.567 18.44 35 18.001C33.567 17.564 32.441 16.437 32.001 15V15Z" fill="#161528"/>
        <path d="M67.069 26H63V24H67.069C67.028 24.328 67 24.661 67 25C67 25.339 67.028 25.672 67.069 26ZM70.103 18.688L67.222 15.807L65.808 17.221L68.689 20.102C69.1 19.573 69.574 19.099 70.103 18.688V18.688ZM81.312 20.102L84.193 17.221L82.779 15.807L79.898 18.688C80.426 19.099 80.9 19.574 81.312 20.102V20.102ZM75 17C75.339 17 75.672 17.028 76 17.069V13H74V17.069C74.328 17.028 74.661 17 75 17V17ZM75 33C74.661 33 74.328 32.972 74 32.931V37H76V32.931C75.672 32.972 75.339 33 75 33ZM82.931 24C82.972 24.328 83 24.661 83 25C83 25.339 82.972 25.672 82.931 26H87V24H82.931ZM79.898 31.312L82.778 34.192L84.193 32.778L81.313 29.898C80.901 30.426 80.427 30.9 79.898 31.312ZM68.688 29.897L65.808 32.777L67.222 34.191L70.102 31.311C69.574 30.9 69.099 30.426 68.688 29.897ZM75 19C71.686 19 69 21.686 69 25C69 28.314 71.686 31 75 31C78.314 31 81 28.314 81 25C81 21.686 78.314 19 75 19V19Z" fill="#161528"/>
        </svg> -->

    </footer>

   <script src='./js/index-dark_mode.js'></script>
</body>
</html>