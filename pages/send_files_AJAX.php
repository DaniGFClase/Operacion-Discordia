<?php
	require '../sessions.php';
	require_once '../db.php';
    check_session();

    $name = $_FILES['myfile']['name'];

    $res = move_uploaded_file($_FILES["myfile"]["tmp_name"],"../files/"."$name");

  

    header ('Location: ../Home.html');
 
?>