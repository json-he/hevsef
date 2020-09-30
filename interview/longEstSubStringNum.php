<?php
function lengthOfLongestSubstring($s)
{
    $res = 0;   //最大字符长度
    $left = -1;  //上一个重复字符
    $tmp = [];  //存单个字符

    $len = $s ? strlen($s) : 0;
    if (!$len) {
        return $res;
    }
    for($i = 0 ; $i < $len ; $i++)
    {
        $num = $s[$i];;
        //获取重复字符
        if(isset($tmp[$num]) && $tmp[$num] > $left)
        {
            $left = $tmp[$num];
        }
        $tmp[$num] = $i;
        $res = max($res , $i - $left);
    }
    return $res;
}
print_r(lengthOfLongestSubstring('abbas2eq'));