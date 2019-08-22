<?php
/*
优化阿里云默认提供代码示例
php 5.3以上版本 支持 curl

*/
$host = "http://smsapi.api51.cn";//如需https请修改为 https://smsapi51.cn
$path = "/single_sms/";//path为 single_sms_get 时为GET请求
$method = "1";//post=1 get=0
$appcode = "购买后可获得appcode";

$url = $host . $path;

$data = array(
    'mobile'=>'1328888888',//接收手机号
    'params'=>'22,123',//模板变量，多个以英文逗号隔开
    'sign'=>'12',//登陆www.api51.cn申请成功的签名
    'tpl_id'=>'47331',//登陆www.api51.cn申请成功的模版ID，我们提供常用模板：http://help.api51.cn/425602
);
$data = http_build_query($data);

$result = api51_curl($url,$data,$method,$appcode);
echo $result;



function api51_curl($url,$data=false,$ispost=0,$appcode){
    $headers = array();
    //根据阿里云要求，定义Appcode
    array_push($headers, "Authorization:APPCODE " . $appcode);
    array_push($headers, "Content-Type".":"."application/x-www-form-urlencoded; charset=UTF-8");

    $httpInfo = array();

    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
    curl_setopt( $ch, CURLOPT_USERAGENT , 'api51.cn' );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 300 );
    curl_setopt( $ch, CURLOPT_TIMEOUT , 300);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_FAILONERROR, false);
    if (1 == strpos("$".$url, "https://"))
    {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    }
    if($ispost)
    {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt( $ch , CURLOPT_POST , true );
        curl_setopt( $ch , CURLOPT_POSTFIELDS , $data );
        curl_setopt( $ch , CURLOPT_URL , $url );
    }
    else
    {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        if($data){
            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$data );

        }else{
            curl_setopt( $ch , CURLOPT_URL , $url);
        }

    }
    $response = curl_exec( $ch );

    if ($response === FALSE) {
        // echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
    curl_close( $ch );
    return $response;

}
?>