<?php

$date = $_POST["date"];
$year = $_POST["year"];

//$date = "2018-01-01";

$date = str_replace("-", "", $date);

$data = array_map('str_getcsv', file('SFTempData.csv'));

$matching_date = "";

function set_date($data, $year, $date){

    $monthly_data = array();

    foreach($data as $row)
    {
	    if(substr($row[2], 0, -2) == $date)
	    {
		    //echo('{ "min_temp" : ' . $row[4] . ', "max_temp": '. $row[5] . ', "precip_mm": ' .$row[6] . ', "co2_ppm": '.$row[7].'}'); 
            array_push($monthly_data, $row);
            //break;
	    }
    }

    $data_set = get_data($monthly_data);

    echo($data_set);

 }

function get_data($monthly_data){

    $min_temp = floatval($monthly_data[0][4]);

    $max_temp = floatval($monthly_data[0][5]);

    $precipitation_sum = 0;

    $co_2_sum = 0;

    foreach($monthly_data as $month)
    {
        $min_temp = get_min_temp(floatval($month[4]), $min_temp);
        $max_temp = get_max_temp(floatval($month[5]), $max_temp);

        $precipitation_sum += floatval($month[6]);

        $co_2_sum += floatval($month[7]);

    }

    $co_2_avg = get_co2_avg($co_2_sum, count($monthly_data));

    return '{ "min_temp" : ' .$min_temp . ', "max_temp": '. $max_temp  .', "precip_mm": ' . $precipitation_sum . ', "co2_ppm": '.$co_2_avg . '}';
}

function get_min_temp($current_temp, $check_temp){

    if($current_temp < $check_temp)
        return $current_temp;
    else
        return $check_temp;

}

function get_max_temp($current_temp, $check_temp){

    if($current_temp > $check_temp)
        return $current_temp;
    else
        return $check_temp;
}

function get_co2_avg($co_2_sum, $days_per_month){

    return $co_2_sum / $days_per_month;

}

function get_precip_sum($preciptation_sum){
    
}

set_date($data, $year, $date);

?>
