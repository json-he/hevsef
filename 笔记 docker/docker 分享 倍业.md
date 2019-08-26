
通信用的是 docker --link

lamp   apache 2.4 mysql 5.6 php 7.1

docker run -idt -p 7081:81 -p 7082:82 -p 7006:3306 -p 7008:8888  --name=lamp registry.cn-hangzhou.aliyuncs.com/bayes/lamp 



http://audit.novad.cn:8360/static#/login?token=V1RjTlltWXZlX1p5Nl9DVXRPXzk1cW0ySHNHdGxPc1dfMTU2MzUzMDY2MDo=

http://localhost:8360/static#/login?token=V1RjTlltWXZlX1p5Nl9DVXRPXzk1cW0ySHNHdGxPc1dfMTU2MzUzMDY2MDo=


docker commit -a "runoob.com" -m "my apache" a404c6c174a2 mymysql:v1



Bt-Panel-URL: http://180.167.201.70:8888/3bbd181d
username: kccp1dle
password: 49378fc7

root ssh 秘密 21415edfjson
www  ssh 密码 21415edf

adx
node 10.14.2
docker run -idt -p 7084:8360 --name=adx registry.cn-hangzhou.aliyuncs.com/bayes/adx

front-src    npm run build

front-src config prod.env2.js

pm2 startOrReload pm22.json

src config adapter2.js 

src config adapter.development2.js 


ligo 
7085


jenkins 密码 admin  admin 映射端 8081->8081
docker run -idt -p 8081:8081 --name=jenkins --link lamp:clamp --link ember:cember registry.cn-hangzhou.aliyuncs.com/bayes/jenkins




mysql  root   21415edf







nohup /usr/sbin/sshd &
nohup redis-server &


将主机./RS-MapReduce目录拷贝到容器30026605dcfe的/home/cloudera目录下。
docker cp RS-MapReduce 30026605dcfe:/home/cloudera
!!!     docker cp Jupiter lamp:/www/wwwroot








nginx 配置
server
{
    listen 81;
    server_name 127.0.0.1;
    index index.php index.html index.htm default.php default.htm default.html;
    rewrite ^/admin/(.*)$     /backend/web/$1 last;
    rewrite ^/dspapi/(.*)$     /backend/web/$1 last;
    root /www/wwwroot/Jupiter;
    
    #PHP-INFO-START  PHP引用配置，可以注释或修改
    include enable-php-71.conf;
    #PHP-INFO-END
    
    location / {
    	try_files $uri $uri/ /backend/web/index.php?$args;
    }
    
    
    #SSL-START SSL相关配置，请勿删除或修改下一行带注释的404规则
    #error_page 404/404.html;
    #SSL-END
    
    #ERROR-PAGE-START  错误页配置，可以注释、删除或修改
    #error_page 404 /404.html;
    #error_page 502 /502.html;
    #ERROR-PAGE-END
   
    
    #REWRITE-START URL重写规则引用,修改后将导致面板设置的伪静态规则失效
    include /www/server/panel/vhost/rewrite/127.0.0.1.conf;
    #REWRITE-END
    
    #禁止访问的文件或目录
    location ~ ^/(\.user.ini|\.htaccess|\.git|\.svn|\.project|LICENSE|README.md)
    {
        return 404;
    }
    
    #一键申请SSL证书验证目录相关设置
    location ~ \.well-known{
        allow all;
    }
    
    location ~ .*\.(gif|jpg|jpeg|png|bmp|swf)$
    {
        expires      30d;
        error_log off;
        access_log /dev/null;
    }
    
    location ~ .*\.(js|css)?$
    {
        expires      12h;
        error_log off;
        access_log /dev/null; 
    }
    access_log  /www/wwwlogs/127.0.0.1.log;
    error_log  /www/wwwlogs/127.0.0.1.error.log;
}


入口文件php
<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');
//print_r($_SERVER);exit;
if(strpos($_SERVER['REQUEST_URI'],'admin') !==false){
    $config = yii\helpers\ArrayHelper::merge(
        require(__DIR__ . '/../../common/config/main.php'),
        require(__DIR__ . '/../../common/config/params-local.php'),
        require(__DIR__ . '/../config/main.php'),
        require(__DIR__ . '/../config/params-local.php')
    );
}
if(strpos($_SERVER['REQUEST_URI'],'dspapi') !==false){
//echo 2;exit;
$config = yii\helpers\ArrayHelper::merge(
        require(__DIR__ . '/../../common/config/main.php'),
        require(__DIR__ . '/../../common/config/params-local.php'),
        require(__DIR__ . '/../../dspapi/config/main.php'),
        require(__DIR__ . '/../../dspapi/config/params-local.php')
    );
}
//echo 3;exit;
header("Access-Control-Allow-Headers: Authorization,Content-Type,If-Modified-Since");
header("Access-Control-Allow-Methods: GET,PUT,INDEX,POST,DELETE");
header("Allow: GET, POST, OPTIONS");
header("Authorization: GET, POST, OPTIONS");
header("Access-Control-Allow-Origin: *");

$application = new yii\web\Application($config);
$application->run();


