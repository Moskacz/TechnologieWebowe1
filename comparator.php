<?php

    function __autoload($class_name) {
        include $class_name . '.php';
    }

    function generatePairs() {
        $dbc = mysqli_connect('localhost', 'root', 'root', 'ZaawansowaneTechnologieWebowe1') or die ('Error connecting to MySQL server');
        $query = "SELECT * FROM products";
        $result = mysqli_query($dbc, $query);
        mysqli_close($dbc);

        $input = [];
        while ($row = $result->fetch_array()) {
            $productID = $row['ID'];
            $input[] = $productID;
        }

        $pairs = [];
        for ($i = 0; $i < sizeof($input); $i++) {
            for ($j = 0; $j < sizeof($input); $j++) {
                $firstID = $input[$i];
                $secondID = $input[$j];
                if ($firstID != $secondID) {
                    $pair = new Pair($firstID, $secondID);
                    if (arrayContainsPairObject($pairs, $pair) == false) {
                        $pairs[] = $pair;
                    }
                }
            }
        }

        return $pairs;
    }

    function arrayContainsPairObject($array, $pair) {
        for ($i = 0; $i < sizeof($array); $i++) {
            if ((string)$pair == (string)$array[$i])
                return true;
        }
        return false;
    }

    function getProductWithID($productID) {
        $dbc = mysqli_connect('localhost', 'root', 'root', 'ZaawansowaneTechnologieWebowe1') or die ('Error connecting to MySQL server');
        $query = "SELECT * FROM products WHERE ID = $productID";
        $result = mysqli_query($dbc, $query);
        return $result->fetch_array();
    }

    function getImageForProduct($product) {
        echo '<img src="data:image/jpeg;base64,'.base64_encode( $product['image'] ).'"/>';
    }

    function getDescriptionForProduct($product) {
        echo $product['description'];
    }

    function getProductID($side) {
        $index = $_GET['page'];
        $pairs = generatePairs();
        $pair = $pairs[$index];

        if ($side == "left")
            return $pair->getFirstID();
        return $pair->getSecondID();
    }
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="comparator.css">
    <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
    <script src="comparatorScripts.js"></script>
    <title>Compare Products</title>
</head>
<body>

<div id="header">
    <h1>VERSUS</h1>
</div>

<div id="comparatorContainer">
    <div class="product" id="leftProduct">
       <div class="productDescription">
            <?php getDescriptionForProduct(getProductWithID(getProductID("left"))) ?>
       </div>
       <div class="productImage">
            <?php getImageForProduct(getProductWithID(getProductID("left"))) ?>
       </div>
    </div>

    <div class="product" id="rightProduct">
       <div class="productImage">
            <?php getImageForProduct(getProductWithID(getProductID("right"))) ?>
       </div>
       <div class="productDescription">
            <?php getDescriptionForProduct(getProductWithID(getProductID("right"))) ?>
       </div>
    </div>
</div>

<div id="slider">
</div>

<div id="footer">
    <input type="button" onclick="skipToNextComparison()" value="Skip">
    <?php
        $firstProductID = getProductID("left");
        $secondProductID = getProductID("right");
        echo "<input type='button' onclick='saveSelectionAndShowComparison($firstProductID, $secondProductID)' value='Next'>";
    ?>

</div>

</body>
</html>