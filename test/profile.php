<!DOCTYPE html>
<html>

<head>
    <title>Create profile</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="profile.css">
</head>

<body>

    <form action="#">

        <div class="imgcontainer">

            <img src="emps.jpg" alt="Hello there" class="profPict">
        </div>


        <div class="container">
            <label for="name"><b>New name</b></label>
            <input type="text" placeholder="Enter your name" name="name" required>

            <label for="name"><b>New surname</b></label>
            <input type="text" placeholder="Enter your surname" name="surname" required>

            <label for="password"><b>Old password</b></label>
            <input type="password" placeholder="Enter your password" name="password" required>

            <label for="password"><b>New password</b></label>
            <input type="password" placeholder="Enter your password" name="password" required>

            <label for="gender"><b>Choose your gender</b></label>
            <select name="gender">
			  <option value="male">Male</option>
			  <option value="female">Female</option>
			  <option value="other">Other</option>
          </select>

            <label for="gender"><b>Description about yourself(250 characters)</b></label>
            <textarea name="textArea"></textarea>

            <button type="submit" class="create">Save changes</button>
        </div>

    </form>


</body>

</html>