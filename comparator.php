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

    function getLeftProduct() {

    }

    function getRightProduct() {
        
    }

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="comparator.css">
    <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
    <title>Compare Products</title>
</head>
<body>

<div id="header">
    <h1>VERSUS</h1>
</div>

<div id="comparatorContainer">
    <div class="product" id="leftProduct">
        <?php generatePairs() ?>
    </div>

    <div class="product" id="rightProduct">
    </div>
</div>

<div id="slider">
</div>

<div id="footer">
</div>

</body>
</html>