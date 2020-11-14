<?php 
	require 'sessions.php';
	require_once 'db.php';
	check_session();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Friend</title>
    <link rel="stylesheet" href="main.css">

</head>

<body>
    <div class="pantalla">
        <p id="nameMail"><a href="main.php">DISCORDIA</a></p>



        <div class="leftSide">

            <div class="buttons">
                <div class="newMsg">
                    <button class="newMsgBtn" onclick="showSB()">+ Send new message</button>
                </div>

            <div class="menu">
                <button class="tab">Messages</button>
                <button class="tab"><a href="friend.php">Friends</a></button>
            </div>
            </div>

<div class="contacts">



  
    <?php

        $room = load_friends($_SESSION['user']['cod_user']);
        if ($room === false) {
            echo "<p class='error'>Error connecting to the database, or no room present</p>";
        } else {
            foreach($room as $ro){	
               
                    $picture = $ro["photo"];
                    $name = $ro["nick"];
                
                    echo '

                    <div class="person" method = "POST">

            
                        <input name = "name_chat" type="hidden" value = '.$name.'>
                        <input name = "avatar_chat" type="hidden" value = "'.$picture.'">                        
                        <button type="submit" class="person2">
                            <img class="profPict" src="images/avatar/'.$picture.'"alt="image_user">
                            <div class="friendName">'.$name.'</div>
                        </button>
    
                    </div>
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
    <?php 
        $resul = load_name_user($_SESSION['user']['cod_user']);
        $nick = $resul['nick'];
        echo '<div class="usrName">'.$nick.'</div>';
    ?>
        

        <form action="#" class="addFri">
            Add friend
        </form>

        <form action="#" class="newGro">
            New group
        </form>
        <form action="#" class="opt">
        Profile
        </form>

    </div>


</div>

</div>



        
<div class="chat" id="chat1">

<form action="#" method="POST" id="searchB">
    <div class="searchBar">
        <label for="user"><b>Search for someone</b></label>
        <input type="text" placeholder="Enter Username" name="user" value="">
        <textarea name="text"></textarea>

        <button type="submit">Send</button>
    </div>

</form>

</div>
</div>
</body>


<script>
    function showSB() {
        document.getElementById("searchB").style.display = "block";
    }
</script>



</html>