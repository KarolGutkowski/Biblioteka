<?php
    $userName = $_POST['userId'];
    $db = mysqli_connect('127.0.0.1', 'root', '', 'strona_biblioteka');
    if($db) {
        $sql = "SELECT tytul FROM `wypozyczenia` INNER JOIN ksiazka ON ksiazka.id_ksiazki = wypozyczenia.id_ksiazki WHERE wypozyczenia.id_czytelnika = '$userName'";
        $query = mysqli_query($db, $sql);
        if (mysqli_num_rows($query) > 0) {
            $results = mysqli_fetch_all($query);
            // var_dump($results);
            echo "<p>Twoje wypożyczenia: </p>";
            for($i=0; $i< mysqli_num_rows($query); $i++) {
                // $tytul = $results['tytul'];
                // $borrowed_on = $results['data_wypozyczenia'];
                echo "<p>" .$results[$i][0];
            }
        }
    }
?>
