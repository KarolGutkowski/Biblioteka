<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/logged-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        
        $(document).ready(function(){
            let userId = document.querySelector('.account_id').textContent.slice(5);
            $("#books").click(function() {
                // let userId = '2';
                // console.log(userId);
                // console.log("clicked");
                $("#books").addClass('active');
                $('#profile').removeClass('active');
                $("#borrow").removeClass('active');
                $(".content").load("./ajax/books.php", {
                    userId: userId
                });
            });

            $("#profile").click(function() {
                // let userId = '2';
                // console.log(userId);
                // console.log("clicked");
                $("#books").removeClass('active');
                $('#profile').addClass('active');
                $("#borrow").removeClass('active');
                $(".content").load("./ajax/profile.php", {
                    userId: userId
                });
            });

            $("#borrow").click(function() {
                // let userId = '2';
                // console.log(userId);
                // console.log("clicked");
                $("#books").removeClass('active');
                $('#profile').removeClass('active');
                $("#borrow").addClass('active');
                $(".content").load("./ajax/borrow.php", {
                    userId: userId
                });
            });

            $(".content").click(function(event) {
                // console.log(event.target);
                if (event.target.nodeName == 'INPUT') {
                    console.log(event.target);
                    console.log(event.target.nodeName);
                    let bookId = event.target.id;
                    console.log(userId);
                    $(".content").load("./ajax/update-books.php", {
                        userId: userId,
                        bookId: bookId
                });
                } else {
                    
                }
                
                // let userId = '2';
                // console.log(userId);
                // // console.log("clicked");
                // let btnId = $(".available_books").val();
                // console.log(btnId);
                // $(".content").load("./ajax/update-books.php", {
                //     userId: userId
                // });
            });

           

        });

    </script>
</head>
<body>
<div class="main_wrapper">
        <img src="./img/profile.png" alt="zdjecie profilowe usera" class="profile_picture"> 

    <div class='content_wrapper'> 
        <div class='list'>
            <ul>
                <button id='profile' class='active'><li>profil</li></button>
                <button id="books"><li> twoje ksiązki</li></button>
                <button id="borrow"><li> wypożycz</li></button>
                <button class="logout"><a href="login.php"><li>wyloguj</li></a></button>
            </ul>
        </div>    
            <div class='content'>
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
            </div>


    </div>
</div>  
</body>
</html>