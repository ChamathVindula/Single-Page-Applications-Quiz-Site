<?php
    /**
    *Header content
    *Title : finalphp1.php
    *Description : page displaying all attempts for a particular user for assignment 3
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

			if (!isset($_GET['userID'])){  // if userID is not set in masterscript.php then this generates an error message
				echo "<p>Please enter a Student Id</p>";
				echo "<p><a href = 'masterscript.php' class='enhancement_link1'>Go back</a></p>";
			}
			else {
				$userId = $_GET['userID'];
			}
			if (isset($_GET['name'])){
				$name = $_GET['name'];
			}
			else{$name = "";
			}
			// 
			$query = "SELECT * FROM attempts WHERE Student_ID LIKE '$userId%' AND First_Name LIKE '$name%'";  // select all the records from the table with either 
			$conn = @mysqli_connect($host, $user, $pwd, $sql_db);											  // the matching student name and/or id	
			$result = mysqli_query($conn, $query);	
			echo "<br /><br /><table \n>";
					echo "<tr>\n "
					."<th scope =\"col\">Attempt_ID</th>\n"
					."<th scope =\"col\">Date_Of_Attempt</th>\n"
					."<th scope =\"col\">Time_Of_Attempt</th>\n"
					."<th scope =\"col\">First_Name</th>\n"
					."<th scope =\"col\">Last_Name</th>\n"
					."<th scope =\"col\">Student_ID</th>\n"
					."<th scope =\"col\">Number_Of_The_Attempt</th>\n"
					."<th scope =\"col\">Score</th>\n"
					."</tr>\n";
					while($row = mysqli_fetch_row($result)){		// display all the selected records in a table
						echo "<tr\n>";
						echo "<td>",$row[0],"</td>\n";
						echo "<td>",$row[1],"</td>\n";
						echo "<td>",$row[2],"</td>\n";
						echo "<td>",$row[3],"</td>\n";
						echo "<td>",$row[4],"</td>\n";
						echo "<td>",$row[5],"</td>\n";
						echo "<td>",$row[6],"</td>\n";
						echo "<td>",$row[7],"</td>\n</tr>\n";
					}
			echo "</table>";		

			echo "<p><br /><br /><a href= 'manage.php' class='enhancement_link1'>Go back</a></p>";		
		?>
	
	</body>

	</html>	