<!DOCTYPE html>
<html lang="zh-cn"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>基于Redis实现的简单微博系统</title>

    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="static/css/mybase.css">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    @if (0==$isLogin)
        <div class="user_nav pull-right">
            <a type="button" class="btn btn-default" role="button" href="<?= url('/login'); ?>">登录</a>
            <a type="button" class="btn btn-default" role="button" href="<?=url('register'); ?>">注册</a>
        </div>
    @else
        <div class="user_nav pull-right">
            <p> 欢迎 <span class="label label-success">{{$userInfo['username']}}</span> ，<a href="<?= url('/logout')?>">退出</a>  </p>
        </div>
    @endif
    <div class="header">
        <h3 class="text-muted"><a style="vertical-align: bottom;" href="<?= url('/');?>">简单微博系统</a></h3>
    </div>

    @if ($isLogin > 0)
        <form class="form-inline" role="form" action="<?= url('/weibo/create'); ?>" method="post">
            <label class="sr-only" for="weiboContent">新鲜事:</label>
            <input type="text" name="contents" class="form-control" id="weiboContent" size="120" placeholder="写个微博">
            <button type="submit" class="btn btn-default">发布</button>
        </form>
    @endif


    <hr />
        @foreach($list as $item)
            <div class="col-md-10 media">
                <a class="pull-left" href="#">
                    <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABN0lEQVR4Xu2YQQ6EIAxFdeXFODZnYu9qJk5C0sGiUiAx8FyKVPr76VPWEMJnmfhaEQAHsAXoARP3wIUmCAWgABSAAlBgYgXAIBgEg2AQDE4MAX6GwCAYBINgEAyCwYkVAIO1GPTe//nHOXfyU3xGG9PM1yNmzuRVDpCJ5ZKUyTwRoEfMqx3eTIBcJbdtW/Z9/w2XCtAqZncB5Atkkkc1NQFileVYFCi1fypcLqa1jzd1QM6+2va4EycKWRLTIkI3AY7FPKmmVmF5LxXvLmapCF0FiItp5QCZXClZulBAq/IVBtN9rvUAa8zSysfnqxxgfemb5iFA7Zfgm6ppWQsOwAEciXEkxpGYpXuOMgcKQAEoAAWgwCgd3ZIHFIACUAAKQAFL9xxlDhSAAlAACkCBUTq6JY/pKfAFwO6XkLwNdToAAAAASUVORK5CYII=" style="width: 64px; height: 64px;">
                </a>
                <div class="media-body">
                    <h4 class="media-heading text-primary">{{$item['username']}} <a href="<?= url("/follow/{$item['uid']}"); ?>">关注他</a></h4>
                    <p>{{$item['contents']}}</p>
                    <div class="row">
                        <div class="col-md-2"><span class="text-muted">{{$item['intime']}}</span></div>
                        <div class="col-md-1 col-md-offset-10"><a href="#"><span class="glyphicon glyphicon-thumbs-up"></span></a> </div>
                        <div class="col-md-1"><span class="text-muted"><a href="#"><span class="glyphicon glyphicon-thumbs-down"></span></a> </span></div>
                    </div>
                </div>
            </div>
        @endforeach


    <div class="clearfix" ></div>
    <hr />
    <div class="footer">
        <p>© Company 2014</p>
    </div>


</div>
</body></html>