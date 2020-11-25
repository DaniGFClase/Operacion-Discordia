<?php

/* Get the name of the uploaded file */
$filename = $_FILES['file']['name'];

/* Choose where to save the uploaded file */
$location = "../files/".$filename;

/* Save the uploaded file to the local filesystem */
if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) { 
  echo 'Success'; 
} else { 
  echo 'Failure'; 
}


  send_chat_Message($_SESSION['user']['cod_user'], $_POST['codRoom'], $filename);
  setNotView($_POST['codRoom'], $_SESSION['user']['cod_user']);
        

?>