<?php
    $fruits = ["りんご", "みかん", "もも"];
    $units = [100,50,300];
    $Quantitys = [3,3,10];

    function getTotalPrice($unit = 0, $Quantity = 0){
        $total = $unit * $Quantity;
        return $total;
    }

    for ($i = 0; $i < count($fruits); $i++) {
        print $fruits[$i]."は".getTotalPrice($units[$i],$Quantitys[$i])."円です。<br>";
    }

?>