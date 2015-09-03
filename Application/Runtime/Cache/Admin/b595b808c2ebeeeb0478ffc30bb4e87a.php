<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>乐缘分后台管理系统</title>
    <link href="/Public/CSS/admin.css" TYPE="text/css" rel="STYLESHEET"/>
    <link href="/Public/CSS/main.css" TYPE="text/css" rel="STYLESHEET"/>
    <script type="text/javascript" src="/Public/js/base.js"></script>
    <script type="text/javascript" src="/Public/js/jquery-1.4.4.min.js"></script>
</head>
<body class="body">
<center>
    <div class="main">
        <div style="height:125px;"></div>
        <div class="logo"><img src="/Public/image/admin/logo_jf.png"></div>
        <div class="bottom">
            <form method="post" action="?m=admin&c=Index&a=login">
                <table width="100%" height="377px;" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="38" valign="top" class="bgz"></td>
                        <td valign="top">
                            <table width="469px" height="377px" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td class="cen_t"> </td>
                                </tr>
                                <tr>
                                    <td width="469px" height="310px" valign="top" background="/Public/image/admin/center.jpg" style="background-position:top; background-repeat:no-repeat;" class="bgbg">
                                        <div class="bt">后台登陆</div>
                                        <div class="yhxx">
                                            <div>
                                                <label>
                                                    <span class="wz">用户名：</span>
							                         <span class="wb">
                                                        <input type="text" name="user" value="" class="text">
                                                     </span>
                                                </label>

                                            </div>
                                            <div><label><span class="wz">密&nbsp;&nbsp;&nbsp;码：</span>
                                                <span class="wb"> <input type="password" name="password" class="text"></span>
                                            </label>
                                            </div>
                                            <div >
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td style="width:60px;"><span class="wz"> 验证码：</span></td>
                                                        <td style=" text-align:left!important; text-align:center; width:130px;"><label><span class="wb"><input type="text" name="yzm" class="text3">&nbsp;</span></label>
                                                        </td>
                                                        <td valign="middle">
                                                            <img onClick="get_randfunc(this);" style="padding-top:3px; cursor:pointer;" src="?m=admin&c=Index&a=code"/>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="button"style=" width: 100%">
                                            <input style="border:none;" name="Submit" type="image" src="/Public/image/admin/button.jpg">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input style="border:none;" value="" name="" type="image" src="/Public/image/admin/button2.jpg">
                                        </div>
                                        <div class="bwz">
                                            <a target="_blank" href="#"></a>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="cen_b">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                        <td width="38" valign="top" class="bgy">&nbsp;</td>
                    </tr>
                </table>

            </form>

        </div>
    </div>

</center>

</body>

</html>