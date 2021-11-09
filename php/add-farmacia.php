<html>

<head>
	<title>Add Data</title>
</head>

<body>
	<?php
	//including the database connection file
	include_once("config.php");

	if (isset($_POST['Submit'])) {
		$farmacia = mysqli_real_escape_string($mysqli, $_POST['farmacia']);
		$endereco = mysqli_real_escape_string($mysqli, $_POST['endereco']);

		// checking empty fields
		if (empty($farmacia) || empty($endereco)) {

			if (empty($farmacia)) {
				echo "<font color='red'>Farmacia field is empty.</font><br/>";
			}

			if (empty($endereco)) {
				echo "<font color='red'>Endereco field is empty.</font><br/>";
			}

			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else {
			// if all the fields are filled (not empty) 

			//insert data to database	
			$result = mysqli_query($mysqli, "INSERT INTO farmacias (farmacia, endereco) VALUES('$farmacia','$endereco')");
			header("Location: http://localhost/Estudo/crud-php-simple/");
		}
	}
	?>
</body>

</html>