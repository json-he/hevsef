<?php
header('Content-type: image/png');
$im = imagecreatetruecolor(400, 300); //创建画布
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 125, 106, 106);
$black = imagecolorallocate($im, 0, 0, 0);

//生成渐变
//202
//194
//62

function create_pallette($start, $end, $entries = 10)
{
    $inc = ($start - $end) / ($entries - 1);
    $out = array(0 => $start);
    for ($x = 1; $x < $entries; $x++) {
        $out [$x] = $start + $inc * $x;
    }
    return $out;
}

$r = create_pallette(252, 252 - 5, 400);
$g = create_pallette(246, 246 - 5, 400);
$b = create_pallette(234, 234 - 5, 400);


for ($i = 0; $i <400; $i++) {
    $color = imagecolorallocate($im, $r[$i], $g[$i], $b[$i]);
    imagefilledrectangle($im, $i, 0, $i,299 , $color);
}


//imagefilledrectangle($im, 0, 0, 399, 29, $white);    //输出一个白色填充的矩形背景    //左上角，右下角
//
////string iconv  ( string $in_charset  , string $out_charset  , string $str  )
////将字符串 str 从 in_charset 转换编码到 out_charset。
//
//$text = iconv('gb2312','utf-8','我的');
$text  = '超级母婴品牌日';
//
////设置字体
$font = '/Users/bayescom/Desktop/testpic/SourceHanSansCN-Heavy.otf';
//$font = '/Users/bayescom/Desktop/testpic/SourceHanSans-Medium.otf';
//
imagettftext($im, 28, 0, 100, 100, $grey, $font, $text); //输出一个灰色字符串作为阴影
imagepng($im,"/Users/bayescom/Desktop/testpic/3.png");
imagedestroy($im);



?>
