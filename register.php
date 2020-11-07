<!DOCTYPE html>
<html>

<head>
	<title>Create profile</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="register.css">
</head>

<body>

	<form action="/action_page.php" method="post">
		<div class="imgcontainer">
		  <img src="falloTecnico.jpg" alt="Avatar" class="avatar">
		</div>
	  
		<div class="container">
		  <label for="uname"><b>Username</b></label>
		  <input type="text" placeholder="Enter Username" name="uname" required>
	  
		  <label for="psw"><b>Password</b></label>
		  <input type="password" placeholder="Enter Password" name="psw" required>

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

	  </form>
	  

</body>

</html>