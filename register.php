<?php
//require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /*
    if ($_POST['user'] === "usuario" and checkPassRE($_POST["passw"])) {
    }//end of checking
     */



    $cadena_conexion = 'mysql:dbname=discordio;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';


    $nam = $_POST['name'];
    $sur = $_POST['surname'];
    $usr = $_POST['nick'];
	$pass = $_POST['password'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];

    if ($gender == "male") {
        $male_selected = "selected";
        $female_selected = "";
        $other_selected = "";
    } elseif ($gender == "female") {
        $male_selected = "";
        $female_selected = "selected";
        $other_selected = "";
    } elseif ($gender == "othe") {
		$male_selected = "";
        $female_selected = "";
        $other_selected = "selected";
    }
    


    echo "name ".$nam." surname ".$sur." nick ".$usr." password ".$pass." mail ".$email." gender ".$gender;
	
    try {
        // connect
        $bd = new PDO($cadena_conexion, $usuario, $clave);
     
        // insert new user
        $ins = "insert into user(name, surname, nick, password, email, gender) values('$nam', '$sur', '$usr', '$pass', '$email', '$gender');";
        $resul = $bd->query($ins);
   

    } catch (PDOException $e) {
        echo 'Database error: ' . $e->getMessage();
    }

}
function checkName($clave)
{
    if (strlen($clave) < 6 or strlen($clave) > 15) {
        return false;
    }

    $caps = preg_match("/[A-Z]/", $clave);
    $lower = preg_match("/[a-z]/", $clave);
    $nume = preg_match("/[0-9]/", $clave);
    $noalfa = preg_match("/[!-\\\\]/", $clave);
    return $lower and $caps and $nume and $noalfa;
}

function checkPassRE($clave)
{
    if (strlen($clave) < 6 or strlen($clave) > 15) {
        return false;
    }

    $caps = preg_match("/[A-Z]/", $clave);
    $lower = preg_match("/[a-z]/", $clave);
    $nume = preg_match("/[0-9]/", $clave);
    $noalfa = preg_match("/[!-\\\\]/", $clave);
    return $lower and $caps and $nume and $noalfa;
}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Create profile</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="register.css">
</head>

<body>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="imgcontainer">
		  <img src="#" alt="Avatar" class="avatar">
		</div>
	  
		<div class="container">
        <label for="name"><b>Name</b></label>
          <input type="text" placeholder="Enter your name" name="name" required>
          
          <label for="name"><b>Surname</b></label>
		  <input type="text" placeholder="Enter your surname" name="surname" required>

		  <label for="nick"><b>Nickname</b></label>
		  <input type="text" placeholder="Enter your nick" name="nick" required>
	  
		  <label for="password"><b>Password</b></label>
		  <input type="password" placeholder="Enter your password" name="password" required>

		  <label for="email"><b>E-mail</b></label>
		  <input type="text" placeholder="Enter your E-mail" name="email" required>

		  <label for="gender"><b>Choose your gender</b></label>
		  <select name="gender">
			  <option value="male">Male</option>
			  <option value="female">Female</option>
			  <option value="other">Other</option>
		  </select>

		  <label for="selcProf"><b>Select a profile picture</b></label>
		  <button type="button" name="selcProf" class="smt">Submit</button>
		
			  
		  <button type="submit" class="create">Create User</button>
		</div>

	  </form>
	  

</body>

</html>