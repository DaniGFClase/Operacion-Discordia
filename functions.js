function loadLogin() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.body.innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "login.php", true);
    xhttp.send();
    return false;
}



function accessLogin() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.body.innerHTML = this.responseText;
            load_Main();
        }
    };
    var name = document.getElementById("user").value;
    var password = document.getElementById("password").value;
    xhttp.open("POST", "pages/accessLogin.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("user=" + name + "&password=" + password);
    return false;
}



function load_Main() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.body.innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "main.php", true);
    xhttp.send();
    return false;
}


function loadChat(codRoom, avatar_chat, name_chat) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("chat1").innerHTML = this.responseText;
            var myDiv = document.getElementById("textChat");
            myDiv.scrollTop = myDiv.scrollHeight;
            showContacts();

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

function showAllUsers() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("contacts").innerHTML = this.responseText;
        }
    };

    xhttp.open("POST", "pages/allUser.php", true);
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

function showNewGroup() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("chat1").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "pages/newGroup.php", true);
    xhttp.send();
    return false;
}

function createNewGroup() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("chat1").innerHTML = this.responseText;
        }
    };
    var users = document.getElementById("userTo").value;
    var namegroup = document.getElementById("nameGroup").value;
    xhttp.open("POST", "pages/createNewGroup.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("users=" + users + "&nameGroup=" + namegroup);
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
            //showContacts();                
            document.getElementById("chat1").innerHTML = this.responseText;
        }
    };
    var nameUser = document.getElementById("userTo").value;
    xhttp.open("POST", "pages/sendFriendship.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("nameUser=" + nameUser);
    return false;
}

function logOut() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.body.innerHTML = this.responseText;
            loadLogin();
        }
    };

    xhttp.open("POST", "pages/logout.php", true);
    xhttp.send();
    return false;
}

window.onload = load_Main;