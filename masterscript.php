<?php
    /**
    *Header content
    *Title : masterscript.php
    *Description : secondary page for manage.php for assignment 3
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
		require('settings.php');

		if (!isset($_GET['ListAttempts'])){   // checks if an option has been selected from the mange.php page
			echo "<p>Please select an option first</p>";    // if its not selected then displays an error message
			echo "<p><a href= 'manage.php' class='enhancement_link1'>Go back</a></p>";
		}
		else {$option = $_GET['ListAttempts'];                          
			if ($option == "1"){											// if option is '1' then displays a table containing all the records in the table
				if (isset($_GET['order'])){									// part of the enhancement
					$order = $_GET['order'];
				}
				else
				{
					$order = "Attempt_id";
				}
				$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
				$query = "SELECT * FROM attempts ORDER BY $order";
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
					while($row = mysqli_fetch_row($result)){
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
				mysqli_free_result($result);	
			}


			else if ($option == "2"){						// if option is '2' then displays a form to input the student id and/or name 
				echo"<form method = 'get' action = 'finalphp1.php'>\n";
				echo "<fieldset>\n<legend>Enter Student ID</legend>\n";
				echo "<p><label for = 'i'>Student ID</label>\t\t\t<input type = 'text' name = 'userID' id = 'i' /></p>\n";
				echo "<p><label for = 'n'>Student name</label><input type = 'text' name = 'name' id = 'n' /></p>\n";
				echo "<input type = 'submit' value = 'Go' class = 'btn' /></fieldset>\n</form>";
			}

			else if ($option == "3"){	// if option is '3' then displays a table containing all records of users with a full score in the first attempt
				if (isset($_GET['order'])){					// part of the enhancement
					$order = $_GET['order'];
				}
				else
				{
					$order = "Attempt_id";
				} 
				$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
				$query = "SELECT First_Name, Last_Name, Student_ID FROM attempts WHERE Number_Of_The_Attempt = 1 AND Score = 20 ORDER BY $order";
				$result = mysqli_query($conn, $query);
				echo "<br /><br /><table \n>";
					echo "<tr>\n "
					."<th scope =\"col\">First_Name</th>\n"
					."<th scope =\"col\">Last_Name</th>\n"
					."<th scope =\"col\">Student_ID</th>\n"
					."</tr>\n";
					while($row = mysqli_fetch_row($result)){
						echo "<tr\n>";
						echo "<td>",$row[0],"</td>\n";
						echo "<td>",$row[1],"</td>\n";
						echo "<td>",$row[2],"</td></tr>\n";
					}
				echo "</table>";
				echo "<p><br /><br /><a href= 'manage.php' class='enhancement_link1'>Go back</a></p>";
				mysqli_free_result($result);	
			}

			

			else if ($option == "4"){			// if option is '4' then displays a table containing all records with score less than 10 in 3rd attempt
				if (isset($_GET['order'])){		// part of the enhancement
					$order = $_GET['order'];
				}
				else
				{
					$order = "Attempt_id";
				} 
				$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
				$query = "SELECT First_Name, Last_Name, Student_ID FROM attempts WHERE Number_Of_The_Attempt = 3 AND Score < 10 ORDER BY $order";
				$result = mysqli_query($conn, $query);
				echo "<br /><br /><table \n>";
					echo "<tr>\n "
					."<th scope =\"col\">First_Name</th>\n"
					."<th scope =\"col\">Last_Name</th>\n"
					."<th scope =\"col\">Student_ID</th>\n"
					."</tr>\n";
					while($row = mysqli_fetch_row($result)){
						echo "<tr\n>";
						echo "<td>",$row[0],"</td>\n";
						echo "<td>",$row[1],"</td>\n";
						echo "<td>",$row[2],"</td></tr>\n";
					}
				echo "</table>";
				echo "<p><br /><br /><a href= 'manage.php' class='enhancement_link1'>Go back</a></p>";
				mysqli_free_result($result);	
			}

			
			else if ($option == "5"){		// if option is '5' then displays a form to input user id to delete all of his/her records
				echo"<form method = 'get' action = 'finalphp2.php'>\n";
				echo "<fieldset>\n<legend>Enter Student ID</legend>\n";
				echo "<p><input type = 'text' name = 'userID' /></p>\n";
				echo "<p><input type = 'submit' value = 'Go' class = 'btn' /></p></fieldset>\n</form>";
			}

			else if ($option == "6"){		// if option is '6' then displays a form to input user id attempt number and the new score to update existing record
				echo"<form method = 'get' action = 'finalphp3.php'>\n";
				echo "<fieldset>\n<legend>Enter Student Details</legend>\n";
				echo "<p><label for = 'UserID'>User ID</label><input type = 'text' name = 'userID' id = 'UserID' /></p>\n";
				echo "<p><label for = 'Score'>Score</label><input type = 'text' name = 'score' id = 'Score' /></p>\n";
				echo "<p><label for = 'rad1'>Attempt 1</label><input type = 'radio' id = 'rad1' name = 'att' value = '1' /></p>\n";
				echo "<p><label for = 'rad2'>Attempt 2</label><input type = 'radio' id = 'rad2' name = 'att' value = '2' /></p>\n";
				echo "<p><label for = 'rad3'>Attempt 3</label><input type = 'radio' id = 'rad3' name = 'att' value = '3' /></p>\n";
				echo "<p><input type = 'submit' value = 'Go' class = 'btn' /></p></fieldset>\n</form>";
			}
		}		

	?>
	
	</body>

</html>	