<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="stylesheet" href="./css/bootstrap.min.css" />
	<link rel="stylesheet" href="./css/index.css" />
	<script type="text/javascript" src="./js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./js/jquery.singlePageNav.min.js"></script>
	<script type="text/javascript" src="./js/index.js"></script>
	<title>商城</title>
    <style type="text/css">
<!--
.STYLE1 {font-size: x-large}
-->
    </style>
</head>
<body>
		<!-- 导航栏 -->
		<nav id="header" class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aris-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">商城首页</a>
					<a href="order.php" class="navbar-brand">个人中心</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse navbar-right">
					<ul class="nav navbar-nav">
						<li class="active nav-lis"><a href="#carousel">首页</a></li>
						<li class="nav-lis"><a href="#hot">推荐</a></li>
						<li class="nav-lis"><a href="#address">主食</a></li>
						<li class="nav-lis"><a href="#footer">说明</a></li>
						<li class="nav-lis"><a href="#footer">关于我们</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- 导航栏结束 -->

		<!-- 轮播图 -->
		<section class="carousel slide" id="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel" data-slide-to="0" class="active"></li>
				<li data-target="#carousel" data-slide-to="1"></li>
				<li data-target="#carousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item active">
					<img src="./img/index.jpg" alt="" class="img-responsive" />
					<div class="carousel-caption">
						<h1>甜品</h1>
					</div>
			  </div>
				<div class="item">
					<img src="./img/index2.jpg" alt="" class="img-responsive" />
					<div class="carousel-caption">
						<h1>主食</h1>
					</div>
				</div>
				<div class="item">
					<img src="./img/index3.jpg" alt="" class="img-responsive" />
					<div class="carousel-caption">
						<h1>烧烤</h1>
					</div>
				</div>
			</div>
		</section>


		<!-- LIST -->
		<section id="productList">
				<dl class="col-sm-1">  </dl>
				<dl class="col-sm-1">
					<dt>
					<img src="./img/list1.jpg" alt="" class="img-responsive" /></dt>
					<dd>美食</dd>		
				</dl>
				
				<dl class="col-sm-1">  </dl>	
							
				</dl>
				<dl class="col-sm-1">
					<dt>
					<img src="./img/list2.jpg" alt="" class="img-responsive"/></dt>
					<dd>快餐</dd>		
				</dl>
				
				<dl class="col-sm-1">  </dl>
				
				
				<div class="col-sm-2">
				<img src="./img/list.jpg" alt="" class="img-responsive"/></div>
				
				<dl class="col-sm-1">  </dl>
				
				
				<dl class="col-sm-1">
					<dt>
					<img src="./img/list4.jpg" alt="" class="img-responsive"/></dt>
					<dd>糕点</dd>	
				</dl>
				
				<dl class="col-sm-1">  </dl>
				
				<dl class="col-sm-1">
					<dt>
					<img src="./img/list3.jpg" alt="" class="img-responsive"/></dt>
					<dd>小食</dd>		
				</dl>
				
			</section>
		<!-- LIST结束 -->

		<!-- HOT -->
		<section id="hot">
			<div class="container">
				<div class="col-xs-12"><h1>隆重推荐</h1></div>
				<hr />
			  <div class="col-sm-3 recommend">
					<h2>RECOMMEND</h2>
				  <p class="STYLE1"><a href="Orderxiaochuan.html">小 川 料 理</a> </p>
				</div>
				<div class="col-sm-3 hotImg">
					<dl>
						<dt><img src="./img/xiaochuan1.jpg" alt="" /></dt>
						<dd>沙拉</dd>
						<dd>以圆白菜、番茄、黄瓜等作为主要食材制作而成的美食。蔬菜沙拉是一种非常营养健康的饮食方法。</dd>
					</dl>
				</div>
				<div class="col-sm-3 hotImg">
					<dl>
						<dt><img src="./img/xiaochuan2.jpg" alt="" /></dt>
						<dd>拉面</dd>
						<dd>中国北方城乡独具地方风味的一种传统面食</dd>
					</dl>
				</div>
				<div class="col-sm-3 hotImg">
					<dl>
						<dt><img src="./img/xiaochuan3.jpg" alt="" /></dt>
						<dd>牛舌</dd>
						<dd>牛舌纯粹是视觉暗黑者,即便不用大料辟腥,白水一煮,沾点酱油,也有极好的嚼劲和丰盈的肉汁,吃一块,秒入坑。</dd>
					</dl>
				</div>
			</div>
		</section>
		<!-- HOT结束 -->

		<!-- 2 -->
		<section id="address">
			<div class="container">
				<div class="page-header"><h1>亢龙太子酒轩</h1></div>
				<div class="address-body">
				  <div class="col-md-3 col-sm-6">
						<dl>
							<dt><a href="Orderkanglong.html"><img src="./img/kanglong.jpg" alt=""/></a></dt>
							<dd>亢龙太子酒轩</dd>
							<dd>“高档酒家，你的不二选择”</dd>
						</dl>
					  <a href="javascript:"></a>					</div>
					<div class="col-md-3 col-sm-6">
						<dl>
							<dt><img src="./img/kanglong2.jpg" alt="" class="img-responsive" /></dt>
							<dd>松鼠桂鱼</dd>
							<dd>“色泽鲜艳、质地柔嫩、肥而不腻”</dd>
						</dl>
						<a href="javascript:"></a>					</div>
					<div class="col-md-3 col-sm-6">
						<dl>
							<dt><img src="./img/kanglong3.jpg" alt="" class="img-responsive" /></dt>
							<dd>烤鸭</dd>
							<dd>“九雁十八鸭，最佳不过清头与八塔”</dd>
						</dl>
						<a href="javascript:"></a>					</div>
					<div class="col-md-3 col-sm-6 show">
						<dl>
							<dt><img src="./img/kanglong1.jpg" alt="" class="img-responsive"/></dt>
							<dd>蒜香排骨</dd>
							<dd>“省级非物质文化遗产”</dd>
						</dl>
						<a href="javascript:"></a>					</div>
				</div>
			</div>
		</section>
		<!-- 荆州美食结束 -->


		<!-- ABOUT -->
		<section id="about">
			<div class="col-sm-6 aboutImg"><img src="./img/our.jpg" alt="" class="img-responsive" /></div>
			<div class="col-sm-6 col-xs-12 aboutText">
				<h1>关于我们</h1>
				<hr>
				<p>
				不知道该写啥，就随便插一张图片
				</p>
			</div>
		</section>
		<!-- ABOUT结束 -->

		<!-- FOOTER -->
		<footer id="footer">
			<div class="container">
				<ul class="footerList list-unstyled col-sm-3">
					
				</ul>
				<ul class="footerList list-unstyled col-sm-3">
					<li><a href="javascript:">相关单位</a></li>
					<li><a href="javascript:">华中农业大学</a></li>
					<li><a href="javascript:">公共管理学院</a></li>					
				</ul>
				<ul class="footerList list-unstyled col-sm-3">
					<li><a href="javascript:">联系方式</a></li>
					<li><a href="javascript:">QQ  707067824</a></li>
					<li><a href="javascript:">QQ  481910488</a></li>
				</ul>
				<ul class="footerList list-unstyled col-sm-3">
					
				</ul>
				<div class="footerText col-sm-12">
					<p>王晗铭</p>
					<p>万宇轩</p>
					<p>刘超</p>
				</div>
			</div>
		</footer>
		<!-- FOOTER结束 -->
</body>
</html>
