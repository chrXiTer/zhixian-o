<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>知县 - 主页</title>
        <link rel="stylesheet" href="/Public/bootstrap335/css/bootstrap.css" />
        <link rel="stylesheet" href="/Public/css/site.css" />
    </head>
    <body>
        <div class="container body-content"> 
<div id="chrx-menu" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="goBack" type="button" style="display:none" onclick="history.go(-1);return false" >⬅️</a>
            <a class="navbar-brand" href="/Main/Main">知县</a>
            <a class="navbar-brand" href="/Main/Entertainment">休闲娱乐</a>
            <a class="navbar-brand" href="/Main/News">新鲜分享</a>
        </div>
        
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a class="navbar-brand" style="font-size:12px" href="/Home/Main"><?php echo C('COUNTY_NAME')?></a></li>
                <li><a class="navbar-brand" style="font-size:12px" href="/Home/Main/Navigation">本县导航</a></li>
                <li><a class="navbar-brand" style="font-size:12px" href="/Home/News">本地分享</a></li>
                <li><a class="navbar-brand" style="font-size:12px" href="/Home/Baike">本地百科</a></li>
            </ul>
            
        </div>
    </div>
</div>

<script>
function isWeiXin(){
    var ua = window.navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i) == 'micromessenger'){
        return true;
    }else{
        return false;
    }
}
var goBackE = document.getElementById("goBack");
if(isWeiXin())
</script> 
<p>
    <a id="scanQRcodeLink" style＝"margin:3px 9px 3px 9px;" href="#">
        <span class="label label-success">扫描二维码:</span>
    </a>
</p>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
var callback = function(configInfoObj){
	/*
	alert("timestamp:" + configInfoObj.timestamp);
	alert("nonceStr:" + configInfoObj.nonceStr);
	alert("signature:" + configInfoObj.signature);
	*/
	wx.config({
		debug: true, /* 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。*/
		appId: 'wx52026669f7ddcad4', /* 必填，公众号的唯一标识 */
		timestamp: configInfoObj.timestamp, /* 必填，生成签名的时间戳 */
		nonceStr: configInfoObj.nonceStr, /*  必填，生成签名的随机串 */
		signature: configInfoObj.signature,/*  必填，签名，见附录1 */
		jsApiList: ["scanQRCode"] /* 必填，需要使用的JS接口列表，所有JS接口列表见附录2 */
	});
	wx.ready(function(){
		/* config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。*/
		var scanQRcodeLinkE = document.getElementById("scanQRcodeLink");
		scanQRcodeLinkE.onclick = function(){
			wx.scanQRCode({
				needResult: 1, 
				scanType: ["qrCode","barCode"], 
				success: function (res) {
					var result = res.resultStr; 
					scanQRcodeLinkE.outerHTML = result;
				}
			});
		}
	});		
};
	
var currentUrl = document.URL;
currentUrl = currentUrl.replace(/#.*/, "")
var url = "http://h5jc.sinaapp.com/getConfigSignatureInfo?url=" + currentUrl;
var script = document.createElement('script');
script.setAttribute('src', url);
document.getElementsByTagName('head')[0].appendChild(script);
</script>

<div class="panel panel-success" style="margin-top:10px">
	<div class="panel-heading">
		<h3 class="panel-title">办事指南</h3>
	</div>
	<p class="panel-body">
    	<?php if(is_array($affair_hot)): foreach($affair_hot as $key=>$vo): ?><a style＝"margin:3px 9px 3px 9px;" href="/Home/Affair/DisplayAAffair/<?php echo ($vo["id"]); ?>">
			<span class="label label-success"><?php echo ($vo["name"]); ?></span>
		</a><?php endforeach; endif; ?>
		<a href="/Home/Affair"><span class="label label-info">更多事项>></span></a>
	</p>
</div>

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">
			服务大全
			<a style="float:right" href="/Home/Service/AddAService">发布服务</a>
			</h3>
	</div>
	<p class="panel-body">
		<?php if(is_array($services_hot)): foreach($services_hot as $key=>$vo): ?><a style＝"margin:3px 9px 3px 9px;" href="/Home/Service/DisplayAService/<?php echo ($vo["id"]); ?>">
				<span class="label label-success"><?php echo ($vo["name"]); ?></span>
			</a><?php endforeach; endif; ?>
		<a href="/Home/Service"><span class="label label-info">更多服务>></span></a>
	</p>
</div>

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">
			需求求助
			<a style="float:right" href="/Home/Need/AddANeed">发布需求</a>
		</h3>
	</div>
	<p class="panel-body">
		<?php if(is_array($needs_hot)): foreach($needs_hot as $key=>$vo): ?><a style＝"margin:3px 9px 3px 9px;" href="/Home/Need/DisplayANeed/<?php echo ($vo["id"]); ?>">
				<span class="label label-success"><?php echo ($vo["title"]); ?></span>
			</a><?php endforeach; endif; ?>
		<a href="/Home/Need"><span class="label label-info">更多需求求助>></span></a>
	</p>
</div>

<br/>
    </div><!--class="container body-content" -->
    <footer class="container body-content">
        <p>&copy; 2015 - 知县</p>
    </footer>

    <script src="/Public/jquery/jquery.js"></script>
    <script src="/Public/bootstrap335/js/bootstrap.js"></script>
</body>
</html>