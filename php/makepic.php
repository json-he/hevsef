<?php
/**
 * 渐变函数
 * @param $start
 * @param $end
 * @param int $entries
 * @return array
 */
function create_pallette($start, $end, $entries = 10)
{
    $inc = ($start - $end) / ($entries - 1);
    $out = array(0 => $start);
    for ($x = 1; $x < $entries; $x++) {
        $m  = $start + $inc * $x;
        $out [$x] = $m<0?0:$m;
    }
    return $out;
}


function createImg($img,$title,$desc,$width,$height) {
    header('Content-type: image/png');
    $im = imagecreatetruecolor($width, $height); //创建画布

    $downimg = uniqid();
    try{
        file_put_contents("./{$downimg}.png",file_get_contents($img));
    }catch (\Exception $e){
        return $e->getMessage();
    }
    $img_info = getimagesize("./{$downimg}.png");
    if($img_info[0]!=1280){
        throw New \Exception("原图的宽不为1280");
    }
    if($img_info[1]!=720){
        throw New \Exception("原图的高不为720");
    }
    //获取平均色值
    $i=imagecreatefromjpeg($img);
    $rTotal = 0;
    $gTotal = 0;
    $bTotal = 0;
    $total = 0;
    for($x=0;$x<imagesx($i);$x++){
        for($y=0;$y<imagesy($i);$y++){
            $rgb=imagecolorat($i,$x,$y);
            $r=($rgb>>16)&0xff;
            $g=($rgb>>4)&0xff;
            $b=$rgb&0xff;
            $rTotal+=$r;
            $gTotal+=$g;
            $bTotal+=$b;
            $total++;
        }
    }
    $rAverage=round($rTotal/$total);
    $gAverage=round($gTotal/$total);
    $bAverage=round($bTotal/$total);

    $rAverage = 244;
    $gAverage = 238;
    $bAverage = 238;
    //end
//    print_r($rAverage);
//    print_r($gAverage);
//    print_r($bAverage);exit;
    //生成渐变
    //渐变柔和度
    $gentle = 20;
    $r = create_pallette($rAverage, $rAverage + $gentle, $width);
    $g = create_pallette($gAverage, $gAverage + $gentle, $width);
    $b = create_pallette($bAverage, $bAverage + $gentle, $width);
    for ($i = 0; $i <$width; $i++) {
        $color = imagecolorallocate($im, $r[$i], $g[$i], $b[$i]);
        imagefilledrectangle($im, $i, 0, $i,$height-1 , $color);
    }
//end 生成渐变
////设置字体

    $titleColor = imagecolorallocate($im, $rAverage, $gAverage, $bAverage);
    $descBgColor = imagecolorallocate($im, 108, 130, 158);
    $descColor = imagecolorallocate($im, 255, 255, 255);
    $titleFont = '/Users/bayescom/Desktop/testpic/SourceHanSansCN-Heavy.otf';
    $descFont = '/Users/bayescom/Desktop/testpic/SourceHanSans-Medium.otf';

//    imagefilledrectangle($im, 28, 0, $i,$height-1 , $color);
    imagettftext($im, 28, 0, 100, 50, $titleColor, $titleFont, $title);
    imagettftext($im, 28, 0, 100, 100, $descColor, $descFont, $desc);
    imagepng($im,"/Users/bayescom/Desktop/testpic/3.png");
    imagedestroy($im);
    unlink("./{$downimg}.png");
}
createImg('https://canvas.gdt.qq.com/canvas/1?viewid=%12%08%08%D6%EF%9F%B1%1F%20%01%18%8F%D1%19&ckn=8424781782',"超级母婴品牌日","金领冠钜惠来袭低至3折","686","172");
?>
