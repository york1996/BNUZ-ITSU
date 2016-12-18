<?php if (!defined('THINK_PATH')) exit();?><!--如果你看到这句话,恭喜你获得了我们学生会技术部加入资格,请联系QQ:752797570,验证信息填写:2016jsb,跟我们学习更多的东西吧~-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>北京师范大学珠海分校信息技术学院学生会</title>
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
<div class="container-fluid"><!--fluid扩充至全屏-->
    <div class="row">
        <div class="jumbotron">
            <div class="container">
                <h1 style="display: inline">信息技术学院学生会<small>/ITSU</small></h1>
            </div>

        </div>
    </div>
    <!--<div class="row">&lt;!&ndash;轮播图行&ndash;&gt;-->
        <!--<div id="inSlider" class="carousel slide carousel-fade" data-ride="carousel" style="margin-top: 0;">-->
            <!--<ol class="carousel-indicators">-->
                <!--<li data-target="#inSlider" data-slide-to="0" class="active"></li>-->
                <!--<li data-target="#inSlider" data-slide-to="1"></li>-->
            <!--</ol>-->

            <!--<div class="carousel-inner" role="listbox">-->
                <!--<div class="item active">-->
                    <!--&lt;!&ndash; Set background for slide in css &ndash;&gt;-->
                    <!--<div class="header-back one"></div>-->
                <!--</div>-->

                <!--<div class="item">-->
                    <!--<div class="container">-->
                        <!--<div class="carousel-caption blank">-->
                            <!--<h1>Testing Subject 1 <br> 111111111111111111111<br>111111111111111111111</h1>-->
                            <!--<p></p>-->
                            <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">了解更多</a></p>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; Set background for slide in css &ndash;&gt;-->
                    <!--<div class="header-back two"></div>-->
                <!--</div>-->
                <!--<a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">-->
                    <!--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>-->
                    <!--<span class="sr-only">Previous</span>-->
                <!--</a>-->
                <!--<a class="right carousel-control" href="#inSlider" role="button" data-slide="next">-->
                    <!--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>-->
                    <!--<span class="sr-only">Next</span>-->
                <!--</a>-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->

    <!--标准栅格系统,列比例为3-6-3-->
    <div class="container">
        <div class="row">
            <!--总行-->
            <div class="col-md-3">
                <!--第一列-->

                    <h3><i class="glyphicon glyphicon-chevron-right"></i> 院会介绍</h3>
                    <div class="dividing-line"></div>
                    <p> 北京师范大学珠海分校信息技术学院学生会是在信息技术学院党总支的领导下，唯一代表信息技术学院全体学生共同利益的自治组织。全心全意为学生服务；倡导和组织自我管理、自我教育；发挥作为校、院联系学生的桥梁和纽带作用；在维护全院学生整体利益的同时，表达和维护同学的具体利益。</p>

                    <h3><i class="glyphicon glyphicon-chevron-right"></i> 学生组织</h3>
                    <div class="dividing-line"></div>
                    <div align="center">
                        <a href="#" class="button button-primary button-block">学院党支部</a><br>
                        <a href="#" class="button button-primary button-block">学院团委</a><br>
                        <a href="#" class="button button-primary button-block">学院学生社团</a><br>
                        <a href="#" class="button button-primary button-block">学院球队</a><br>
                    </div>

            </div>

            <div class="col-md-6">
                <!--第二列-->

                <h3><i class="glyphicon glyphicon-chevron-right"></i> 新闻动态</h3>
                <div class="dividing-line"></div>
                <ul class="list-unstyled">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/xsh/Home/Article/read/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a><span style="display: block;text-align: right;"><?php echo (date('Y-m-d',$vo["create_time"])); ?></span></li>
                        <div class="artlist"></div><?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
                <div align="right">
                    <a href="/xsh/Home/Article/classify">>查看更多</a>
                </div>
            </div>

            <div class="col-md-3">
                <!--第三列-->

                    <h3><i class="glyphicon glyphicon-chevron-right"></i> 近期活动</h3>
                    <div class="dividing-line"></div>
                    <ul class="list-unstyled">
                        <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php echo ($vo["title"]); ?><span style="display: block;text-align: right;">截止时间:<?php echo (date('Y-m-d',$vo["time"])); ?></span></li>
                            <div class="artlist"></div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                    <div align="right">
                        <a href="/xsh/Home/Activity/Index">>查看详情</a>
                    </div>

                    <h3><i class="glyphicon glyphicon-chevron-right"></i> 友情链接</h3>
                    <div class="dividing-line"></div>

                    <div align="center">
                        <a href="<?php echo U('Check/index');?>" class="button button-primary button-block">科技学时/服务时长</a><br>
                        <a href="http://tms.bnuz.edu.cn/" target="_blank" class="button button-primary button-block">教学管理系统</a><br>
                        <a href="http://es.bnuz.edu.cn/" target="_blank" class="button button-primary button-block">教务系统</a><br>
                        <a href="http://eol.bnuz.edu.cn/" target="_blank" class="button button-primary button-block">网络教学平台</a>
                    </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <p>北京师范大学珠海分校信息技术学院学生会</p>
        <p>北京师范大学珠海分校信息技术学院学生会 版权所有 | <a href="http://www.miibeian.gov.cn/">粤ICP备05026012号</a></p>
        <p>开发团队:北师大珠海分校信息技术学院学生会技术部</p>
    </div>
</footer>