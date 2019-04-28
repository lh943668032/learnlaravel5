<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>导航栏的字形图标</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#target-menu">
            <span class="sr-only">qieh</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">hello</a>
    </div>
    <div class="collapse navbar-collapse" id="target-menu">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">网站首页</a></li>
            <li><a href="#">JS开发</a></li>
            <li><a href="#">html</a></li>
            <li><a href="#">jquery</a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">前端学习 <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">html+css学习</a></li>
                    <li><a href="#">javascript学习</a></li>
                    <li><a href="#">jquery学习</a></li>
                    <li><a href="#">bootstrap学习</a></li>
                    <li><a href="#">less/sass学习</a></li>
                    <li><a href="#">angularJS学习</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
</body>
</html>