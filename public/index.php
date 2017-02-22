<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/yutuo-addon.css" rel="stylesheet">
    <title>文件管理器</title>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="logo" href="/"><img src="/images/logo.png"/> </a>
    </div>
    <div class="menu pull-right">
        <div class="pull-left" >
            <input name="dirname" type="text" placeholder="输入目录名">
            <button class="btn btn-success">新建</button>
            <button class="btn btn-primary">上传</button>
        </div>
    </div>
</nav>

<header class="header">
	<div class="speedbar">
		<div class="toptip">
            <strong class="text-success">当前目录：</strong>
        </div>
	</div>
</header>

<section class="container-fluid">
   
    <table class="table">
        <thead>
            <tr>
                <th>文件名</th>
                <th>大小</th>
                <th>修改时间</th>
                <th>权限</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</section>

<footer>
    <div class="footer-inner">
        <div class="copyright">
            版权所有，保留一切权利！ &copy; 2017 <a href="https://yutuo.net">宇托的狗窝</a>        </div>
    </div>
</footer>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/yutuo-addon.js"></script>
</body>
</html>