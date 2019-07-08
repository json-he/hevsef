<?php
/*
 * 时间段按月截取
 */
function Date_segmentation($start_date, $end_date)
{
    $start_date = strtotime($start_date);
    $end_date = strtotime($end_date);

    $res = [];

    for(;$start_date<=$end_date;$start_date=strtotime("+1 month",$start_date)){

        $m = date('Y-m',$start_date);
        $ms = date('Y-m-01 00:00:00',$start_date);
        $md = date('Y-m-t 23:59:59',strtotime($m));
        $isfull = 1;
        if(strtotime($md)>time()){
            $isfull = 0;
            $md = date('Y-m-d H:i:s',time());
        }
        $res[] = ['m'=>$m,'ms'=>$ms,'md'=>$md,'isfull'=>$isfull];
    }

    return $res;
}

$a =  Date_segmentation('2008-02-04','2019-7-04');

print_r($a);



