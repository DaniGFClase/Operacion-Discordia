<?php 
	require 'sessions.php';
	require_once 'db.php';
    check_session();
    setView($_POST['codRoom'], $_SESSION['user']['cod_user']);

?>

<?php  
    if (!empty($_POST['text'])) {
        if (isset($_SESSION['user']['cod_user']) && isset($_POST['codRoom']) && $_POST['text'] != "") {
            send_chat_Message($_SESSION['user']['cod_user'], $_POST['codRoom'], $_POST['text']);
            setNotView($_POST['codRoom'], $_SESSION['user']['cod_user']);
        }
    }

  
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <link rel="stylesheet" href="chat.css">

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

foreach($room as $ro){	


    if ($ro['count'] == 1) {
        $picture = $ro["photo"];
        $name = $ro["nick"];
    }else {
        $picture = $ro["img_room"];
        $name = $ro["codRoom"];
    }
        echo '
        <form action="chat.php" class="person" method = "POST">

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
            <div class="userSendTo">
                <img src="images/avatar/<?php echo $_POST['avatar_chat']?>" alt="avatar of chat" class="profPict">
                <div class="friendName"><?php echo $_POST['name_chat']?></div>

            </div>


            <div class="text">

            <?php
            // select u.cod_user, nick, photo, count(*), ur.cod_room



		$room = load_chat($_POST['codRoom']);
		if($room===false){
			echo "";
		}else{

            
			foreach($room as $ro){	

                echo '
                    <div class="msgR">
                        <div class="photo">
                         <img class="profPict" src="images/avatar/'.$ro["photo"].'"alt="image_user">
                        </div>
                        <div class="content">'.$ro["text_message"].'</div>
                    </div>
                    ';
                

			}

		}
        ?>

            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="chtBot" method = "POST">

                <input type="text" placeholder="Write here" name="text" value="" class="msgBar">
                <input name = "avatar_chat" type="hidden" value = '<?php echo $_POST['avatar_chat']?>'>
                <input name = "codRoom" type="hidden" value = '<?php echo $_POST['codRoom']?>'>
     
                <input name = "name_chat" type="hidden" value = '<?php echo $_POST['name_chat']?>'>
                <button type="submit" class="sendBtn">Send</button>


            </form>

        </div>

    </div>
</body>


</html>