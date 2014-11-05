<?php

    function createProductsDivs() {
        $dbc = mysqli_connect('localhost', 'root', 'root', 'ZaawansowaneTechnologieWebowe1') or die ('Error connecting to MySQL server');
        $query = 'SELECT * FROM products';
        $results = mysqli_query($dbc, $query) or die('Error querying for products');

        while ($row = $results->fetch_array()) {
            echo "<div class='product'>";
            $productName = $row['name'];
            echo "<input type='checkbox' name='$productName' style='width: 20px'/> $productName <br/>";
            $productImageName = $row['imageName'];
            echo "<img src='$productImageName'/><br/>";
            $productDescription = $row['description'];
            echo "<div class='product_description'>$productDescription</div>";
            echo '</div>';
            echo '<br/>';
        }
        mysqli_close($dbc);
    }

    function createConfirmButton() {
        echo "<input type='submit' class='cloud-button' value='Submit'/>";
    }
?>



<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Summary</title>
</head>
<body>

<div class="form" id="composer_div">
    <h1>Select products that you want to compare</h1>
    <form action="index.php" method="post">
    <?php
        createProductsDivs();
        createConfirmButton();
    ?>
    </form>
</div> 
</body>
</html>