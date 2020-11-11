<?php 
	require 'sessions.php';
	require_once 'db.php';
	check_session();
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
    <div id="leftSide">

<div class="buttons">
    <div class="newMsg">
        <button class="newMsgBtn">+ Send new message</button>
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
if($room===false){
echo "<p class='error'>Error connecting to the database, or no room present</p>";
}else{

    foreach($room as $ro){	


        if ($ro['count'] == 1) {
            echo '
            <form action="https://trello.com/" class="chtBot">

                <input name = "name_chat" type="hidden" value = '.$ro["nick"].'>
                <button type="submit" class="person">
                    <img class="profPict" src="images/avatar/'.$ro["photo"].'" alt="image_user">
                    <div class="friendName">'.$ro["nick"].'</div>
                </button>

            </form>
            ';
        }else {
            echo '
            <form action="https://trello.com/" class="chtBot">

                <input name = "name_chat" type="hidden" value = '.$ro["codRoom"].'>
                <button type="submit" class="person">
                    <img class="profPict" src="images/avatar/'.$ro["img_room"].'" alt="image_user">
                    <div class="friendName">'.$ro["codRoom"].'</div>
                </button>

            </form>
            ';
        }

    }

}

?>

</div>


<div class="userPerSpa">
    <div class="profPict"></div>
    <div class="options">

        <div class="addFri" href="#">
            aaaa 

        </div>

        <div class="newGro" href="#">
            aaa

        </div>

        <div class="opt" href="#">
            aaa

        </div>

    </div>
</div>

</div>


        <div class="chat">

            <form action="#">
                <div class="searchBar">
                    <label for="user"><b>Search for someone</b></label>
                    <input type="text" placeholder="Enter Username or E-mail" name="user" value="">

                    <button type="submit">Search</button>
                </div>

            </form>

        </div>

    </div>
</body>


</html>