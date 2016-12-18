<?php if (!defined('THINK_PATH')) exit();?><!--如果你看到这句话,恭喜你获得了我们学生会技术部加入资格,请联系QQ:752797570,验证信息填写:2016jsb,跟我们学习更多的东西吧~-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>活动报名 - 北京师范大学珠海分校信息技术学院学生会</title>
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
<div class="container-fluid">
<div class="row">
    <div class="jumbotron">
        <div class="container">
            <h1 style="display: inline">活动报名<small></small></h1>
        </div>

    </div>
</div>
    </div>

<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th width="30%">标题</th><th>组织</th><th>截止日期</th><th>简介</th><th>报名</th><th>状态</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td width="30%"><?php echo ($vo["title"]); ?></td>
                <td><?php echo ($vo["writer"]); ?></td>
                <td><?php echo (date('Y-m-d',$vo["time"])); ?></td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#model-<?php echo ($vo["id"]); ?>">
                        查看简介
                    </button>
                    <div class="modal fade" id="model-<?php echo ($vo["id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">活动介绍</h4>
                                </div>
                                <div class="modal-body">
                                    <?php echo (stripslashes(htmlspecialchars_decode($vo["content"]))); ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <?php if($vo["time"] < $now): ?><button type="button" class="btn btn-default btn-sm" disabled>
                            报名
                        </button>
                    <?php else: ?>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tcmodel-<?php echo ($vo["id"]); ?>">
                            报名
                        </button>
                        <div class="modal fade" id="tcmodel-<?php echo ($vo["id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">报名信息填写</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="<?php echo U('Activity/sign');?>">
                                            <div class="form-group">
                                                <label>学号</label>
                                                <input type="number" class="form-control" name="id" placeholder="请输入你的学号" value="<?php echo ($_SESSION['id']); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>姓名</label>
                                                <input type="text" class="form-control" name="name" placeholder="请输入你的姓名" value="<?php echo ($_SESSION['name']); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>专业</label>
                                                <input type="text" class="form-control" name="major" placeholder="请输入你所在专业">
                                            </div>
                                            <div class="form-group">
                                                <label>手机</label>
                                                <input type="text" class="form-control" name="mobile" placeholder="请输入你的手机号码">
                                            </div>
                                            <div class="form-group">
                                                <label>QQ</label>
                                                <input type="text" class="form-control" name="qq" placeholder="请输入你的QQ号码">
                                            </div>
                                            <div class="form-group">
                                                <label>申请理由</label>
                                                <textarea rows="3" type="text" class="form-control" name="content" placeholder="请输入你的申请理由"></textarea>
                                            </div>
                                            <input type="hidden" name="classify" value="<?php echo ($vo["id"]); ?>">
                                            <button type="submit" class="btn btn-default">提交</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                    </div>
                                </div>
                            </div>
                        </div><?php endif; ?>
                </td>
                <td>
                    <?php if($vo["time"] >= $now): ?><span class="label label-primary">正在进行</span><?php endif; ?>
                    <?php if($vo["time"] < $now): ?><span class="label label-danger">已截止</span><?php endif; ?>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div><?php echo ($page); ?></div>
</div>

<footer class="footer">
    <div class="container">
        <p>北京师范大学珠海分校信息技术学院学生会</p>
        <p>北京师范大学珠海分校信息技术学院学生会 版权所有 | <a href="http://www.miibeian.gov.cn/">粤ICP备05026012号</a></p>
        <p>开发团队:北师大珠海分校信息技术学院学生会技术部</p>
    </div>
</footer>