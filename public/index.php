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
    <div id="menuButtons" class="menu pull-right" style="display: none">
        <div class="pull-left" >
            <input name="dirname" type="text" placeholder="输入目录名">
            <button class="btn btn-success">新建</button>
            <button class="btn btn-primary" onclick="$('#uploadFiles').get(0).click();">上传</button>
            <input id="uploadFiles" type="file" style="display: none" multiple />
            <button class="btn btn-info">登出</button>
        </div>
    </div>
</nav>
<div id="main" style="display: none">
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
</div>

<div id="loginForm">
    <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
</div>

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