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

<section class="container-fluid">
    <div class="form-group required">
        <label class="col-sm-1 control-label cr-group">分类</label>
        <div class="col-sm-11 cr-group-items">
            <div class="col-sm-2">
                <input name="inputType" id="inputTypeIndexIcon" class="magic-radio" value="IndexIcon"
                        type="radio">
                <label for="inputTypeIndexIcon">首页Icon</label>
            </div>
            <div class="col-sm-2">
                <input name="inputType" id="inputTypeIndexLogo" class="magic-radio" value="IndexLogo"
                        type="radio" checked>
                <label for="inputTypeIndexLogo">首页Logo</label>
            </div>
            <div class="col-sm-2">
                <input name="inputType" id="inputTypeOtherIcon" class="magic-radio" value="OtherIcon"
                        type="radio">
                <label for="inputTypeOtherIcon">其它Icon</label>
            </div>
            <div class="col-sm-2">
                <input name="inputType" id="inputTypeOtherLogo" class="magic-radio" value="OtherLogo"
                        type="radio">
                <label for="inputTypeOtherLogo">其它Logo</label>
            </div>
        </div>
    </div>
    <div class="form-group required">
        <label for="inputHeight" class="col-sm-1 control-label">高度</label>
        <div class="col-sm-2">
            <input type="number" id="inputHeight" class="form-control" value="64" min="1" step="1" max="1080"/>
        </div>
    </div>
    <div id="divText" class="form-group required">
        <label for="inputIconText" class="col-sm-1 control-label">ICON文字</label>
        <div class="col-sm-2">
            <input type="text" id="inputIconText" class="form-control" maxlength="2" value=""/>
        </div>
        <label id="lblInputLogoText" for="inputLogoText" class="col-sm-1 control-label">Logo文字</label>
        <div id="divInputLogoText" class="col-sm-2">
            <input type="text" id="inputLogoText" class="form-control" value=""/>
        </div>
        <label id="lblInputLogoDesc" for="inputLogoDesc" class="col-sm-1 control-label">Logo说明</label>
        <div id="divInputLogoDesc" class="col-sm-2">
            <input type="text" id="inputLogoDesc" class="form-control" value="by 宇托@yutuo.net"/>
        </div>
    </div>
    <div class="form-group text-center">
        <button id="makeSvg" type="button" class="btn btn-success">生成</button>
        <button id="previewSvg" type="button" class="btn btn-success">预览</button>
        <a id="outputSvg" type="button" class="btn btn-success">导出SVG</a>
        <a id="outputPng" type="button" class="btn btn-success">导出PNG</a>
    </div>
    <div class="form-group">
        <div class="col-sm-12"><h4>结果</h4></div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <textarea id="htmlReslut" class="form-control" rows="10"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12"><h4>预览</h4></div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body" id="viewResult">
                </div>
            </div>
        </div>
    </div>
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