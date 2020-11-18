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
    <link rel="stylesheet" href="css/profile.css">

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

                <label for="name"><b>Name</b></label>
                <div class="name"><?php echo $currentData['name']?></div>
            
                <label for="surname"><b>Surname</b></label>
                <div  class="surname"><?php echo $currentData['surname']?></div>

                <label for="surname"><b>Nick</b></label>
                <div  class="surname"><?php echo $currentData['nick']?></div>

                <label for="surname"><b>Email</b></label>
                <div  class="surname"><?php echo $currentData['mail']?></div>

                <label for="surname"><b>Gender</b></label>
                <div  class="surname"><?php echo $currentData['gender']?></div>

                <label for="description"><b>Description</b></label>
                <div class="description"><?php echo $currentData['description']?></div>

            
            </div>

    </div>
      
      
 


</body>

</html>