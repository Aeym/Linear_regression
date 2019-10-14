<?php 

    if (!file_exists("./thetas.csv")) {
        file_put_contents("./thetas.csv", "0,0");
    }
    $thetas = str_getcsv(file_get_contents("./thetas.csv"), ",");
    echo "Enter a number of kilometers > 0 (must be int) :\n";
    $km = intval(fgets(STDIN));
    if ($km != 0) {
        $kmbis = ($km - 22899) / (240000 - 22899);
        $estimated_price = $thetas[0] + $thetas[1] * $kmbis;
        if ($estimated_price < 0) {
            $estimated_price = 0;
        }
        echo "Estimated price is " . intval($estimated_price) . " for " . intval($km) . " kilometers.\n";
    } else {
        echo "Error, your entry is not acceptable.\n";
    }
?>