<?php if (!defined('THINK_PATH')) exit();?><!--如果你看到这句话,恭喜你获得了我们学生会技术部加入资格,请联系QQ:752797570,验证信息填写:2016jsb,跟我们学习更多的东西吧~-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo ($vo["title"]); ?> - 北京师范大学珠海分校信息技术学院学生会</title>
    <link rel="stylesheet" href="/Public/css/bootstrap.css">
    <link rel="stylesheet" href="/Public/css/footer.css">
    <link rel="stylesheet" href="/Public/css/itsu.css">
    <link rel="stylesheet" href="/Public/css/dropdownmenu.css">
    <link rel="stylesheet" href="/Public/css/buttons.css">
    <script src="/Public/js/jquery.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>
    <script src="/Public/js/indexState.js"></script>
</head>
<body>

<style type="text/css">

    body{
        background: #dbdbdb;
    }

    a{
        text-decoration: none !important;
    }
    .main{
        margin: 20px 0 0 0;
        position: relative;
        width: 100%;
        float: left;
    }

    .post{
        margin-bottom: 50px;
        width: 100%;
    }

    .post .head{
        background-color: #FFFFFF;
        margin-top: 20px;
        /*height: 5.9em;*/
        display: table;
        border-bottom: 1px solid #dbdbdb;
        width: 100% !important;
    }

    .post .head h1{
        font-size: 28px;
        line-height: 32px;
        padding: 20px 20px 10px 20px;
        margin-top: 0;
        font-weight: 300;
        border-left: 5px solid #06213f;
    }

    .post .head a{
        color: #292929;
        transition: all 0.2s ease-in 0s;
        -webkit-transition: all 0.2s ease-in 0s;
        -moz-transition: all 0.2s ease-in 0s;
    }

    .post .head h1:hover{
        color: #06213f;
    }

    .post .head p{
        display: block;
        line-height: 14px;
        color: #817c7c;
        float: right;
        margin-right: 15px;
    }

    .post .summary{
        padding: 24px 40px;
        background-color: #FFFFFF;
        border-bottom: 1px solid #dbdbdb;
    }

    .post .summary p{
        font-size: 16px;
        font-weight: 400;
        color: #292929;
        margin-bottom: 8px;
    }


    .post .summary .view-all{
        margin: 30px 0 -5px 5px;
    }

    .post .summary .view-all span{
        color: #06213f;
        font-size: 14px;
        padding: 7px;
        background-color: #f5f5f5;
        border-Radius: 5px;
    }

    .post .summary .view-all span:hover{
        background-color: #06213f;
        color: #FFFFFF;
    }

    .post .summary img{
        display:block;
        margin-left:auto;
        margin-right:auto;
        padding: 20px;
    }

    .post .foot{
        background-color: #FFFFFF;
        height: 3.5em;
        display: block;
        border-bottom: 1px solid #dbdbdb;
        padding: 1em 24px 1em 24px;
    }

    .post .foot span{
        color: #817c7c;
        margin: 0 2px 0 0;
    }

    .post .foot p{
        color: #292929;
        font-size: 16px;
    }

    .post .foot .tags{
        display: block;
        position: relative;
        height: 1em;
        color: #817c7c;
    }

    .post .foot .tags .link{
        position: relative;
        z-index: 2;
        float: left;
        margin-top: -1px;
        margin-left: 5px;
        color: #817c7c;
        transition: all 0.2s ease-in 0s;
        -webkit-transition: all 0.2s ease-in 0s;
        -moz-transition: all 0.2s ease-in 0s;
    }

    .post .foot .tags .icon{
        z-index: 1;
        float: left;
    }

    .post .foot .link:hover{
        color: #06213f;
    }


</style>
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
                        <!--<li><a href="#news">专题活动</a></li>-->
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

                <!--<li id="vote"><a href="<?php echo U('Vote/Index');?>">投票</a></li>-->
                <li id="apply"><a href="<?php echo U('Activity/Index');?>">活动报名</a></li>
            </ul>
            <!--普通按钮区域终-->

            <!--右侧下拉菜单终-->
            <?php if($_SESSION['name']): ?><ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ($_SESSION['name']); ?>  <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo U('User/index');?>">个人中心</a></li>
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

<div class="container">
    <div class="main">
        <article class="post">
            <header class="head">
                <h1><?php echo ($vo["title"]); ?></h1>
                <p><a href="/index.php/Home/Article/classify">返回新闻列表</a></p>
                <p class="author">作者 <?php echo ($vo["writer"]); ?></p>
                <p class="date">发表于  <?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?></p>
            </header>

            <div class="summary">
                <?php echo (stripslashes(htmlspecialchars_decode($vo["content"]))); ?>
            </div>

            <footer class="foot">
                <div class="tags">
                    <a href="/index.php/Home/Article/classify/id/<?php echo ($vo["classify"]); ?>" class="link" style="float: right !important;"><?php if($vo["classify"] == 1): ?>综合区<?php endif; ?>
                        <?php if($vo["classify"] == 2): ?>品牌活动<?php endif; ?>
                        <?php if($vo["classify"] == 3): ?>公示与通知<?php endif; ?>
                        <?php if($vo["classify"] == 4): ?>招募公告<?php endif; ?>
                        <?php if($vo["classify"] == 5): ?>更多<?php endif; ?></a>
                    <div class="icon" style="float: right !important;">
                        <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                    </div>

                </div>


            </footer>

        </article>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p>北京师范大学珠海分校信息技术学院学生会</p>
        <p>北京师范大学珠海分校信息技术学院学生会 版权所有 | <a href="http://www.miibeian.gov.cn/">粤ICP备05026012号</a></p>
        <p>开发团队:北师大珠海分校信息技术学院学生会技术部</p>
    </div>
</footer>