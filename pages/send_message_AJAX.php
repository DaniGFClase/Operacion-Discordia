
<?php 

require '../sessions.php';
require_once '../db.php';
check_session();

   if (!empty($_POST['text']) || !empty($_POST['file'])) {
        if ((isset($_SESSION['user']['cod_user']) && isset($_POST['codRoom']) && $_POST['text'] != "") && empty($_POST['file'])) {
            send_chat_Message($_SESSION['user']['cod_user'], $_POST['codRoom'], $_POST['text']);
            setNotView($_POST['codRoom'], $_SESSION['user']['cod_user']);
        }else if ((isset($_SESSION['user']['cod_user']) && isset($_POST['codRoom']) && $_POST['file'] != "") && empty($_POST['text'])) {

            
            $name = $_FILES['myfile']['name'];

            $res = move_uploaded_file($_FILES["myfile"]["tmp_name"],"../files/"."$name");

            send_chat_Message($_SESSION['user']['cod_user'], $_POST['codRoom'], $_POST['file']);
            setNotView($_POST['codRoom'], $_SESSION['user']['cod_user']);
       
        
        }
    }else{

        
        
        echo "Error";
    }

