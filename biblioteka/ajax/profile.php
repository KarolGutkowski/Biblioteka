<?php 
    session_start();
    $data = $_SESSION['dane_usera'];
    $user = $data['nazwa_usera'];
    echo '<p>login: ' .$data['nazwa_usera'];
    echo "<p class='account_id'>id:  " .$data['id_konta'];
    echo '<p>imie: ' .$data['imie'];
    echo '<p>nazwisko: ' .$data['nazwisko'];
    echo '<p>email: ' .$data['email'];
    echo '<p>data urodzenia: ' .$data['data_urodzenia'];
    echo '<p>czytelnik od: ' .$data['data_dolaczenia'];
?>