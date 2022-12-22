<?php

$b = [-1, -4, -7 , -9 , 1, 4, 16, 25];

$say = 0 ;
$c = array();
foreach ($b as $a) {
    if ($a < 0) {
        $a = ($a * $a);
        $c[$say] = $a;
    } else {
        $a = sqrt($a);
        $c[$say] = $a;
    }
    $say++;
}
var_dump($c);



?>