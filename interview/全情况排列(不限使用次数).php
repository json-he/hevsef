<?php
//给定一个字符串，返回所有的可能组合
function addChar($strs, $chars) {
    $result = [];
    foreach ($strs as $str) {
        foreach ($chars as $char) {
            $result[] = $str . $char;
        }
    }
    return $result;
}

$chars  = ['a', 'b', 'c'];

$group = [];
$count = count($chars);
for ($i = 1; $i <= $count; $i++) {
    if ($i == 1) {
        $group[$i] = addChar([''], $chars);
    } else {
        $group[$i] = addChar($group[$i - 1], $chars);
    }
}

// 合并数组
$result = call_user_func_array('array_merge', $group);

var_dump($group);