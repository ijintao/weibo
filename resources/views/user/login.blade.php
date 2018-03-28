<!DOCTYPE html>
<html>
<head>
    <title>登录-简单微博系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="static/css/mybase.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


</head>

<body>

<div class="container-narrow">

    <div class="masthead">
        <div class="pull-left">
            <span><a style="vertical-align: bottom;" href="index.htm">返回首页</a></span>
        </div>
        <div class="user_nav pull-right">
            <a type="button" class="btn btn-default" role="button" href="login.htm">登录</a>
            <a type="button" class="btn btn-default" role="button" href="register.htm">注册</a>
        </div>

    </div>

    <div class="clearfix"></div>
    <hr>

    <div class="container high well">

        <form class="form-signin" role="form" method="post">
            <h2 class="form-signin-heading">用户登录</h2>
            <input type="text" name="username" class="form-control" placeholder="用户名或Email" required="" autofocus="">
            <input type="password" name="password" class="form-control" placeholder="密码" required="">
            <label class="checkbox">
                <input type="checkbox" value="remember">记住密码？
            </label>
            <button class="btn btn-lg btn-primary btn-block" type="submit">立即登录</button>
        </form>

        <div class="alert  noaccount center-block">
            <p class="text-center">
                还没有帐号？<a href="register.htm">注册</a>
            </p>

        </div>


        <p class="text-center">
            <a href="getpass.htm">忘记密码？</a>
        </p>

    </div> <!-- /container -->

    <div class="footer">
        <div class="footer-panel">
            <ul class="aboutlinks center-block">
                <li><a href="#">关于我们</a></li>
                <li><a href="#"  >最新动态</a></li>
                <li><a href="#" >联系我们</a></li>
                <li><a href="#" >意见反馈</a></li>
                <li><a href="#" >服务条款</a></li>
            </ul>
            <ul class="icplinks center-block">
                <li>©2013 yiciyuan</li>
                <li><a href="#"  >京ICP证030173号</a></li>
            </ul>
        </div>
    </div>


    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
</body></html>