<?php
require 'sessions.php';
require_once 'db.php';
check_session();
?>

<?php
if (isset($_SESSION['user']['cod_user']) && isset($_POST['user']) && $_POST['text'] != "") {
    send_Message($_SESSION['user']['cod_user'], $_POST['user'], $_POST['text']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Main UI</title>
    <link rel="stylesheet" href="search.css">

</head>

<body>
    <p id="nameMail">DISCORDIA</p>

    <div class="pantalla">

        <div class="leftSide">

            <div class="buttons">
                <div class="newMsg">
                    <button class="newMsgBtn" onclick="showSB()">+ Send new message</button>
                </div>

                <div class="menu">
                    <button class="tab">Messages</button>
                    <button class="tab">Friends</button>
                </div>
            </div>

            <div class="contacts">


                <?php
// select u.cod_user, nick, photo, count(*), ur.cod_room

$room = load_room($_SESSION['user']['cod_user']);
if ($room === false) {
    echo "<p class='error'>Error connecting to the database, or no room present</p>";
} else {

    foreach ($room as $ro) {

        if ($ro['count'] == 1) {
            echo '
                    <form action="chat.php" class="person" method = "POST">

                        <input name = "name_chat" type="hidden" value = ' . $ro["nick"] . '>
                        <input name = "avatar_chat" type="hidden" value = "' . $ro["photo"] . '">
                        <input name = "codRoom" type="hidden" value = "' . $ro["codRoom"] . '">

                        <button type="submit" class="person2">
                            <img class="profPict" src="images/avatar/' . $ro["photo"] . '"alt="image_user">
                            <div class="friendName">' . $ro["nick"] . '</div>
                        </button>

                    </form>
                    ';
        } else {
            echo '
                    <form action="chat.php" class="person" method = "POST">

                        <input name = "name_chat" type="hidden" value = ' . $ro["codRoom"] . '>
                        <input name = "avatar_chat" type="hidden" value = ' . $ro["img_room"] . '>
                        <input name = "codRoom" type="hidden" value = "' . $ro["codRoom"] . '">
                        <button type="submit" class="person2">
                            <img class="profPict" src="images/avatar/' . $ro["img_room"] . '" alt="image_user">
                            <div class="friendName">' . $ro["codRoom"] . '</div>
                        </button>

                    </form>
                    ';
        }

    }

}

?>

                    <form action="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="person">

                        <button type="submit" class="person2">
                        <div class="profPict"></div>
                        <div class="friendName">The senate</div>
                    </button>

                    </form>




            </div>


            <div class="userPerSpa">
                <div class="photo">
                    <div class="profPict"></div>
                </div>

                <div class="data">
                    <div class="usrName">Anakin</div>

                    <form action="#" class="addFri">
                        Add friend
                    </form>

                    <form action="#" class="newGro">
                        New group
                    </form>
                    <form action="#" class="opt">
                        Options
                    </form>

                </div>


            </div>

        </div>



        <div class="chat" id="chat1">

            <form action="#" method="POST" id="searchB">
                <div class="searchBar">
                    <label for="user"><b>Search for someone</b></label>
                    <input type="text" placeholder="Enter Username or E-mail" name="user" value="">
                    <textarea name="text"></textarea>

                    <button type="submit">Send</button>
                </div>

            </form>

        </div>

    </div>
</body>



</html>