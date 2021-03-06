<?php if (!defined('THINK_PATH')) exit();?><!--如果你看到这句话,恭喜你获得了我们学生会技术部加入资格,请联系QQ:752797570,验证信息填写:2016jsb,跟我们学习更多的东西吧~-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>个人中心 - 北京师范大学珠海分校信息技术学院学生会</title>
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
            <h1 style="display: inline">个人中心<small></small></h1>
        </div>

    </div>
</div>

</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">科技学时</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th width="80%">项目</th>
                            <th>学时</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($tcinfo)): $i = 0; $__LIST__ = $tcinfo;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td width="80%"><?php echo ($vo["title"]); ?></td>
                            <td><?php echo ($vo["score"]); ?></td>
                        </tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                        <tr>
                            <td width="80%">总学时:</td>
                            <td><?php echo ($score); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">服务时长</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th width="80%">项目</th>
                            <th>学时</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($tccinfo)): $i = 0; $__LIST__ = $tccinfo;if( count($__LIST__)==0 ) : echo "暂时没有数据" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td width="80%"><?php echo ($vo["title"]); ?></td>
                                <td><?php echo ($vo["score"]); ?></td>
                            </tr><?php endforeach; endif; else: echo "暂时没有数据" ;endif; ?>
                        <tr>
                            <td width="80%">总时长:</td>
                            <td><?php echo ($tccscore); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">修改密码</h3>
                </div>
                <div class="panel-body">
                    <form action="<?php echo U('User/update');?>" method="post">
                        <div class="form-group">
                            <label>修改密码:</label>
                            <input type="password" name="password" class="form-control" placeholder="修改密码">
                        </div>
                        <div class="form-group">
                            <label>确认密码:</label>
                            <input type="password" name="repasswd" class="form-control" placeholder="确认密码">
                        </div>
                        <button type="submit" class="btn btn-default">修改</button>
                    </form>
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