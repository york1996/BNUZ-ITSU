<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>新增报名项目 - 北京师范大学珠海分校信息技术学院学生会</title>
    <!-- Bootstrap CSS 文件 -->
    <link rel="stylesheet" href="/Public/css/bootstrap.css">
    <!-- jQuery文件 -->
    <script src="/Public/js/jquery.js"></script>
    <!-- Bootstrap javaScript 文件 -->
    <script src="/Public/js/bootstrap.js"></script>
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/Public/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/Public/css/admin.css">
</head>
<body>

<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header">
    <div class="am-topbar-brand">
        <strong>BNUZ<span class="sr-only">(current)</span></strong> <small>ITSU</small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li><a href="<?php echo U('./Home/Index');?>" target="_blank">网站首页</a>
            <?php if($_SESSION['nickname']): ?><li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> <?php echo ($_SESSION['nickname']); ?> <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="<?php echo U('Public/logout');?>"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li><?php endif; ?>

        </ul>
    </div>
</header>
<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">
                <li><a href="<?php echo U('Index/Index');?>"><span class="am-icon-home"></span> 首页</a></li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 管理相关 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
                        <li><a href="<?php echo U('Article/add');?>" class="am-cf"><span class="am-icon-plus"></span> 添加文章</a></li>
                        <li><a href="<?php echo U('Article/Index');?>"><span class="am-icon-list"></span> 文章管理</a></li>
                        <li><a href="<?php echo U('Vote/Index');?>"><span class="am-icon-th"></span> 投票管理</a></li>
                        <li><a href="<?php echo U('User/addadmin');?>"><span class="am-icon-anchor"></span> 管理员管理</a></li>
                        <li><a href="<?php echo U('User/add');?>"><span class="am-icon-user"></span> 学生管理</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo U('Signup/Index');?>"><span class="am-icon-paste"></span> 报名信息管理</a> </li>
                <li><a href="<?php echo U('Tc/Index');?>"><span class="am-icon-pencil-square-o"></span> 科技学时录入</a></li>
                <li><a href="<?php echo U('Tcc/Index');?>"><span class="am-icon-paper-plane-o"></span> 服务时长录入</a></li>
                <li><a href="<?php echo U('Public/logout');?>"><span class="am-icon-sign-out"></span> 注销</a></li>
            </ul>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-bookmark"></span> 公告</p>
                    <p>。—— BNUZ ITSU</p>
                </div>
            </div>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-tag"></span> wiki</p>
                    <p>网站处于测试阶段,如有问题请联系技术部.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar end -->
    <div class="admin-content">
<div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">编辑报名</strong> / <small>编辑报名项目</small></div>
</div>

<div class="am-container">
    <form class="am-form" method="post" action="/index.php/Admin/Signup/edit" enctype="multipart/form-data">
        <div class="am-form-group">
            <label for="title">标题</label>
            <div>
                <input type="text" id="title" name="title" value="<?php echo ($vo["title"]); ?>" placeholder="标题">
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
        <div class="am-form-group">
            <label for="title">举办部门</label>
            <div>
                <input type="text" id="title" name="writer" value="<?php echo ($vo["writer"]); ?>" placeholder="部门">
            </div>
        </div>
        <div class="am-form-group">
            <label for="time">报名截止时间</label>
            <div>
                <input type="text" id="time" name="time" value="<?php echo (date('Y-m-d',$vo["time"])); ?>" placeholder="时间"  class="am-form-field" data-am-datepicker readonly required />
            </div>
        </div>
        <div class="am-form-group">
            <label for="container">说明</label>
            <div>
                <script id="container" name="content" type="text/plain">
                    <?php echo (stripslashes(htmlspecialchars_decode($vo["content"]))); ?>
                </script>
            </div>
        </div>

        <div class="am-form-group">
            <di>
                <button type="submit" class="am-btn-default">修改</button>
            </di>
        </div>
    </form>
</div>

<script type="text/javascript" src="/Public/js/jquery-2.0.2.js"></script>
<script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/ueditor/ueditor.all.js"></script>
<script>
    $(function(){
        var ue = UE.getEditor('container',{
                    serverUrl :'<?php echo U('Admin/Article/ueditor');?>'
    });
    })
</script>
</div>
</div>
<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
<footer>
<hr>
    <footer data-am-widget="footer"
            class="am-footer am-footer-default"
            data-am-footer="{  }">
        <div class="am-footer-miscs ">
            <p>由 技术部
                提供技术支持</p>
            <p>CopyRight©2016  BNUZ ITSU.</p>
            <p><a href="http://www.miibeian.gov.cn/" target="_blank">粤ICP备05026012号</a></p>
        </div>
    </footer>
<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/Public/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/Public/js/jquery.js"></script>
<!--<![endif]-->
<script src="/Public/js/amazeui.min.js"></script>
<script src="/Public/js/app.js"></script>


</body>
</html>