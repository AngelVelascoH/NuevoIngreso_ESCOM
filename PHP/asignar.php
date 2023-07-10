<?php
$array = [
    "lab" => 0,
    "hora" => "",
];

function asignar($num){ 
    $num = intval($num);
    if ($num < 181) 
    {
        $array["hora"] = "09:00";

        if (in_array($num, range(1,30)) ) {
            $array["lab"] = 1;
        }
        if (in_array($num, range(31,60))) {
            $array["lab"] = 2;
        }
        if (in_array($num, range(61,90))) {
            $array["lab"] = 3;
        }
        if (in_array($num, range(91,120))) {
            $array["lab"] = 4;
        }
        if (in_array($num, range(121,150))) {
            $array["lab"] = 5;
        }
        if (in_array($num, range(151,180))){
            $array["lab"] = 6;
        }
        $ret = "Hora: ".$array["hora"]." Laboratorio: ".$array["lab"];
        return $array;
        
    }
    if ($num < 361)
    {
        $array["hora"] = "10:45";

        if (in_array($num, range(181,210))) {
            $array["lab"] = 1;
        }
        if (in_array($num, range(211,240))) {
            $array["lab"] = 2;
        }
        if (in_array($num, range(241,270))) {
            $array["lab"] = 3;
        }
        if (in_array($num, range(271,300))) {
            $array["lab"] = 4;
        }
        if (in_array($num, range(301,330))) {
            $array["lab"] = 5;
        }
        else{
            $array["lab"] = 6;
        }

        $ret = "Hora: ".$array["hora"]." Laboratorio: ".$array["lab"];
        return $ret;

    }
    /*
    if ($num < 541)
    {
        $array["hora"] = "12:30";
    }
    if ($num < 721)
    {
        $array["hora"] = "14:15";
    }
    if ($num < 901)
    {
        $array["hora"] = "16:00";
    }
    if ($num < 1081)
    {
        $array["hora"] = "17:45";
    }
*/
    
}




?>