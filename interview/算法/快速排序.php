<?php

// 递归4步法
// 1.判断是否合法
// 2.判断出口
// 3.减小规模
// 4.合并返回


$a = array(2,13,42,34,56,23,67,365,87665,54,68,3);

function quick_sort($a)
{
    // 判断是否需要运行，因下面已拿出一个中间值，这里<=1
    if (count($a) <= 1) {
        return $a;
    }

    $middle = $a[0]; // 中间值

    $left = array(); // 接收小于中间值
    $right = array();// 接收大于中间值

    // 循环比较
    for ($i=1; $i < count($a); $i++) {

        if ($middle < $a[$i]) {

            // 大于中间值
            $right[] = $a[$i];
        } else {

            // 小于中间值
            $left[] = $a[$i];
        }
    }

    // 递归排序划分好的2边
    $left = quick_sort($left);
    $right = quick_sort($right);

    // 合并排序后的数据，别忘了合并中间值
    return array_merge($left, array($middle), $right);
}

print_r(quick_sort($a));



