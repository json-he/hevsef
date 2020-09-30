<?php
// 1、利用二分法寻找数组中的最小元素
//
// 2、定义两个 指针left和right,指向数组的第一个元素和最后一个元素，定义一个中间指针mid
//
// 3、如果arr[left]小于arr[mid],那么把左边指针移动到mid处，mid从新计算 4.如果arr[left]大于arr[mid],那么把右边指针移动到mid处，mid从新计算，缩小范围
$arr=array(3,4,5,6,1,2);
$arr=array(7,8,10,11,15,4,6);
function minNumberInRotateArray($rotateArray){
    $left=0;//左边指针
    $right=count($rotateArray)-1;//右边指针
    //判断条件，left大于right就一直进行
    while($rotateArray[$left]>=$rotateArray[$right]){
        //left和right已经紧挨着了
        if(($right-$left)==1){
            $mid=$right;
            break;
        }
        //中间点
        $mid=ceil($left+($right-$left)/2);
        //left小于中间点
        if($rotateArray[$left]<$rotateArray[$mid]){
            //left移动到中间点
            $left=$mid;
        }else{
            //right移动到中间点
            $right=$mid;
        }
    }

    return $rotateArray[$mid];
}
$min=minNumberInRotateArray($arr);
var_dump($min);//int(1)
