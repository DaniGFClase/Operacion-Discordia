<?php
$user_input = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /*
    if ($_POST['user'] === "usuario" and checkPassRE($_POST["passw"])) {
    }//end of checking
     */



    $cadena_conexion = 'mysql:dbname=company;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';

    $usr = $_POST['user'];
	$pass = $_POST["passw"];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$email = $_POST['email'];
    $rol = '1';

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
	
    try {
        // connect
        $bd = new PDO($cadena_conexion, $usuario, $clave);
     
        // insert new user
        $ins = "insert into users(name, password, role, age, email, gender) values('$usr', '$pass', '$rol', '$age', '$email', '$gender');";
        $resul = $bd->query($ins);
   
        // update
        $upd = "update users set role =  0 where role = 1";
        $resul = $bd->query($upd);
/*
        // delete
        $del = "delete from users where name = 'Luisa'";
        $resul = $bd->query($del);
        //check errors
        if ($resul) {
           /* echo "Delete OK <br>";
            echo "Deleted rows: " . $resul->rowCount() . "<br>";
        } else {
            print_r($bd->errorinfo());
        }
*/
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
	<link rel="stylesheet" href="mail_Create_User.css">
</head>

<body>
<?php if (isset($err)) {
    echo "<p> Check user and password</p>";
}?>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<div class="imgcontainer">
		  <img src="img_avatar2.png" alt="Avatar" class="avatar">
		</div>
	  
		<div class="container">
		  <label for="user"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="user" required>
	  
		  <label for="passw"><b>Password</b></label>
		  <input type="password" placeholder="Enter Password" name="passw" required>

		  <label for="age"><b>Age</b></label>
		  <input type="text" placeholder="Enter age" name="age" required>

		  <label for="email"><b>E-mail</b></label>
		  <input type="text" placeholder="Enter E-mail" name="email" required>

		  <label for="gender"><b>Gender</b></label>
		  <select name="gender">
			  <option value="male">Male</option>
			  <option value="female">Female</option>
			  <option value="other">Other</option>
		  </select>

		  <label for="selcProf"><b>Select profile picture</b></label>
		  <button type="button" name="selcProf" class="smt">Submit</button>
		
			  
		  <button type="submit" class="create">Create User</button>
		</div>
	  
		<div class="container" style="background-color:#f1f1f1">
		  <button type="button" class="cancelbtn">Cancel</button>
		</div>
	  </form>
	  

</body>

</html>


