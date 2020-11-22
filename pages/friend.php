<?php 
	require '../sessions.php';
	require_once '../db.php';
	check_session();


        $room = load_friends($_SESSION['user']['cod_user']);
        if ($room === false) {
            echo "<p class='error'>You have no friends and should be sad haha</p>";
        } else {
            foreach($room as $ro){	
                

                
               if ($ro["count"] == 2) {

                $picture = $ro["photo"];
                $name = $ro["nick"];
                $codUser = $ro["cod_user"];
            
                echo '

                <div onclick="loadFriendProfile('.$codUser.')" class="person" method = "POST">

        
                    <input name = "name_chat" type="hidden" value = '.$name.'>
                    <input name = "avatar_chat" type="hidden" value = "'.$picture.'">                        
                    <button type="submit" class="person2">
                        <img class="profPict" src="images/avatar/'.$picture.'"alt="image_user">
                        <div class="friendName">'.$name.'</div>
                    </button>

                </div>
                ';
               }else {
                   echo'
                   <div class="person">

                        <div class="profPict"></div>
                        <div class="rest">
                            <div class="friendName">The senate</div>
                            <div class="acDecBut">
                                <button type="submit" class="ac">Y</button>
                                <button type="submit" class="dec">N</button>
                            </div>
                        </div>
                    </div>
    
                </div>



                   ';
               }
                   

                    


                    
            
            /*

             <div onclick="loadChat('.$codRoomString.','.$pictureString.', '.$nameString.')" class="person '.$view.'">

            <button class="person2">
                <img class="profPict" src="images/avatar/'.$picture.'"alt="image_user">
                <div class="friendName">'.$name.'</div>
            </button>

        </div>
            
            */
           
            



                
            }

        }

    ?>
