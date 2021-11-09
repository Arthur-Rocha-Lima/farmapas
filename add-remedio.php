<?php
//including the database connection file
include_once("php/config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM farmapas.farmacias ORDER BY id_farmacia DESC"); // using mysqli_query instead
?>

<html>

<head>
    <title>Add Data</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <a href="index.php" class="row mapa-medicamentos">Home</a>
    <br /><br />

    <form action="php/add-remedio.php" method="post" name="form1" style="padding:20px">
        <div class="form-group">
            <label for="exampleInputEmail1">Remedio</label>
            <input type="text" class="form-control" name="remedio">
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Farmacias
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>
        <br>
        <!--<div class="form-group">
            <label for="exampleInputPassword1">Quantidade</label>
            <input type="text" class="form-control">
        </div>-->
        <button type="submit" name="Submit" value="Add" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>