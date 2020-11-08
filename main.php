<?php 
	require 'sessions.php';
	require_once 'db.php';
	check_session();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Discordia</title>
    <link rel="stylesheet" href="main.css">

</head>

<body>
    <div class="pantalla">
        <p id="nameMail">DISCORDIA</p>



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
                    <div class="person">            
                    <img class="profPict" src="images/avatar/'.$ro["photo"].'" alt="image_user">
                    <div class="friendName">'.$ro["nick"].'</div>
                    </div>
                    ';
                }else {
                    echo '
                    <div class="person">            
                    <img class="profPict" src="images/avatar/'.$ro["img_room"].'" alt="image_user">
                    <div class="friendName">'.$ro["codRoom"].'</div>
                    </div>
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




        <div id="chat" class="chatP">
            <div class="otherUsr">
                <div class="profile">
                    <div class="profPict"></div>

                    <div class="friendConecName">Real Name</div>

                    <div class="status">69/69/420</div>

                </div>
            </div>
            <div id="chatTxT">
                <div id="msg">
                    123
                </div>
                aaaaaaaaaaaaaaa
            </div>



            <input type="text" id="introTxT" name="fname" value="Write something"><br><br>
            <input type="submit" id="send" value="Send">

        </div>

    </div>
</body>


</html>