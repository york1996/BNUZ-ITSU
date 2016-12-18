<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>北京师范大学珠海分校信息技术学院学生会</title>
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
<header class="am-topbar  am-topbar-default">
    <h1 class="am-topbar-brand">
        <img src="/Public/img/logo.png">
    </h1>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav">
            <li><a href="<?php echo U('Index/Index');?>">首页</a></li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    栏目 <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li class="am-dropdown-header">文章栏目</li>
                    <li><a href="<?php echo U('Article/classify?id=1');?>">综合区</a></li>
                    <li><a href="<?php echo U('Article/classify?id=2');?>">品牌活动</a></li>
                    <li><a href="<?php echo U('Article/classify?id=3');?>">公示与通知</a></li>
                    <li><a href="<?php echo U('Article/classify?id=4');?>">招募公告</a></li>
                    <li><a href="<?php echo U('Article/classify?id=5');?>">更多...</a></li>
                </ul>
            </li>
            <li><a href="<?php echo U('Vote/index');?>">投票</a> </li>
        </ul>



        <div class="am-topbar-right">
            <ul class="am-nav am-nav-pills am-topbar-nav">

                <?php if($_SESSION['name']): ?><li class="am-dropdown" data-am-dropdown>
                        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                            <span class="am-icon-users"></span> <?php echo ($_SESSION['name']); ?> <span class="am-icon-caret-down"></span>
                        </a>
                        <ul class="am-dropdown-content">
                            <li><a href="<?php echo U('User/index');?>"><span class="am-icon-bars"></span> 个人中心</a></li>
                            <li><a href="<?php echo U('Index/logout');?>"><span class="am-icon-power-off"></span> 退出</a></li>
                        </ul>
                    </li>
                    <?php else: ?>
                    <li><a href="<?php echo U('Index/login');?>">登陆</a></li><?php endif; ?>

            </ul>
        </div>
    </div>
</header>
<style>
    .get {
        background: #1E5B94;
        color: #fff;
        text-align: center;
        padding: 100px 0;
        margin-top: 0px;

    }

    .get-title {
        font-size: 200%;
        border: 2px solid #fff;
        padding: 20px;
        display: inline-block;
    }

</style>
<div class="get">
    <div class="am-g">
        <div class="am-u-lg-12">
            <h1 class="get-title">北京师范大学珠海分校信息技术学院学生会</h1>

            <p>
                我们在这里,期待你的参与
            </p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-4">
            <div data-am-widget="list_news" class="am-list-news am-list-news-default" >
                <!--列表标题-->
                <div class="am-list-news-hd am-cf">
                    <!--带更多链接-->

                        <h2>综合区</h2>
                    <a href="<?php echo U('Article/classify?id=1');?>" class="">
                        <span class="am-list-news-more am-fr">更多 &raquo;</span>
                    </a>
                </div>

                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="am-g am-list-item-dated">
                                <a href="/index.php/Home/Article/read/id/<?php echo ($vo["id"]); ?>" class="am-list-item-hd "><?php echo ($vo["title"]); ?></a>
                                <span class="am-list-date"><?php echo (date('Y-m-d',$vo["create_time"])); ?></span>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div data-am-widget="list_news" class="am-list-news am-list-news-default" >
                <!--列表标题-->
                <div class="am-list-news-hd am-cf">
                <!--带更多链接-->

                        <h2>品牌活动</h2>
                    <a href="<?php echo U('Article/classify?id=2');?>" class="">
                        <span class="am-list-news-more am-fr">更多 &raquo;</span>
                    </a>
                </div>

                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="am-g am-list-item-dated">

                            <a href="/index.php/Home/Article/read/id/<?php echo ($vo["id"]); ?>" class="am-list-item-hd "><?php echo ($vo["title"]); ?></a>
                            <span class="am-list-date"><?php echo (date('Y-m-d',$vo["create_time"])); ?></span>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                     </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div data-am-widget="list_news" class="am-list-news am-list-news-default" >
                <!--列表标题-->
                <div class="am-list-news-hd am-cf">
                    <!--带更多链接-->

                    <h2>公示与通知</h2>
                    <a href="<?php echo U('Article/classify?id=3');?>" class="">
                        <span class="am-list-news-more am-fr">更多 &raquo;</span>
                    </a>
                </div>

                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <?php if(is_array($list3)): $i = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="am-g am-list-item-dated">
                                <a href="/index.php/Home/Article/read/id/<?php echo ($vo["id"]); ?>" class="am-list-item-hd "><?php echo ($vo["title"]); ?></a>
                                <span class="am-list-date"><?php echo (date('Y-m-d',$vo["create_time"])); ?></span>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div data-am-widget="list_news" class="am-list-news am-list-news-default" >
                <!--列表标题-->
                <div class="am-list-news-hd am-cf">
                    <!--带更多链接-->

                    <h2>招募公告</h2>
                    <a href="<?php echo U('Article/classify?id=4');?>" class="">
                        <span class="am-list-news-more am-fr">更多 &raquo;</span>
                    </a>
                </div>

                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <?php if(is_array($list4)): $i = 0; $__LIST__ = $list4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="am-g am-list-item-dated">
                                <a href="/index.php/Home/Article/read/id/<?php echo ($vo["id"]); ?>" class="am-list-item-hd "><?php echo ($vo["title"]); ?></a>
                                <span class="am-list-date"><?php echo (date('Y-m-d',$vo["create_time"])); ?></span>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
            <div data-am-widget="list_news" class="am-list-news am-list-news-default" >
                <!--列表标题-->
                <div class="am-list-news-hd am-cf">
                    <!--带更多链接-->

                    <h2>更多</h2>
                    <a href="<?php echo U('Article/classify?id=5');?>" class="">
                        <span class="am-list-news-more am-fr">更多 &raquo;</span>
                    </a>
                </div>

                <div class="am-list-news-bd">
                    <ul class="am-list">
                        <?php if(is_array($list5)): $i = 0; $__LIST__ = $list5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="am-g am-list-item-dated">
                                <a href="/index.php/Home/Article/read/id/<?php echo ($vo["id"]); ?>" class="am-list-item-hd "><?php echo ($vo["title"]); ?></a>
                                <span class="am-list-date"><?php echo (date('Y-m-d',$vo["create_time"])); ?></span>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4">
                <div data-am-widget="list_news" class="am-list-news am-list-news-default">
                    <div class="am-list-news-hd am-cf">
                        <!--带更多链接-->

                        <h2>Video</h2>
                    </div>
                    <div class="am-list-news-bd">
                    <iframe height=175 width=256 src="http://player.youku.com/embed/XODUwNjA3OTg0" frameborder=0 allowfullscreen></iframe>
                    </div>
                </div>
        </div>
    </div>
    <div>
    <section class="am-panel am-panel-primary">
        <header class="am-panel-hd">
            <h3 class="am-panel-title">快速导航</h3>
        </header>
        <div class="am-panel-bd">

        </div>
    </section>
    </div>
</div>
<div data-am-widget="gotop" class="am-gotop am-gotop-fixed" >
    <a href="#top" title="回到顶部">
        <span class="am-gotop-title">回到顶部</span>
        <i class="am-gotop-icon am-icon-chevron-up"></i>
    </a>
</div>
</div>
</div>


<hr>
<footer data-am-widget="footer"
        class="am-footer am-footer-default"
        data-am-footer="{  }">
    <div class="am-footer-miscs ">
        <p>由 北京师范大学珠海分校信息技术学院学生会技术部
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