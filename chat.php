<?php 
	require 'sessions.php';
	require_once 'db.php';
    check_session();

?>

<?php  
    if (!empty($_POST['text'])) {
        if (isset($_SESSION['user']['cod_user']) && isset($_POST['codRoom']) && $_POST['text'] != "") {
            send_chat_Message($_SESSION['user']['cod_user'], $_POST['codRoom'], $_POST['text']);
        }
    }
    
        

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Main UI</title>
    <link rel="stylesheet" href="chat.css">

</head>

<body>
    <p id="nameMail">DISCORDIA</p>

    <div class="pantalla">

        <div class="leftSide">

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

                <div class="person">
                    <div class="profPict"></div>
                    <div class="friendName">The senate</div>
                </div>


            </div>


            <div class="userPerSpa">
                <div class="photo">
                    <div class="profPict"></div>
                </div>

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

                <div class="usrName">Pepe</div>
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