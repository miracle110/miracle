<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<style type="text/css">
    *{margin: 0;padding: 0;font-family: "microsoft yahei", arial, sans-serif}
    .box{width: 100%;height: 100%;background:#CCCCCC;right: 0;top: 0;position: absolute;}
    .logo{text-align: center;border-radius: 3px;width: 400px;height: 400px;background: #ffffff;left: 450px;top: 100px;position: absolute}
    .logo h1{font-size: 20px;color: #CCCCCC;font-family: "微软雅黑";margin-top: 20px;}
    .logo p a{text-decoration:none;}
    .login{border-top: 1px dashed #CCCCCC;margin:20px;}
    input{border-radius: 2px;border: 1px solid #DBDBDB;width: 200px;height: 30px;margin-top: 30px;}
    .yzm{width: 100px;}
    .botton{right: 0;left: 0;width: 100%;height: 100px;background: #ffffff;position: absolute;bottom: 0;text-align: center;}
    .submit{background:#FF4040;border-radius: 3px;border: 0;color: #ffffff;font-size: 18px;letter-spacing: 30px;text-justify: distribute;height: 40px;}
</style>
<body>
<div class="box">
    <div class="logo">
        <h1>快速登陆寻找您的另一半吧</h1>
        <div class="login">
            账号：<input type="text" name="user" class="user"><br/>
            密码：<input type="password" name="pwd" class="pwd"><br>
            验证码：<input type="text" name="yzm" class="yzm">
            <input type="submit" name="submit" class="submit" value="登陆">
        </div>
        <p><a href="?m=Home&c=Registered&a=cx">没有账号？点击快速注册</a></p>
    </div>
    <div class="botton"></div>
</div>
</body>
</html>