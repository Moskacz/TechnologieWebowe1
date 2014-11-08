<?php
    $userName = $_GET['userName'];
    $firstProductID = $_GET['firstProductID'];
    $secondProductID = $_GET['secondProductID'];
    $comparisonValue = $_GET['comparisonValue'];

    $dbc = mysqli_connect('localhost', 'root', 'root', 'ZaawansowaneTechnologieWebowe1');
    $query = "INSERT INTO comparisons(userName, firstProductID, secondProductID, comparisonValue) VALUES ('$userName',$firstProductID,$secondProductID,$comparisonValue)";
    mysqli_query($dbc, $query) or die("Error querying");
    mysqli_close($dbc);
?>