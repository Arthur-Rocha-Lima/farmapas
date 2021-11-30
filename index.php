<?php
//including the database connection file
include_once("php/config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "select 
								f.id_farmacia, f.farmacia, f.endereco, r.id_remedio, r.remedio, fd.qtd_remedio
								from 
								farmapas.farmacias_disp fd
								inner join
								farmapas.farmacias f ON f.id_farmacia = fd.id_farmacia
								inner join
								farmapas.remedios r ON r.id_remedio = fd.id_remedio
								;"); // using mysqli_query instead
?>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Farmapas</title>
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

	<div class="container-fluid">
		<div class="row mapa-medicamentos">
			Mapa medicamentos
		</div>
		<div class="row mapa-botoes">
			<div class="col-md-3">
				<a href="#">Home</a>
			</div>
			<div class="col-md-3">
				<a href="farmacias.php">Ver farmácias cadastradas</a>
			</div>
			<div class="col-md-3">
				<a href="add-farmacia.html">Adicionar farmácia</a>
			</div>
			<div class="col-md-3">
				<a href="add-remedio.php">Adicionar remédio</a>
			</div>
		</div>
		<div class="row search-mapa">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<input class="form-control" type="text" placeholder="Procurar..." id="myInput" onkeyup="myFunction()">
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<br>
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<table class="table" id="myTable">
					<thead>
						<tr>
							<th scope="col">Farmacia</th>
							<th scope="col">Endereço</th>
							<th scope="col">Remedio</th>
							<th scope="col">Quantidade</th>
						</tr>
					</thead>
					<tbody>
						<?php
						//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
						while ($res = mysqli_fetch_array($result)) {
							echo "<tr>";
							echo "<td>" . $res['farmacia'] . "</td>";
							echo "<td>" . $res['endereco'] . "</td>";
							echo "<td>" . $res['remedio'] . "</td>";
							echo "<td>" . $res['qtd_remedio'] . "</td>";
							echo "<td><a href=\"edit-remedio.php?id=$res[id_remedio]\">Edit</a> | <a href=\"php/delete.php?id=$res[id_remedio]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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
			td = tr[i].getElementsByTagName("td")[2];
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