
<?php 
	require '../sessions.php';
	require_once '../db.php';
	check_session();
   
?>


    <?php 
        $currentData = load_name_user($_POST['codUser']);
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