<?php
//including the database connection file
include_once("php/config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM farmapas.farmacias ORDER BY id_farmacia DESC"); // using mysqli_query instead
?>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Farmapas</title>
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>

	<div class="container-fluid">
		<div class="row mapa-medicamentos">
			Mapa medicamentos
		</div>
		<div class="row mapa-botoes">
			<div class="col-md-3">
				<a href="./index.php">Home</a>
			</div>
			<div class="col-md-3">
				<a href="">Ver farmácias cadastradas</a>
			</div>
			<div class="col-md-3">
				<a href="add-farmacia.html">Adicionar farmácia</a>
			</div>
			<div class="col-md-3">
				<a href="add-remedio.html">Adicionar remédio</a>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<br>
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<table class="table" id="myTable">
					<thead>
						<tr>
							<th scope="col">Farmacia</th>
							<th scope="col">Endereço</th>
						</tr>
					</thead>
					<tbody>
						<?php
						//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
						while ($res = mysqli_fetch_array($result)) {
							echo "<tr>";
							echo "<td>" . $res['farmacia'] . "</td>";
							echo "<td>" . $res['endereco'] . "</td>";
						}
						?>
					</tbody>
				</table>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

</body>
<script>
	function myFunction() {
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("myInput");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[1];
			if (td) {
				txtValue = td.textContent || td.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>

</html>