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
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/chat.css">
	<link rel="stylesheet" href="css/social.css">
	<link rel="stylesheet" href="css/profile.css"> 

    <script>

			function loadChat(codRoom, avatar_chat, name_chat) {

                var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("chat1").innerHTML = this.responseText;
						var myDiv = document.getElementById("textChat");
						myDiv.scrollTop = myDiv.scrollHeight;
					}
				};
				xhttp.open("POST", "pages/chat_AJAX.php", true);
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
				xhttp.open("POST", "pages/send_message_AJAX.php", true);
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
				xhttp.open("POST", "pages/send_message_newMessage_AJAX.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("user=" + num1 + "&text=" + num2);
				return false;
				
			}

			
			function sendFriendRequest() {
				
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("chat1").innerHTML = this.responseText;
						showContacts();
					}
				};
			
                var num1 = document.getElementById("userTo").value;
				var num2 = document.getElementById("textMessage").value;
				xhttp.open("POST", "pages/request_friend.php", true);
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
				
				xhttp.open("POST", "pages/search_bar.php", true);
                xhttp.send();
				return false;
            }

			function showSBF() {
                
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("chat1").innerHTML = this.responseText;                         
					}
				};
				
				xhttp.open("POST", "pages/search_bar_friend.php", true);
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
				
				xhttp.open("POST", "pages/contacts.php", true);
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
				
				xhttp.open("POST", "pages/friend.php", true);
                xhttp.send();
				return false;
			}
			
			function showModifyProfile() {
                
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("chat1").innerHTML = this.responseText;                         
					}
				};
				
				xhttp.open("POST", "pages/profile.php", true);
                xhttp.send();
				return false;
			}
			
			function loadFriendProfile(codUser) {
                
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("chat1").innerHTML = this.responseText;                         
					}
				};
				
				xhttp.open("POST", "pages/profFriend.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("codUser=" + codUser);
				return false;
			}
			
			function acceptFriend(codUser) {
                
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						showFriends();                  
					}
				};
				
				xhttp.open("POST", "pages/acceptFriend.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("codUser=" + codUser);
				return false;
			}

			function denyFriend(codUser) {
                
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						showFriends();                 
					}
				};
				
				xhttp.open("POST", "pages/denyFriend.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("codUser=" + codUser);
				return false;
			}

			function sendFriendship() {
                
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						showContacts();                
					}
				};
				var nameUser = document.getElementById("userTo").value;
				xhttp.open("POST", "pages/sendFriendship.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send("nameUser=" + nameUser);
				return false;
			}
			
            showContacts();
    
			
		</script>
</head>

<body>
    <div class="pantalla">
		<p id="nameMail"><a href="main.php">DISCORDIA</a></p>
		
		<form action="logout.php">
			<button type="submit" class="logout">Log out</button>
		</form>



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
    
		<button class="usrSpaBtn" onclick="showSBF()">
			Add friend
        </button>

        <button class="usrSpaBtn" onclick="showModifyProfile()">
            New group
		</button>
		
		<button class="usrSpaBtn" onclick="showModifyProfile()">
			Profile
		</button>
              
      
		<!-- showModifyProfile-->
      
    </div>


</div>

</div>

        
<div class="chat" id="chat1">


</div>
</div>

</body>




</html>