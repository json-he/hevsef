<?php
  $arr =array (
      0 =>
          array (
              'customer_priority' => 3,
              'priority' => '2',
              'channel_id' => '3',
              'real_priority' => 302,
              'channel_name' => '有道',
              'sum_cpm' => '20',
          ),
      1 =>
          array (
              'customer_priority' => 3,
              'priority' => '2',
              'channel_id' => '16',
              'real_priority' => 300,
              'channel_name' => '佳投',
              'sum_cpm' => 17.32,
          ),
      2 =>
          array (
              'customer_priority' => 3,
              'priority' => '2',
              'channel_id' => '49',
              'real_priority' => 302,
              'channel_name' => 'fancyDSP',
              'sum_cpm' => 14.13,
          ),
      3 =>
          array (
              'customer_priority' => 3,
              'priority' => '2',
              'channel_id' => '49',
              'real_priority' => 302,
              'channel_name' => 'fancyDSP',
              'sum_cpm' => 10.01,
          ),
      4 =>
          array (
              'customer_priority' => 3,
              'priority' => '2',
              'channel_id' => '49',
              'real_priority' => 302,
              'channel_name' => 'fancyDSP',
              'sum_cpm' => 10,
          ),
      5 =>
          array (
              'customer_priority' => 3,
              'priority' => '2',
              'channel_id' => '49',
              'real_priority' => 302,
              'channel_name' => 'fancyDSP',
              'sum_cpm' => 9.95,
          ),
//      6 =>
//          array (
//              'customer_priority' => 3,
//              'priority' => '2',
//              'channel_id' => '49',
//              'real_priority' => 302,
//              'channel_name' => 'fancyDSP',
//              'sum_cpm' => 0,
//          ),
  );
    function sort_index($x,$y) {
        if($x['customer_priority']<$y['customer_priority']){
            return -1;
        }else if($x['customer_priority']>$y['customer_priority']){
            return 1;
        }else{
            if(abs($x['sum_cpm']<$y['sum_cpm'])){
                return 1;
            }else if($x['sum_cpm']>$y['sum_cpm']){
                return -1;
            }else{
                return 0;
            }
        }
    };
usort($arr,'sort_index');
    $distance = 0.07;
    $rlpriority = 100;
    $i = 0;
    for($i;0<1;){
        if(!isset($arr[$i])||!isset($arr[$i+1])){
            break;
        }
        $d = abs(bcsub($arr[$i]['sum_cpm'],$arr[$i+1]['sum_cpm'],2));
        if($arr[$i]['sum_cpm']==$arr[$i+1]['sum_cpm']){
            $arr[$i]['rlpriority'] = $rlpriority;
            $arr[$i+1]['rlpriority'] = $rlpriority;
            $i = $i+1;
        }else if($d<=$distance){
            $arr[$i]['rlpriority'] = $rlpriority;
            $arr[$i+1]['rlpriority'] = $rlpriority;
            $i = $i+2;
        }else{
            if($i>0){
                if($arr[$i]['sum_cpm']!=$arr[$i-1]['sum_cpm']){
                    if($rlpriority  = $arr[$i-1]['rlpriority']){
                        $rlpriority = $rlpriority+1;
                    }
                }
            }
            $arr[$i]['rlpriority'] = $rlpriority;
            $i = $i+1;
        }

        if($i>0){
            if(!isset($arr[$i])||!isset($arr[$i+1])){
                break;
            }
            if($arr[$i]['sum_cpm']==$arr[$i-1]['sum_cpm']){
                $arr[$i]['rlpriority'] = $rlpriority;
                $i = $i+1;
                if($arr[$i]['sum_cpm']!=$arr[$i+1]['sum_cpm']){
                    $rlpriority  = $rlpriority+1;
                }
                continue;
            }
        }
        $rlpriority  = $rlpriority+1;
    }
    if(!isset($arr[count($arr)-1]['rlpriority'])){
        $r1 = isset($arr[$i-1])&&isset($arr[$i-2]);
        if($r1){
            $r2 = $arr[$i-1]['sum_cpm'] != $arr[$i-2]['sum_cpm'];
        }else{
            $r2 = false;
        }
        if($r1){
            $r3 = $arr[$i-1]['rlpriority'] == $arr[$i-2]['rlpriority'];
        }else{
            $r3 = false;
        }
        if($r1&&$r2&&$r3){
            $arr[$i]['rlpriority'] = $arr[$i-1]['rlpriority']+1;
        }else{
            $d2 = abs(($arr[$i]['sum_cpm']*100-$arr[$i-1]['sum_cpm']*100))/100;
            if($d2<=$distance){
                $arr[$i]['rlpriority'] = $arr[$i-1]['rlpriority'];
            }else{
                $arr[$i]['rlpriority'] = $arr[$i-1]['rlpriority']+1;
            }
        }
    }
print_r($arr);
