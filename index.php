<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG', true);
define('CHRX_FILE_TRACE', true);

// 定义应用目录
define('APP_PATH','./Application/');



//从路径中提取当前县信息，并修改路径
/*
    echo "<br/><br/><br/><br/>*******";
    $pathUrl = $_SERVER['REQUEST_URI'];// $_SERVER['PATH_INFO'];
    echo "---------";
    $regex = "#\/([^\/]+)\/Home#";
    preg_match($regex, $pathUrl, $matches);
    if($matches[1]){
        define('COUNTY_SPELLING',$matches[1]);
    }else{
        define('COUNTY_SPELLING', 'hengyangxian');
    }

    ##define('COUNTY_SPELLING', 'hengyangxian');
    echo COUNTY_SPELLING;
    echo "********<br/><br/><br/><br/>";

    $_SERVER['PATH_INFO'] = str_replace($matches[0], "/Home", $pathUrl);
    $_SERVER['REQUEST_URI'] = str_replace($matches[0], "/Home", $pathUrl);
    $_SERVER['QUERY_STRING'] = str_replace($matches[0], "/Home", $_SERVER['QUERY_STRING']);
    $_GET['s'] = str_replace($matches[0], "/Home", $_GET['s']);

    #echo SAE_MYSQL_HOST_M.'###'.SAE_MYSQL_HOST_S.'###'.SAE_MYSQL_DB.'###'.SAE_MYSQL_USER.'###'.SAE_MYSQL_PASS.'###'.SAE_MYSQL_PORT;
    print_r($_SERVER['PATH_INFO']);
    print_r($_SERVER);
    echo "-----<br>";
    print_r($_GET);
    #exit;
*/


// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单
?>