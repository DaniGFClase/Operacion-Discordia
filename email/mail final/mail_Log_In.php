<?php
$user_input = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $connection_string = 'mysql:dbname=company;host=127.0.0.1';
    $user = 'root';
    $password = '';
    echo "Connected<br>";		

    $usr = $_POST['user'];
	$pass = $_POST["passw"];
	$email = $_POST['email'];

    try {
        $bd = new PDO($connection_string, $user, $password);
        //   echo "Connected<br>";
        $sql = 'SELECT name, email, password, role FROM users';
        $users = $bd->query($sql);
        //  echo "Number of users: " . $users->rowCount() . "<br>";
        foreach ($users as $usu) {
            if (($usr === $usu['name'] && $pass === $usu['password']) || ($usr === $usu['email'] && $pass === $usu['password'])) {
                print "name : " . $usu['name'] . "<br>";
                print "password : " . $usu['password'] . "<br>";
                print "email : " . $usu['email'] . "<br>";
            }
        }

    } catch (PDOException $e) {
        echo 'Database error:' . $e->getMessage();
    }

    $usu = check_user($_POST['nameMail'], $_POST['passw']);
    if ($usu == false) {
        $err = true;
        $user = $_POST['nameMail'];
    } else {
        session_start();
        $_SESSION['user'] = $usu;
        header("Location: bienvenido.html");
    }

}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Log in</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="mail_Log_In.css">
</head>

<body>

	<form action="/action_page.php" method="post">
		<div class="imgcontainer">
		  <img src="img_avatar2.png" alt="Avatar" class="avatar">
		</div>

		<div class="container">
		  <label for="nameMail"><b>Username or E-mail</b></label>
		  <input type="text" placeholder="Enter Username or E-mail" name="nameMail" required>

		  <label for="passw"><b>Password</b></label>
		  <input type="password" placeholder="Enter Password" name="passw" required>

		  <button type="submit">Login</button>
		  <label>
			<input type="checkbox" checked="checked" name="remember"> Remember me
		  </label>
		</div>

		<div class="container" style="background-color:#f1f1f1">
		  <button type="button" class="cancelbtn">Cancel</button>
		  <span class="psw">Forgot <a href="#">password?</a></span>
		</div>
	  </form>


</body>

</html>
