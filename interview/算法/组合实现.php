<?php
//递归算法
//str_split()  字符串转数组
$a = ['a','b','c'];
$b = get_combinations($a);
echo json_encode($b);

function get_combinations($str, &$comb = [])
{
    if (count($str) > 1) {
        $str_first = array_shift($str);
        $comb_temp = get_combinations($str, $comb);
        $comb[] = [$str_first];
        foreach ($comb_temp as $k => $v) {
            $item = $v;
            $item[] = $str_first;
            $comb[] = $item;
        }
    } else {
        $comb[] = $str;
    }

    return $comb;
}

