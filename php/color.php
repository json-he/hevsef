<?php
function create_pallette($start, $end, $entries = 10)
{
    $inc = ($start - $end) / ($entries - 1);
    $out = array(0 => $start);
    for ($x = 1; $x < $entries; $x++) {
        $out [$x] = $start + $inc * $x;
    }
    return $out;
}

$s = create_pallette(252, 252 - 5, 400);
print_r($s);