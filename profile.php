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

    <form action="pages/uploadProfile.php" method="post" enctype="multipart/form-data">
      
        <div class="imgcontainer">
            <?php 
            echo '<img src="images/avatar/'.$currentData['photo'].'" class="profPict" alt="Hello there">';
            ?>
        </div>


        <div class="container">

            <label for="name"><b>New name</b></label>
            <input type="text" value="<?php echo $currentData['name']?>" name="name">
          
            <label for="surname"><b>New surname</b></label>
            <input type="text" value="<?php echo $currentData['surname']?>" name="surname">


            <label for="description"><b>Description about yourself(250 characters)</b></label>
            <textarea name="description" value="<?php echo $currentData['description']?>"></textarea>

            <label for="photo"><b>Choose avatar photo</b></label>
            <input type="file" name="myfile" value="<?php echo $currentData['photo'] ?>">
            <input type="hidden" value="<?php echo $currentData['nick']?>" name="nick">

            <button type="submit" class="create">Save changes</button>
        </div>

    </form>


</body>

</html>