<?php
$s = "50岁以上老人专用老花镜！";
  function reMovePunctuation($word){
      $word = str_replace('！','',$word);
      $word = str_replace('。','',$word);
      $word = str_replace('，','',$word);
    return $word;
}
  function getword($str,$LineMaxLength){
    $str = str_replace('，','，^',$str);
    $str = str_replace('。','。^',$str);
    $str = str_replace('！','！^',$str);
    $str = str_replace('、','、^',$str);
    $str = str_replace('？','？^',$str);
    $str = str_replace('：','：^',$str);
    $str = str_replace('；','；^',$str);

    $str = str_replace(',',',^',$str);
    $str = str_replace('.','.^',$str);
    $str = str_replace('!','!^',$str);
    $str = str_replace('?','?^',$str);
    $str = str_replace(':',':^',$str);
    $str = str_replace(';',';^',$str);

    $arr = explode('^',$str);
    $sarr = [];
    foreach ($arr as $v){
        $key = mb_strlen($v, 'utf-8');
        $sarr[$key] = $v;
    }
    $k = array_keys($sarr);
    rsort($k);
    $res = $sarr[$k[0]];
    if(strpos($res,'，') !== false){
        $res = str_replace('，','',$res);
    }

    $outlen = mb_strlen($res, 'utf-8');
    if($outlen>$LineMaxLength){
        if(($outlen%$LineMaxLength)==1){  //刚好只有一个标点结尾
            $res = reMovePunctuation($res);
        }
    }
    return $res;
}
echo getword($s,12);