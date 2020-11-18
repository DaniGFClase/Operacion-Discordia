<?php 
	require 'sessions.php';
	require_once 'db.php';
    check_session();
   
?>



<!DOCTYPE html>
<html>

<head>
    <title>Create profile</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="profile.css">

</head>

<body>
    <?php 
        $currentData = load_name_user($_SESSION['user']['cod_user']);
    ?>

    <div class="mainD">


        <div class="imgcontainer">
                <?php 
                echo '<img src="images/avatar/'.$currentData['photo'].'" class="profPict" alt="Hello there">';
                ?>
            </div>


            <div class="container">

                <label for="name"><b>New name</b></label>
                <div class="name"><?php echo $currentData['name']?></div>
            
                <label for="surname"><b>New surname</b></label>
                <div  class="surname"><?php echo $currentData['surname']?></div>


                <label for="description"><b>Description about yourself(250 characters)</b></label>
                <div class="description"><?php echo $currentData['description']?></div>

            
            </div>

    </div>
      
      
 


</body>

</html>