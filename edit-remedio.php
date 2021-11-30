<?php
//including the database connection file
include_once("php/config.php");
$id_remedio = $_GET['id'];
?>

<html>

<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <a href="./index.php" class="row mapa-medicamentos">Home</a>
    <br /><br />

    <form action="php/edit.php" method="post" name="form1" style="padding:20px">
        <div class="form-group">
            <label for="exampleInputEmail1">Quantidade</label>
            <input type="text" class="form-control" name="quantidade">
        </div>
        <div class="form-group" style="display: none;">
            <label for="exampleInputEmail1">Id remédio</label>
            <?php
            echo "<input type=\"text\" class=\"form-control\" value=\"$id_remedio\" name=\"id\">";
            ?>
        </div>
        <br>
        <button type="submit" name="Submit" value="Add" class="btn btn-primary">Submit</button>
    </form>

</body>

</html>