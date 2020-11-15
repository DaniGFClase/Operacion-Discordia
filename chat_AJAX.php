<?php 
	require 'sessions.php';
	require_once 'db.php';
    check_session();
    setView($_POST['codRoom'], $_SESSION['user']['cod_user']);

?>



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

        <?php 
        
        $codeRoom = $_POST['codRoom']; 
        $avatar_chat = $_POST['avatar_chat']; 
        $name_chat = $_POST['name_chat']; 
        
        ?> 
        
            </div>

            <form onsubmit = "return sendMessage();" class="chtBot">
			    <input type="text" placeholder="Write here" id="textMessage" value="" class="msgBar">     
                <input id="codRoomMessage" type="hidden" value = "<?php echo $codeRoom?>">
                <input id="avatar_chat" type="hidden" value = "<?php echo $avatar_chat?>">
                <input id="name_chat" type="hidden" value = "<?php echo $name_chat?>">
			    <input type = "submit" class="sendBtn">
		    </form>

                   

        </div>

    </div>
