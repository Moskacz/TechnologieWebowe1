<?php

    function createProductsDivs() {
        $dbc = mysqli_connect('localhost', 'root', 'root', 'ZaawansowaneTechnologieWebowe1') or die ('Error connecting to MySQL server');
        $query = 'SELECT * FROM products';
        $results = mysqli_query($dbc, $query) or die('Error querying for products');

        while ($row = $results->fetch_array()) {
            echo "<div class='product'>";
            $productName = $row['name'];
            echo "<input type='checkbox'>$productName</input>";
            $productImageName = $row['imageName'];
            echo "<img src='$productImageName'/>";
            echo '</div>';
        }

        mysqli_close($dbc);
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
    <?php
        createProductsDivs();
    ?>
</div>

</body>
</html>