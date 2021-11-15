<?php

$directions = array(1 => "NORTH", 2 => "WEST", 3 => "SOUTH", 4 => "EAST");
$axis = array("1" => 1, "2" => 1, "3" => -1, "4" => -1);

$x = $argv[1];
$y = $argv[2];
$currentDir = $argv[3];
$path = $argv[4];
$currentDirNo = array_search($currentDir, $directions);

for ($i = 0; $i < strlen($path); $i++) {
    if($path{$i} == 'R') {
        if ($currentDirNo == 4) {
            $currentDirNo = 1;
        } else {
            $currentDirNo++;
        }
    } elseif($path{$i} == 'L'){
        if ($currentDirNo == 1) {
            $currentDirNo = 4;
        } else {
            $currentDirNo--;
        }
    } elseif($path{$i} == 'W'){
        if ($currentDirNo % 2 == 0) {
            $x += ($path{$i+1} * $axis[$currentDirNo]);
        } else {
            $y += ($path{$i+1} * $axis[$currentDirNo]);
        }
        $i++;
    } else{
        echo "{$path{$i}} is not valid input";
        exit;
    }
}
echo $x." ".$y." ".$directions[$currentDirNo];
?>