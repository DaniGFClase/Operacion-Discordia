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
    <script>

			function loadChat(codRoom, avatar_chat, name_chat) {

                var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("chat1").innerHTML =
													this.responseText;
					}
				};
				xhttp.open("POST", "chat_AJAX.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("codRoom=" + codRoom + "&avatar_chat=" + avatar_chat + "&name_chat=" + name_chat);
				return false;
			}

            function sendMessage() {
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						showContacts();
						var var1 = document.getElementById("codRoomMessage").value;
						var var2 = document.getElementById("avatar_chat").value;
						var var3 = document.getElementById("name_chat").value;
						loadChat(var1, var2, var3);
					}
				};
			
                var num1 = document.getElementById("codRoomMessage").value;
				var num2 = document.getElementById("textMessage").value;
				xhttp.open("POST", "send_message_AJAX.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("codRoom=" + num1 + "&text=" + num2);
				return false;
			}

			function sendNewMessage() {
				
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("chat1").innerHTML = this.responseText;
						showContacts();
					}
				};
			
                var num1 = document.getElementById("userTo").value;
				var num2 = document.getElementById("textMessage").value;
				xhttp.open("POST", "send_message_newMessage_AJAX.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("user=" + num1 + "&text=" + num2);
				return false;
				
			}
			

            function showSB() {
                
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("chat1").innerHTML = this.responseText;                         
					}
				};
				
				xhttp.open("POST", "search_bar.php", true);
                xhttp.send();
				return false;
            }

            function showContacts() {
                
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("contacts").innerHTML = this.responseText;                         
					}
				};
				
				xhttp.open("POST", "contacts.php", true);
                xhttp.send();
				return false;
            }

            function showFriends() {
                
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("contacts").innerHTML = this.responseText;                         
					}
				};
				
				xhttp.open("POST", "friend.php", true);
                xhttp.send();
				return false;
            }

            showContacts();
    
			
		</script>
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
                <button class="tab" onclick="showContacts()">Messages</button>
                <button class="tab" onclick="showFriends()">Friends</button>
            </div>
            </div>

<div class="contacts" id="contacts">


</div>


<div class="userPerSpa">
    <div class="photo">
        
    <?php 

        $resul = load_name_user($_SESSION['user']['cod_user']);
     
        echo '
        <img src="images/avatar/'.$resul['photo'].'" class="profPict" alt="">
            </div>

            <div class="data">
        <div class="usrName">'.$resul['nick'].'</div>';
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


</div>
</div>

</body>




</html>