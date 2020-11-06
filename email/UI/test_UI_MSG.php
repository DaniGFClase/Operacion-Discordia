<?php
 $rando = rand(0, 15);
 if ($rando == 0) {
    $msjs = "";     
}else {
    $msjs= "+".$rando;
}
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Main UI</title>
    <link rel="stylesheet" href="test_UI.css">

    <style>
        <?php 
        if ($rando != 0) {
            echo '<style type="text/css">
            .profPict {
                filter: saturate(3); 
            }
            </style>';
        }
        ?>
    </style>

</head>

<body>
    <div class="pantalla">
        <p id="nameMail">DISCORDIA</p>

        <div id="contacts">
            <div class="newMsg">
                <button class="newMsgBtn">+ Send new message</button>
            </div>

            <div class="menu">
                <button class="tab">Messages</button>
                <button class="tab">Friends</button>
            </div>

            <div class="person">
            <?php echo ""; ?>
                <div class="profPict"></div>
                <div class="friendName">Real Name</div>
            </div>

            <div class="person">
            <?php echo $msjs; ?>
                <div class="profPict"></div>
                <div class="friendName">Real Name</div>
            </div>

            <div class="person">
            <?php echo $msjs; ?>
                <div class="profPict"></div>
                <div class="friendName">Real Name</div>
            </div>

            <div class="person">
            <?php echo $msjs; ?>
                <div class="profPict"></div>
                <div class="friendName">Real Name</div>
            </div>

            <button class="person">
            <?php echo $msjs; ?>
                <div class="profPict"></div>
                <div class="friendName">Real Name</div>
            </button>

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




