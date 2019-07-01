<?php
    /**
    *Header content
    *Title : finalphp2.php
    *Description : page deleting all attempts of a particular user for assignment 3
    *Author : Chamath Vindula
    *Date : 21/05/2018
    */
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset ="utf-8" />
		<meta name="description" content="PHP script for supervisor access to database" />
		<meta name="keywords" content="final,db,php" />
		<title>Supervisor Access</title>	
		<link href="styles/style.css" rel="stylesheet" />
	</head>

	<body>

		<?php
			require('header.inc');
			require('settings.php');

			if (!isset($_GET['userID'])){			// check if the user ID had been entered in the masterscript.php page
				echo "<p>Please enter a Student Id</p>";
				echo "<p><a href = 'masterscript.php' class='enhancement_link1'>Go back</a></p>";
			}
			else {
				$userId = $_GET['userID'];
			
				$query = "DELETE FROM attempts WHERE Student_ID = $userId";   // deletes all user records that match the user id
				$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
				$result = mysqli_query($conn, $query);
				
				if ($result){
					echo "<p>User Deleted</p>";
					echo "<p><br /><br /><a href= 'manage.php' class='enhancement_link1'>Go back</a></p>";
				}
				else{echo "<p>Something went wrong!</p>";}
			}	
		?>
	
	</body>

	</html>	