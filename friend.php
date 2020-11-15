<?php 
	require 'sessions.php';
	require_once 'db.php';
	check_session();


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
