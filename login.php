<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
	
	$usu = check_user($_POST['user'], $_POST['password']);
	if($usu===false){
		$err = true;
		$user = $_POST['user'];
	}else{
		session_start();
		// $usu has two fields: mail and codRes
		$_SESSION['user'] = $usu;
		header("Location: main.php");
		return;
	}	
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link rel="stylesheet" href="css/login.css">

</head>

<body>

    <div class="container">
        <a class="linkT" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&list=PLahKLy8pQdCM0SiXNn3EfGIXX19QGzUG3">
            <div class="image"></div>
        </a>

        <div class="companyName"> DISCORDIA</div>




		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		
            <div class="log">
                <label for="user"><b>Username or E-mail</b></label>
                <input type="text" placeholder="Enter Username or E-mail" name="user" value = "<?php if(isset($user))echo $user;?>">

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit">Login</button>
                <button class="singIn" onclick="window.location.href='register.php';">Sing in</button>

                <span class="password">
					Forgot <a href="#">password?</a>
				</span>

				
					<?php 
						if(isset($_GET["redirected"])){
						echo "<p>Login to continue</p>";
					}?>
					<?php 
						if(isset($err) and $err == true){
						echo "<p>Check user and password</p>";
					}?>

				

            </div>

        </form>

    </div>
</body>


</html>