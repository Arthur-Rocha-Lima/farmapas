<html>

<head>
	<title>Add Data</title>
</head>

<body>
	<?php
	//including the database connection file
	include_once("config.php");

	if (isset($_POST['Submit'])) {
		$remedio = mysqli_real_escape_string($mysqli, $_POST['remedio']);
		// checking empty fields
		if (empty($remedio)) {

			if (empty($remedio)) {
				echo "<font color='red'>Campo remedio está vazio.</font><br/>";
			}

			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else {
			// if all the fields are filled (not empty) 

			//insert data to database	
			$result = mysqli_query($mysqli, "INSERT INTO remedios (remedio) VALUES ('$remedio')");
			header("Location: http://localhost/Estudo/crud-php-simple/");
		}
	}
	?>
</body>

</html>