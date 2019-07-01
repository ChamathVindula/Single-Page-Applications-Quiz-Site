<?php
    /**
    *Header content
    *Title : phpenhancements.php
    *Description : enhancement description page for assignment 3
    *Author : Chamath Vindula
    *Date : 21/05/2018
    */
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset ="utf-8" />
		<meta name="description" content="PHP page to display the enhancements for assignment 3" />
		<meta name="keywords" content="enhancments,assignment3,php" />
		<title>PHP Enhancements</title>	
		<link href="styles/style.css" rel="stylesheet" />
	</head>

	<body>
			<?php
				require('header.inc');
			?>

			<h1>Enhancements</h1>

	<h2>Enhancement 1<br /> Supervisor Login Page</h2>

	<ul class="enhancement_list">
		<li>For my first enhancement I have created a Supervisor login page to first authenticate the user before he/she gets access to the manage.php page.</li>

		<li>Although the concepts are the same, this page (enhancement) uses both php and sql in a different way than in markquiz.php.</li>

		<li>I have broken down this enhancement into two pages (authenticateUser.php/authenticate.php).</li>

		<li>Authenticate.php simply outputs a form for the supervisor to enter his/her User ID and password.</li>

		<li>AuthenticateUser.php takes in the form inputs and checks them against a 'supervisor' table in the database.</li>

		<li>If the entered User ID and password matches a record in the table then the user is taken to the manage.php page.</li>

		<li>If it does not match any record in the table then an error message is displayed.</li>

		<li>The code for cheking if the supervisor id and password are correct is shown below: </li>

		<li><p><code>$query = "SELECT * FROM supervisor";<br />
				$result = mysqli_query($conn,$query);<br />
				if (!$result){<br />
					echo "Something went wrong";<br />
				}<br />
				else{<br />
					$cond = true;<br />	
					while ($row = mysqli_fetch_row($result)){<br />
						if ($row[0] == $id && $row[1] == $pass){<br />
							header("location: manage.php");<br />
							$cond = false;<br />
						}<br />
					}<br />
					if ($cond){<br />
						echo "Authentication failure";<br />
						echo "<a href = 'authenticate.php' class='enhancement_link1'>GO BACK</a>";<br />
					}<br />
				}		</code></p></li>

		<li>NOTE : What is shown above is not the complete code but just a part of it.</li>		

		<li>I have not used any third party code for this enhancement except the week 10 lecture notes for this unit and is entirely my work.</li>

		<li>The link for the week 10 lecture notes is :<br />https://ilearn.swin.edu.au/bbcswebdav/pid-7110962-dt-content-rid-40496060_2/courses/2018-HS1-COS10011-228290/L10_ServerSideData_2pp%281%29.pdf</li>

		<li>Click <a href="authenticate.php" target="_blank" class="enhancement_link1">'here'</a> if you want to have another look at the enhancement.</li>
	</ul>

		<h2>Enhancement 2<br />Selecting a field for sorting the attempt display order</h2>

	<ul class="enhancement_list">
		<li>For my second enhancement I have created another additional feature for the manage.php page</li>

		<li>This contains radio buttons which can be selected to change the order of displaying user attempt records</li>

		<li>If no order button is selected then the results are automatically ordered by the attempt_id field of the table</li>

		<li>I have not sued any third party code for this enhancement except the week 10 lecture notes for this unit and is entirely my work.</li>

		<li>The link for the week 10 lecture notes is :<br />https://ilearn.swin.edu.au/bbcswebdav/pid-7110962-dt-content-rid-40496060_2/courses/2018-HS1-COS10011-228290/L10_ServerSideData_2pp%281%29.pdf</li>

		<li>The general code for implementing the order by functionality is given below: </li>

		<li><p><code>if ($option == "1"){<br />											
				if (isset($_GET['order'])){<br />									
					$order = $_GET['order'];<br />
				}<br />
				else<br />
				{<br />
					$order = "Attempt_id";<br />
				}<br />
				}<br />	
				$query = "SELECT * FROM attempts ORDER BY $order";	</code></p></li>

		<li>NOTE : What is shown above is not the complete code but just a generalized version of it.</li>		

		<li>I have not used any third party code for this enhancement except the week 10 lecture notes for this unit and is entirely my work.</li>

		<li>The link for the week 10 lecture notes is :<br />https://ilearn.swin.edu.au/bbcswebdav/pid-7110962-dt-content-rid-40496060_2/courses/2018-HS1-COS10011-228290/L10_ServerSideData_2pp%281%29.pdf</li>
	</ul>


	<?php
		require('footer.inc');
	?>
	</body>
</html>			