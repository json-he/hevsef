<?php
  $arr = [
      ['mediaIndex'=>1,'cpm'=>22],
      ['mediaIndex'=>2,'cpm'=>21],
      ['mediaIndex'=>3,'cpm'=>21.2],
      ['mediaIndex'=>3,'cpm'=>21.3],
      ['mediaIndex'=>3,'cpm'=>21.3],
      ['mediaIndex'=>3,'cpm'=>21.4],
      ['mediaIndex'=>3,'cpm'=>21.4],
      ['mediaIndex'=>3,'cpm'=>21.5],
      ['mediaIndex'=>3,'cpm'=>21.5],
      ['mediaIndex'=>3,'cpm'=>21.5],
      ['mediaIndex'=>3,'cpm'=>21.6],
      ['mediaIndex'=>3,'cpm'=>21.7],
      ['mediaIndex'=>3,'cpm'=>'21.9'],
      ['mediaIndex'=>3,'cpm'=>22],
  ];
    function sort_index($x,$y) {
        if($x['mediaIndex']<$y['mediaIndex']){
            return -1;
        }else if($x['mediaIndex']>$y['mediaIndex']){
            return 1;
        }else{
            if(abs($x['cpm']<$y['cpm'])){
                return 1;
            }else if($x['cpm']>$y['cpm']){
                return -1;
            }else{
                return 0;
            }
        }
    };
usort($arr,'sort_index');
    $distance = 0.1;
    $priority = 101;
    $i = 0;
    for($i;0<1;){
        if(!isset($arr[$i])||!isset($arr[$i+1])){
            break;
        }
        $d = abs(bcsub($arr[$i]['cpm'],$arr[$i+1]['cpm'],2));
        if($d<=$distance){
            $arr[$i]['priority'] = $priority;
            $arr[$i+1]['priority'] = $priority;
            $i = $i+2;
        }else{
            $arr[$i]['priority'] = $priority;
            $i = $i+1;
        }

        if($i>0){
            if($arr[$i]['cpm']==$arr[$i-1]['cpm']){
                $arr[$i]['priority'] = $priority;
                $i = $i+1;
            }
        }
        $priority  = $priority+1;
    }
    if(!isset($arr[count($arr)-1]['priority'])){
        if($arr[$i]['cpm']==$arr[$i-1]['cpm']){
            $arr[$i]['priority'] = $arr[$i-1]['priority'];
        }else{
            $arr[$i]['priority'] = $priority;
        }
    }
print_r($arr);
