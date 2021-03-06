<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>后台管理系统  -  让管理变得更轻松 ！</title>
	<link href="/Public/Admin/images/favicon.ico" type="image/x-icon" rel="shortcut icon">
	<!-- Loading Bootstrap -->
	<link href="/Public/Admin/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/default_color.css" media="all">
	<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/layer/layer.js"></script>
	<link href="/Public/Admin/css/flat-ui.css" rel="stylesheet">
	<script src="/Public/Admin/js/flat-ui.min.js"></script>
	<script src="/Public/Admin/js/application.js"></script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<a class="navbar-brand" style="width: 200px;text-align: center;" href="#">资产交易平台</a>
	</div>
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
			<!-- 主导航 --><!--修改过--> 
			<?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li
				<?php if(($menu["class"]) == "current"): ?>class="active"<?php endif; ?>
				> 
		       <?php if($menu["title"] != '扩展'): ?><a href="<?php echo (U($menu["url"])); ?>">
				<?php if(empty($menu["ico_name"])): ?><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<?php else: ?>
					<span class="glyphicon glyphicon-<?php echo ($menu["ico_name"]); ?>" aria-hidden="true"></span><?php endif; ?>
				<?php echo ($menu["title"]); ?> </a><?php endif; ?>
				
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo session('admin_username');?><b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li class="center">
						<a href="/" target="_blank">
							<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> 前台首页 </a>
					</li>
					<li class="center">
						<a href="javascript:void(0);" onclick="lockscreen()">
							<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> 锁屏休息 </a>
					</li>
					<li>
						<a href="<?php echo U('Tools/index');?>">
							<span class="glyphicon glyphicon-leaf" aria-hidden="true"></span> 清除缓存 </a>
					</li>
					<li>
						<a href="<?php echo U('User/setpwd');?>">
							<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> 修改密码 </a>
					</li>
					<li>
						<a href="<?php echo U('Login/loginout');?>">
							<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> 退出后台 </a>
					</li>
				</ul>
			</li>
		</ul>
	</div><!--/.nav-collapse -->
</div>
<!-- 边栏 -->
<div class="sidebar">
	<!-- 子导航 -->
	
		<div id="subnav" class="subnav" style="
    max-height: 94%;
    overflow-x: hidden;
    overflow-y: auto;
    ">
			<?php if(!empty($_extra_menu)): ?> <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
			<?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
				<?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
					<ul class="side-sub-menu">
						<?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
								<a class="item" href="<?php echo (U($menu["url"])); ?>">
									<?php if(empty($menu["ico_name"])): ?><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
										<?php else: ?>
										<span class="glyphicon glyphicon-<?php echo ($menu["ico_name"]); ?>" aria-hidden="true"></span><?php endif; ?>
									<?php echo ($menu["title"]); ?> </a>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul><?php endif; ?>
				<!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	
	<!-- /子导航 -->
</div>
<!-- /边栏 -->
<?php if(($versionUp) == "1"): ?><div id="main-contenta" class="movesay_up">
		<div id="top-alerta" class="fixed alert alert-success" style="    position: static!important; margin-bottom: 0px;    margin: 10px;  background-color: rgba(26, 188, 156, 0.19);    ">
			<button class="close fixed" style="margin-top: 2px; position: static!important; ">&times;</button>
			<div class="alert-contenta">有新版本 <a href="<?php echo U('Cloud/index');?>" class="dropdown-toggle" > 立即去升级 </a></div>
		</div>
	</div>

	<script type="text/javascript" charset="utf-8">
		/**顶部警告栏*/
		var top_alert = $('#top-alerta');
		top_alert.find('.close').on('click', function () {
			top_alert.removeClass('block').slideUp(200);
			// content.animate({paddingTop:'-=55'},200);
		});
	</script><?php endif; ?>


<script type="text/javascript" src="/Public/layer/laydate/laydate.js"></script>
<div id="main-content">
	<div id="top-alert" class="fixed alert alert-error" style="display: none;">
		<button class="close fixed" style="margin-top: 4px;">&times;</button>
		<div class="alert-content">警告内容</div>
	</div>
	<div id="main" class="main">
		<div class="main-title-h" style="font-size: 24px;">
			<span class="h1-title"><?php echo (htmlspecialchars($title)); ?></span>
			<?php if($suggest): ?>（<?php echo (htmlspecialchars($suggest)); ?>）<?php endif; ?>
			<?php if(isset($_GET['name'])): ?><i class="ca"></i>[<a href="<?php echo ($titleList['url']); ?>"> <?php echo (htmlspecialchars($titleList['title'])); ?></a> ]<?php endif; ?>
		</div>
		<div class="cf">
			<div class="fl">
				<?php if(isset($buttonList['add'])): ?><a class="btn add-btn btn-success" href="<?php echo ($buttonList['add']['url']); ?>"><?php echo ($buttonList['add']['title']); ?></a><?php endif; ?>
				<?php if(isset($buttonList['resume'])): ?><button class="btn ajax-post btn-info" url="<?php echo ($buttonList['resume']['url']); ?>" target-form="ids"><?php echo ($buttonList['resume']['title']); ?></button><?php endif; ?>
				<?php if(isset($buttonList['forbid'])): ?><button class="btn ajax-post btn-warning" url="<?php echo ($buttonList['forbid']['url']); ?>" target-form="ids"><?php echo ($buttonList['forbid']['title']); ?></button><?php endif; ?>
				<?php if(isset($buttonList['delete'])): ?><button class="btn ajax-post confirm delete-btn btn-danger" url="<?php echo ($buttonList['delete']['url']); ?>" target-form="ids"><?php echo ($buttonList['delete']['title']); ?></button><?php endif; ?>
			</div>
			<div class="search-form fr cf">
				<div class="sleft">
					<form action="<?php echo ((isset($searchPostUrl) && ($searchPostUrl !== ""))?($searchPostUrl):'/Admin/Shop/index.html'); ?>" name="formSearch" id="formSearch" method="get" name="form1">
						<?php if(is_array($searches)): $i = 0; $__LIST__ = $searches;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$search): $mod = ($i % 2 );++$i; if($search['type'] == 'select'): ?><select size="1" name="<?php echo ($search['name']); ?>" class="search-input form-control form-input-width" style="height: 32px; font-size: 14px; width: 110px; float: left; margin-right: 5px;" name="field">
									<?php if(is_array($search['attr'])): $i = 0; $__LIST__ = $search['attr'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$svo): $mod = ($i % 2 );++$i; $search_name=isset($_GET[$search['name']])?$_GET[$search['name']]:'' ?>
										<option value="<?php echo ($key); ?>"
										<?php if(($key) == $search_name): ?>selected<?php endif; ?>
										><?php echo ($svo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								</select>
								<?php elseif($search['type'] == 'time'): ?>
								<input type="text" class="search-input input-1x" name="<?php echo ($search["name"]); ?>" value="<?php echo I($search['name']);?>" placeholder="<?php echo ($search["attr"]); ?>" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"></td>
								<?php else: ?>
								<input type="text" name="<?php echo ($search["name"]); ?>" class="search-input" value="<?php echo I($search['name']);?>" placeholder="<?php echo ($search["attr"]); ?>" style="width: 150px">
								<a class="sch-btn" href="javascript:;" id="search"> <i class="btn-search"></i> </a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</form>
					<script>
						//搜索功能
						$(function () {
							$('#search').click(function () {
								$('#formSearch').submit();
							});
						});
						//回车搜索
						$(".search-input").keyup(function (e) {
							if (e.keyCode === 13) {
								$("#search").click();
								return false;
							}
						});
					</script>
				</div>
			</div>
		</div>
		<!-- 数据表格 -->
		<?php if($keyList): ?><div class="data-table table-striped">
				<table class="">
					<thead>
					<tr>
						<th class="row-selected row-selected"><input class="check-all" type="checkbox"/></th>
						<?php if(is_array($keyList)): $i = 0; $__LIST__ = $keyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;?><th><?php echo (htmlspecialchars($field["title"])); ?></th><?php endforeach; endif; else: echo "" ;endif; ?>
					</tr>
					</thead>
					<tbody>
					<?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$e): $mod = ($i % 2 );++$i;?><tr>
								<td><input class="ids" type="checkbox" name="id[]" value="<?php echo ($e['id']); ?>"/></td>
								<?php if(is_array($keyList)): $i = 0; $__LIST__ = $keyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;?><td class="text-ellipsis"><?php echo ($e[$field['name']]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						<?php else: ?>
						<td colspan="12" class="text-center">Oh! 暂时还没有内容!</td><?php endif; ?>
					</tbody>
				</table>
				<div class="page">
					<div><?php echo ($pagination); ?></div>
				</div>
			</div><?php endif; ?>
	</div>
</div>






<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript">
	+function(){
		//$("select").select2({dropdownCssClass: 'dropdown-inverse'});//下拉条样式
		layer.config({
			extend: 'extend/layer.ext.js'
		});

		var $window = $(window), $subnav = $("#subnav"), url;
		$window.resize(function(){
			//$("#main").css("min-height", $window.height() - 90);
		}).resize();

		/* 左边菜单高亮 */
		url = window.location.pathname + window.location.search;

		url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
		$subnav.find("a[href='" + url + "']").parent().addClass("current");

		/* 左边菜单显示收起 */
		$("#subnav").on("click", "h3", function(){
			var $this = $(this);
			$this.find(".icon").toggleClass("icon-fold");
			$this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
			prev("h3").find("i").addClass("icon-fold").end().end().hide();
		});

		$("#subnav h3 a").click(function(e){e.stopPropagation()});

		/* 头部管理员菜单 */
		$(".user-bar").mouseenter(function(){
			var userMenu = $(this).children(".user-menu ");
			userMenu.removeClass("hidden");
			clearTimeout(userMenu.data("timeout"));
		}).mouseleave(function(){
			var userMenu = $(this).children(".user-menu");
			userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
			userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
		});

		/* 表单获取焦点变色 */
		$("form").on("focus", "input", function(){
			$(this).addClass('focus');
		}).on("blur","input",function(){
			$(this).removeClass('focus');
		});
		$("form").on("focus", "textarea", function(){
			$(this).closest('label').addClass('focus');
		}).on("blur","textarea",function(){
			$(this).closest('label').removeClass('focus');
		});

		// 导航栏超出窗口高度后的模拟滚动条
		var sHeight = $(".sidebar").height();
		var subHeight  = $(".subnav").height();
		var diff = subHeight - sHeight; //250
		var sub = $(".subnav");
		if(diff > 0){
//			$(window).mousewheel(function(event, delta){
//				if(delta>0){
//					if(parseInt(sub.css('marginTop'))>-10){
//						sub.css('marginTop','0px');
//					}else{
//						sub.css('marginTop','+='+10);
//					}
//				}else{
//					if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
//						sub.css('marginTop','-'+(diff-10));
//					}else{
//						sub.css('marginTop','-='+10);
//					}
//				}
//			});
		}
	}();

	//导航高亮
	function highlight_subnav(url){
		$('.side-sub-menu').find('a[href="'+url+'"]').closest('li').addClass('current');
	}

	function lockscreen(){
		layer.prompt({
			title: '输入一个锁屏密码',
			formType: 1,
			btn: ['锁屏','取消'] //按钮
		}, function(pass){
			if(!pass){
				layer.msg('需要输入一个密码!');
			}else{
				$.post("<?php echo U('Login/lockScreen');?>",{pass:pass},function(data){
					layer.msg(data.info);
					layer.close();
					if(data.status){
						window.location.href = "<?php echo U('Login/lockScreen');?>";
					}
				},'json');
			}
		});
	}
</script>

</body>
</html>