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