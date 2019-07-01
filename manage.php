<?php
    /**
    *Header content
    *Title : manage.php
    *Description : manage page for assignment 3
    *Author : Chamath Vindula
    *Date : 21/05/2018
    */
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset ="utf-8" />
		<meta name="description" content="PHP script for supervisor access to database" />
		<meta name="keywords" content="supervisor,attempts,php" />
		<title>Supervisor Access</title>	
		<link href="styles/style.css" rel="stylesheet" />
	</head>

	<body>
			<?php
				require('header.inc');
			?>
			<?php
			// form to display all the possible options to handle the database to the supervisor
			// supervisor can click select any one option and it will take him/her to the respective php page wither to display the infomation directly or to 
			// let him/her specify a user
			?>
			<form method="get" action="masterscript.php">
			<fieldset>
				<legend>Select an option</legend>
				<p><input type="radio" id="rad1" name="ListAttempts" value="1" /><label for="rad1">List all attempts</label></p>

				<p><input type="radio" id="rad2" name="ListAttempts" value="2" /><label for="rad2">All atttempts for a particular student</label></p>

				<p><input type="radio" id="rad3" name="ListAttempts" value="3" /><label for="rad3">All students who got full marks in the first attempt</label></p>

				<p><input type="radio" id="rad4" name="ListAttempts" value="4" /><label for="rad4">All students who got less than 10 marks in the final attempt</label></p>

				<p><input type="radio" id="rad5" name="ListAttempts" value="5" /><label for="rad5">Delete all attempts of a particular student</label></p>

				<p><input type="radio" id="rad6" name="ListAttempts" value="6" /><label for="rad6">Change score of a particular attempt</label></p>
				
			</fieldset>
			<fieldset>
				<legend>Order By</legend>
				<p><input type="radio" id="rad7" name="order" value="First_Name" /><label for="rad7">First name</label></p>

				<p><input type="radio" id="rad8" name="order" value="Last_Name" /><label for="rad8">Last name</label></p>

				<p><input type="radio" id="rad9" name="order" value="Student_ID" /><label for="rad9">Student Id</label></p>

				<p><input type="radio" id="rad10" name="order" value="Score" /><label for="rad10">Score</label></p>

				<input type="submit" value="Go" class="btn" />
			</fieldset>
			</form>
			
			<?php
				require ('footer.inc');
			?>
	</body>

</html>	