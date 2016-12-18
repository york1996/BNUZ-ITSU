<?php if (!defined('THINK_PATH')) exit();?><!--如果你看到这句话,恭喜你获得了我们学生会技术部加入资格,请联系QQ:752797570,验证信息填写:2016jsb,跟我们学习更多的东西吧~-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>首次登录</title>
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

<style>
    .header {
        text-align: center;
    }
    .header h1 {
        font-size: 200%;
        color: #333;
        margin-top: 30px;
    }
    .header p {
        font-size: 14px;
    }
</style>
<div class="header">
    <div class="am-g">
        <h1>首次登陆登记</h1>
        <p>信院学生会网站新用户首次登陆登记<br/>请使用教务系统的账号信息绑定以验证是否为本校学生<br />验证时会稍微比较慢,请勿刷新</p>
    </div>
    <hr />
</div>
<div class="am-g">
    <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
        <h3>首次登陆</h3>
        <hr>
        <form method="post" class="am-form" action="<?php echo U('Jw/bd','','');?>">
            <label for="name">真实姓名:</label>
            <input type="text" name="name" id="name">
            <br>
            <label for="major">专业:</label>
            <input type="text" name="major" id="major">
            <br>
            <label for="email">学号:</label>
            <input type="text" name="username" id="email">
            <br>
            <label for="password">教务系统密码:</label>
            <input type="password" name="password" id="password">
            <br>
            <br />
            <div class="am-cf">
                <input type="submit" name="" value="登 记" class="am-btn am-btn-primary am-btn-sm am-fl">
            </div>
        </form>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p>北京师范大学珠海分校信息技术学院学生会</p>
        <p>北京师范大学珠海分校信息技术学院学生会 版权所有 | <a href="http://www.miibeian.gov.cn/">粤ICP备05026012号</a></p>
        <p>开发团队:北师大珠海分校信息技术学院学生会技术部</p>
    </div>
</footer>