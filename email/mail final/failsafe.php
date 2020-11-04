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
		<title>3_7</title>
        <meta charset = "UTF-8">
        <link rel="stylesheet" href="mail_Create_Users.css">
	</head>
	<body>
		<?php if (isset($err)) {
    echo "<p> Check user and password</p>";
}?>
<div class="container">
	<div class="subcontainer">
		<div class="imag"></div>

		<div class="colum">
			<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
				<div class="user">
					<label  for="user">User</label>
					<input value="" id="user" name="user" type="text">
				</div>

				<div class="password">
					<label for="passw">Password</label>
					<input value="" id="passw" name="passw" type="password">
				</div>
				<div class="age">
					<label for="age">Age</label>
					<input value="" id="age" name="age" type="text">
				</div>
				<div class="mail">
					<label for="email">E-mail</label>
					<input value="" id="email" name="email" type="text">
				</div>
				<div class="gender">
					<label for="gender">Gender</label>
					<form action="gender" method="POST">
						<select name="gender">
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Other</option>
						</select>
				</div>

				<div class="bott">
					<input type="submit" value="Create new user">
				</div>
			</form>
		</div>
    </div>

    <div class="resul"></div>
</div>

</body>
</html>