<?php
// including the database connection file
include_once("config.php");


$id = $_POST['id'];
$qtdRemedio = $_POST['quantidade'];

echo $id;
echo $qtdRemedio;

// checking empty fields
if (!empty($id)) {
	$result = mysqli_query($mysqli, "UPDATE farmapas.farmacias_disp SET qtd_remedio = $qtdRemedio WHERE id_remedio = $id;");
	header("Location: ../index.php");
} else {
}
