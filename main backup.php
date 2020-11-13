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
                    <button class="newMsgBtn"><a href="search.php">+ Send new message</a></button>
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
                $view = "";

                if ($ro['count'] == 1) {
                    $picture = $ro["photo"];
                    $name = $ro["nick"];
                }else {
                    $picture = $ro["img_room"];
                    $name = $ro["codRoom"];
                }

                


                    echo '
                    <form action="chat.php" class="chtBot" '.$view.'method = "POST">

                        <input name = "name_chat" type="hidden" value = '.$name.'>
                        <input name = "avatar_chat" type="hidden" value = "'.$picture.'">
                        <input name = "codRoom" type="hidden" value = "'.$ro["codRoom"].'">
                        
                        <button type="submit" class="person">
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