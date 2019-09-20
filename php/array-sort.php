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
              'priority' => '0',
              'channel_id' => '16',
              'real_priority' => 300,
              'channel_name' => '佳投',
              'sum_cpm' => 20,
          ),
      2 =>
          array (
              'customer_priority' => 3,
              'priority' => '2',
              'channel_id' => '49',
              'real_priority' => 302,
              'channel_name' => 'fancyDSP',
              'sum_cpm' => 20,
          ),
      3 =>
          array (
              'customer_priority' => 3,
              'priority' => '11',
              'channel_id' => '91',
              'real_priority' => 311,
              'channel_name' => '蓬景',
              'sum_cpm' => 14.03,
          ),
      4 =>
          array (
              'customer_priority' => 3,
              'priority' => '1',
              'channel_id' => '4',
              'real_priority' => 301,
              'channel_name' => '灵集',
              'sum_cpm' => 10.02,
          )
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
    $rlpriority = 200;
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
                continue;
            }
        }
        $rlpriority  = $rlpriority+1;
    }
    if(!isset($arr[count($arr)-1]['rlpriority'])){
    //            $d2 = abs(bcsub($arr[$i]['sum_cpm'],$arr[$i-1]['sum_cpm'],2));
        $d2 = abs(($arr[$i]['sum_cpm']*100-$arr[$i-1]['sum_cpm']*100))/100;
        if($d2<=$distance){
            $arr[$i]['rlpriority'] = $arr[$i-1]['rlpriority'];
        }else{
            $arr[$i]['rlpriority'] = $arr[$i-1]['rlpriority']+1;
        }
    }
print_r($arr);
