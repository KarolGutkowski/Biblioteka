<?php
    $userId = $_POST['userId'];
    $bookId = $_POST['bookId'];
    $db = mysqli_connect('127.0.0.1', 'root', '', 'strona_biblioteka');
    if($db) {
        $sql = "UPDATE wypozyczenia SET id_czytelnika = '$userId' WHERE id_ksiazki = '$bookId'";
        $query = mysqli_query($db, $sql);

        $sql2 = "UPDATE ksiazka SET dostępna = 'nie' WHERE id_ksiazki = '$bookId'";
        $query2 = mysqli_query($db, $sql2);
        

        $sql3 = "SELECT ksiazka.tytul, ksiazka.id_ksiazki FROM ksiazka WHERE dostępna = 'tak'";
        $query = mysqli_query($db, $sql3);
        if (mysqli_num_rows($query) > 0) {
            $results = mysqli_fetch_all($query);
            // var_dump($results);
            echo "<p>Dostępne książki: </p>";
            for($i=0; $i< mysqli_num_rows($query); $i++) {
                // $tytul = $results['tytul'];
                // $borrowed_on = $results['data_wypozyczenia'];
                $book_id = $results[$i][1];
                echo "<p class='available_books'>" .$results[$i][0] ."  <input class='add_book' id='$book_id' type='button' value='+'> </p>";
            }
        }
    }

?>