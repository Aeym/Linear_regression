<?php 

    $csv = array_map('str_getcsv', file('data.csv')); 
    $GLOBALS["data"] = normalized_data($csv);
    $GLOBALS["lrate"] = 0.1;

    $ret = gradient_descent();
    print_r($ret);
    file_put_contents("./thetas.csv", $ret[0] . "," . $ret[1]);

    function gradient_descent() {
        $theta0 = 0;
        $theta1 = 0;
        for ($i = 0; $i < 10000; $i++) {
            $tmp_thetas = new_thetas($theta0, $theta1);
            $theta0 -= $tmp_thetas[0];
            $theta1 -= $tmp_thetas[1];
        }
        return array($theta0, $theta1);
    }


    function new_thetas($theta0, $theta1) {
        $csv = $GLOBALS["data"];
        $c = count($csv);
        $dtheta0 = 0.0;
        $dtheta1 = 0.0;
        for($i = 0; $i < $c; $i++) {
            $tmp = $theta0 + ($theta1 * $csv[$i][0]) - $csv[$i][1];
            $dtheta0 += $tmp;
            $dtheta1 += $tmp * $csv[$i][0];
        }
        return array($dtheta0 / $c * $GLOBALS["lrate"], $dtheta1 / $c * $GLOBALS["lrate"]);
    }


    function normalized_data($csv) {
        $minmax = findminmax($csv);
        $c = count($csv);
        $new_arr_data = array();
        for ($i = 1; $i < $c; $i++) {
            $new_arr_data[$i - 1][0] = ($csv[$i][0] - $minmax["minkm"]) / ($minmax["maxkm"] - $minmax["minkm"]);
            $new_arr_data[$i - 1][1] = $csv[$i][1];
        }
        return $new_arr_data;
    }

    function findminmax($csv) {
        $c = count($csv);
        $minkm = 0;
        $maxkm = 0;
        $minprice = 0;
        $maxprice = 0;
        for ($i = 1; $i < $c; $i++) {
            if ($minkm == 0) {
                $minkm = $csv[$i][0];
                $maxkm = $csv[$i][0];
                $minprice = $csv[$i][1];
                $maxprice = $csv[$i][1];
            }
            if ($csv[$i][0] < $minkm) {
                $minkm = $csv[$i][0];
            }
            if ($csv[$i][0] > $maxkm) {
                $maxkm = $csv[$i][0];
            }
            if ($csv[$i][1] < $minprice) {
                $minprice = $csv[$i][1];
            }
            if ($csv[$i][1] > $maxprice) {
                $maxprice = $csv[$i][1];
            }
        }
        return array("minkm" => $minkm, "maxkm" => $maxkm, "minprice" => $minprice, "maxprice" => $maxprice);
    }
?>