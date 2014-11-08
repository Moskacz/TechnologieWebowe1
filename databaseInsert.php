<?php
    $dbc = mysqli_connect('localhost', 'root', 'root', 'ZaawansowaneTechnologieWebowe1');

    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $query = "INSERT INTO products (name, description, image) VALUES('$productName', '$productDescription', '{$image}')";
    mysqli_query($dbc, $query) or die('error querying');
    mysqli_close($dbc);

?>