<?php
//在一个m行n列二维数组中，每一行都按照从左到右递增的顺序排序，每一列都按照从上到下递增的顺序排序。请完成一个函数，输入这样的一个二维数组和一个整数，判断数组中是否含有该整数。
//开始我想的是每一行使用二分查找，时间复杂度为O(n * logm)
//看到网上使用的定位法，时间复杂度为O(n + m)
function yangShiFind($arr,$str)
{
    if($arr == null)
        return false;

    $m = count($arr);
    $n = count($arr[0]);

	$row = 0;
	$col = $n-1;

     while($row < $m && $col >= 0)  //从右上角开始
     {
         if ($str < $arr[$row][$col])
         $col -= 1;
         else if ($str > $arr[$row][$col])
         $row += 1;
         else
             return true;
     }
     return false;
	}
$arr = [[1,2,3],[4,5,6]];
$s = 8;
var_dump(yangShiFind($arr,$s));