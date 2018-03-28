<!DOCTYPE html>
<html>
<head>
    <title>注册-简单微博系统</title>
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
        <div class="pull-left"><span><a style="vertical-align: bottom;" href="/">返回首页</a></span></div>
        <div class="user_nav pull-right"><a type="button" role="button" href="<?= url('/login');?>" class="btn btn-default">登录</a><a type="button" role="button" href="javascript:void" class="btn btn-default">注册</a></div>
      </div>
      <div class="clearfix"></div>
      <hr>
      <div class="container high well">
        <form id="form" role="form" action="" method="post" class="form-signin">
          <h2 class="form-signin-heading">用户注册</h2>
          <div class="form-group">
            <input id="username" type="text" name="username" placeholder="用户名" required="required" autofocus="autofocus" pattern=".{3,20}" maxlength="20" class="form-control">
            <label class="control-label">用户名至少需要包含一个字母，不能包含中文</label>
          </div>
          <div class="form-group">
            <input id="email" type="email" name="email" placeholder="Email" required="required" class="form-control">
            <label class="control-label">Email地址不正确！</label>
          </div>
          <div class="form-group">
            <input id="password" type="password" name="password" placeholder="密码" required="required" pattern=".{6,20}" maxlength="20" class="form-control">
            <label class="control-label">密码最少6位</label>
          </div>
          <div class="form-group">
            <input id="rePassword" type="password" name="rePassword" placeholder="确认密码" required="required" pattern=".{6,20}" maxlength="20" data-event="confirm-password" class="form-control">
            <label class="control-label">两次密码输入不一致</label>
          </div>
          <div class="form-group">
            <button id="submit" type="submit" class="btn btn-lg btn-primary btn-block">立即注册</button>
          </div>
        </form>
        <div class="alert noaccount center-block">
          <p class="text-center">已有账号，<a href="<?= url('/login');?>">登录</a></p>
        </div>
      </div>
      <div class="footer">
        <div class="footer-panel">
          <ul class="aboutlinks center-block">
            <li><a href="#">关于我们</a></li>
            <li><a href="#">最新动态</a></li>
            <li><a href="#">联系我们</a></li>
            <li><a href="#">意见反馈</a></li>
            <li><a href="#">服务条款</a></li>
          </ul>
          <ul class="icplinks center-block">
            <li>©2013 yiciyuan</li>
            <li><a href="#">京ICP证030173号</a></li>
          </ul>
        </div>
      </div>
    </div>
    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
  </body>
</html>