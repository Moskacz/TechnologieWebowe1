<?php
    $dbc = mysqli_connect('localhost', 'root', 'root', 'ZaawansowaneTechnologieWebowe1');

    $productName = $_GET['productName'];
    $productDescription = $_GET['productDescription'];

    $query = "INSERT INTO products (name, description) VALUES($productName, $productDescription)";
    mysqli_query($dbc, $query) or die('error querying');
    mysqli_close($dbc);

?>