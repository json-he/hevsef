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

$s = create_pallette(200, 200 + 50, 728);
print_r($s);