<?php
    /**
    *Header content
    *Title : finalphp3.php
    *Description : page to update a particular attempt's score for a particular user for assignment 3
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

			$errMsg = "";
			if (!isset($_GET['userID'])){			// checks if the user id had been entered in the masterscript.php page
				$errMsg .= "<p>Please enter a Student Id</p>";
			}
			else {
				$userId = $_GET['userID'];
			}
			if (!isset($_GET['score'])){			// checks if the new score had been entered in the masterscript.php page
				$errMsg .= "<p>Please enter the new score</p>";
			}
			else{
				$score = $_GET['score'];
			}

			if (!isset($_GET['att'])){				// checks if the attempt number had been selected in the masterscript.php page
				$errMsg .= "<p>Please select an attempt</p>";
			}
			else{
				$attempt = $_GET['att'];
			}

			if ($errMsg == ""){
				$query = "UPDATE attempts SET Score = $score WHERE Student_ID = $userId AND Number_Of_The_Attempt = $attempt";	// update the score of the specific
				$conn = @mysqli_connect($host, $user, $pwd, $sql_db);															// user id and attempt
				$result = mysqli_query($conn, $query);
				if ($result){
					echo "<p>User Updated</p>";
					echo "<p><br /><br /><a href= 'manage.php' class='enhancement_link1'>Go back</a></p>";
				}
				else{
					echo "<p>Something went wrong</p>";
				}
			}
			else{
				echo $errMsg;
				echo "<p><br /><br /><a href= 'manage.php' class='enhancement_link1'>Go back</a></p>";
			}

					
		?>
	
	</body>

	</html>	