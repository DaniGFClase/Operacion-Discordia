
<?php
/*

	require 'sessions.php';
	require_once 'db.php';
    check_session();
    setView($_POST['codRoom'], $_SESSION['user']['cod_user']);


    if (!empty($_POST['text'])) {
        if (isset($_SESSION['user']['cod_user']) && isset($_POST['codRoom']) && $_POST['text'] != "") {
            send_chat_Message($_SESSION['user']['cod_user'], $_POST['codRoom'], $_POST['text']);
            setNotView($_POST['codRoom'], $_SESSION['user']['cod_user']);
        }
    }

  
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

echo '

</div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="chtBot" method = "POST">

    <input type="text" placeholder="Write here" name="text" value="" class="msgBar">
    <input name = "avatar_chat" type="hidden" value = "<?php echo $_POST["avatar_chat"]?>">
    <input name = "codRoom" type="hidden" value = "<?php echo $_POST["codRoom"]?>2>

    <input name = "name_chat" type="hidden" value = "<?php echo $_POST["name_chat"]?>">
    <button type="submit" class="sendBtn">Send</button>


</form>

</div>

';
*/

?>