<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo ($vo["title"]); ?> - 北京师范大学珠海分校信息技术学院学生会</title>
    <link rel="stylesheet" href="/xsh/Public/css/bootstrap.css">
    <link rel="stylesheet" href="/xsh/Public/css/footer.css">
    <link rel="stylesheet" href="/xsh/Public/css/itsu.css">
    <link rel="stylesheet" href="/xsh/Public/css/dropdownmenu.css">
    <link rel="stylesheet" href="/xsh/Public/css/buttons.css">
    <script src="/xsh/Public/js/jquery.js"></script>
    <script src="/xsh/Public/js/bootstrap.min.js"></script>
    <script src="/xsh/Public/js/indexState.js"></script>
</head>
<body>

<nav class="navbar navbar-default" style="margin-bottom: 0;">
    <div class="container">

        <!--Brand标记区域始-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo U('Index/Index');?>">ITSU</a>
        </div>
        <!--Brand标记区域终-->

        <!--普通按钮区域始-->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo U('Index/Index');?>">主页 <span class="sr-only">(current)</span></a></li>

                <!--下拉菜单-->
                <li class="dropdown" id="section">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">栏目 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo U('Article/classify');?>">新闻动态</a></li>
                        <li><a href="#news">专题活动</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-submenu"><a tabindex="-1" href="#">学生组织</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="#">信院团委</a></li>
                                <li><a tabindex="-1" href="#">信院学生党支部</a></li>
                                <li><a tabindex="-1" href="#">信院学生社团</a></li>
                            </ul>
                        </li>
                        <li id="intro"><a href="#intro">院会概况</a></li>
                    </ul>
                </li>
                <!--/下拉菜单-->

                <li id="vote"><a href="#vote">投票</a></li>
                <li id="apply"><a href="#apply">报名</a></li>
            </ul>
            <!--普通按钮区域终-->

            <!--右侧下拉菜单终-->
            <?php if($_SESSION['name']): ?><ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ($_SESSION['name']); ?>  <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo U('Index/logout');?>">注销</a></li>
                </ul>
                </li>
                    </ul>
                <?php else: ?>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="<?php echo U('Index/login');?>">登录</a>
                    </li>
                </ul><?php endif; ?>
        </div>
    </div>
</nav>
<!--导航栏终-->
<div class="am-container">
    <a href="<?php echo U('Index/Index');?>">首页</a> / <a href="/xsh/index.php/Home/Vote/" class="am-text-primary">投票</a> / <small><?php echo ($vo["title"]); ?></small>
    <hr>
    <article class="am-article">
        <div class="am-article-hd">
            <h1 class="am-article-title"><?php echo ($vo["title"]); ?></h1>
            <p class="am-article-meta"><?php echo ($vo["time"]); ?></p>
        </div>

        <div class="am-article-bd">
            <?php echo (stripslashes(htmlspecialchars_decode($vo["content"]))); ?>
        </div>
        <div>
            <hr>
            <h3>投票选项:</h3>
            <?php if($vo["state"] == 1): ?><form class="am-form" method="post" action="/xsh/index.php/Home/Vote/voting">
                    <?php if(is_array($vote)): $i = 0; $__LIST__ = $vote;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><div class="am-radio">
                            <label>
                                <input type="radio" name="vote" value="<?php echo ($voo["selectname"]); ?>">
                                <strong><?php echo ($voo["selectname"]); ?></strong> <small>得票数:<?php echo ($voo["countvotes"]); ?></small>
                            </label>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
                    <button class="am-btn-primary am-btn-sm" type="post">提交</button>
                </form>
                <?php else: ?>
            <form class="am-form" method="post" action="/xsh/index.php/Home/Vote/voting">
                <?php if(is_array($vote)): $i = 0; $__LIST__ = $vote;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><div class="am-radio">
                        <label>
                            <input type="radio" name="vote" value="<?php echo ($voo["selectname"]); ?>" disabled>
                            <strong><?php echo ($voo["selectname"]); ?></strong> <small>得票数:<?php echo ($voo["countvotes"]); ?></small>
                        </label>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
                <button class="am-btn-default am-btn-sm" type="post" disabled>停止投票</button>
            </form><?php endif; ?>
        </div>
    </article>
</div>
<br>
<footer class="footer">
    <div class="container">
        <p>北京师范大学珠海分校信息技术学院学生会</p>
        <p>北京师范大学珠海分校信息技术学院学生会 版权所有 | <a href="http://www.miibeian.gov.cn/">粤ICP备05026012号</a></p>
        <p>开发团队:北师大珠海分校信息技术学院学生会技术部</p>
    </div>
</footer>