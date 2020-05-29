<?php
function combination($arr){
    if(count($arr)==1){
        return $arr;
    }

    //减少规模
    $right = array_shift($arr);  //单个
    // echo $right;exit;
    $left = $arr;
    $out = combination($left);  //一组
    foreach($out as $v){
        $out[] = $v.','.$right;
    }
    $out[] = $right;
    return $out;
}
$put = ['a','b','c','d'];
$s = combination($put);
print_r($s);

