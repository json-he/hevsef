<?php
 $begin = 0;
 $end = 47;
 $input = range($begin,$end);
$out = [];
for($i=0;$i<7;$i++){
    foreach ($input as $v){
        $out[] = $i*24+ 0.5*$v;
    }
}

print_r($out);
