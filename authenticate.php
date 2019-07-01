<?php
    /**
    * Header content
    *Title : authenticate.php
    *Description : enhancement page for assignment 3
    *Author : Chamath Vindula
    *Date : 21/05/2018
    */
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset ="utf-8" />
		<meta name="description" content="PHP script to authenticate a supervisor" />
		<meta name="keywords" content="authenticate,supervisor,php" />
		<title>Supervisor Authenticate</title>	
		<link href="styles/style.css" rel="stylesheet" />
	</head>

	<body>

	<?php
		require('header.inc');
		// This is a simple form for the supervisor to enter his/her user ID and password for authentication which will take them to the authenticateUser.php page
	?>

	<form method="get" action="authenticateUser.php">
		<fieldset>
			<legend>Enter ID and Password</legend>
			<p><label for="supervisorID">ID</label><input type="text" name="superID" id="supervisorID" /></p>
			<p><label for="supervisorPASS">Password</label><input type="text" name="superPASS" id="supervisorPASS" /></p>
			<p><input type="submit" value = 'Authenticate' class = 'btn' /></p>	
		</fieldset>
	</form>
	<?php
		// a preset user id and password is given here for testing purposes
	?>
	<p>id - 9999999<br />password - supervisor2</p>
	<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
	<?php
		require ('footer.inc');
	?>
	</body>
	
	</html>		


