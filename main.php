<?php 
	require 'sessions.php';
	require_once 'db.php';
	check_session();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Main</title>
    <link rel="stylesheet" href="main.css">

</head>

<body>
    <div class="pantalla">
        <p id="nameMail">DISCORDIA</p>



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
            foreach($room as $ro){	
                $view = "";


                if ($ro['count'] == 1) {
                    $picture = $ro["photo"];
                    $name = $ro["nick"];
                }else {
                    $picture = $ro["img_room"];
                    $name = $ro["codRoom"];
                }

                $view_MSG = load_view($_SESSION['user']['cod_user'], $ro["codRoom"] );
                if($view_MSG===false){
                    echo "<p class='error'>Error connecting to the database, or no room present</p>";
                }else{
                    if ($view_MSG['view'] == 0) {
                        $view = "notView";
                    }
                }
                        


                    echo '

                    <form action="chat.php" class="person '.$view.'" method = "POST">

            
                        <input name = "name_chat" type="hidden" value = '.$name.'>
                        <input name = "avatar_chat" type="hidden" value = "'.$picture.'">
                        <input name = "codRoom" type="hidden" value = "'.$ro["codRoom"].'">
                        
                        <button type="submit" class="person2">
                            <img class="profPict" src="images/avatar/'.$picture.'"alt="image_user">
                            <div class="friendName">'.$name.'</div>
                        </button>
    
                    </form>
                    ';
                
            }

        }

    ?>


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



<div class="chat">
           
        </div>
    </div>
</body>


</html>