<?php if (!defined('THINK_PATH')) exit();?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/Public/CSS/admin.css" rel="stylesheet" type="text/css" />
    <link href="/Public/CSS/main.css" rel="stylesheet" type="text/css" />
    <link href="/Public/CSS/zzsc.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="/Public/js/jquery.ui.js"></script>
    <script type="text/javascript" src="/Public/js/dialog/dialog.js" id="dialog_js"></script>
    <script type="text/javascript" src="/Public/js/base.js"></script>
    <script>
        $(function(){
            $(".subNav").click(function(){
                $(this).toggleClass("currentDd").siblings(".subNav").removeClass("currentDd")
                $(this).toggleClass("currentDt").siblings(".subNav").removeClass("currentDt")

                // 修改数字控制速度， slideUp(500)控制卷起速度
                $(this).next(".navContent").slideToggle(500).siblings(".navContent").slideUp(500);
            })
        })
    </script>
</head>
<body style="overflow:hidden;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<table width="100%" height="100%" id="frametable" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="2" height="60">
            <div id="header">
                <div class="logo"><img height="55" src="/Public/image/admin/logo_jf.png"></div>
                <div class="info">
                    <p class="portrait">您好:<?php echo ($session); ?></p>
                    <p><a href="index.php?action=logout" target="_top">退出</a></p>
                    <p><a target="_blank" href="<?php echo ($config["weburl"]); ?>">乐缘首页</a></p>
                </div>
                <div class="nav"><ul id="topmenu"><?php if(is_array($top)): $i = 0; $__LIST__ = $top;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i; echo ($re["index"]); endforeach; endif; else: echo "" ;endif; ?></ul>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td width="180" valign="top" class="menutd">
            <div class="menu" id="leftmenu">
                <?php if(is_array($left)): $i = 0; $__LIST__ = $left;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$se): $mod = ($i % 2 );++$i; echo ($se["index"]); endforeach; endif; else: echo "" ;endif; ?>
                </div>

            </div>
        </td>
        <td height="100%" valign="top" class="frame">
            <div style="position:relative; height:100%;">
                <iframe id="main" name="main" width="100%" frameborder="0" height="100%"></iframe>
            </div>
        </td>
    </tr>
</table>
<div style="" id="scrolllink">
    <span onClick="menuScroll(1)"><img src="/Public/image/admin/scrollu.gif"></span>
    <span onClick="menuScroll(2)"><img src="/Public/image/admin/scrolld.gif"></span>
</div>
<div class="copyright">
    <p>Powered by <a target="_blank" href="http://www.fjshuom.com">fjshuom</a></p>
    <p>&copy; 2010-2014</p>
</div>
<script>
    $('.menu li a').click(function(){
        $('.menu li a').css("background","url(../image/admin/icon.gif) 10px center  no-repeat").siblings('li').css("background","url(../image/admin/icon.gif) 10px center  no-repeat;");
        $(this).css("background","url(../image/admin/icon1.png) 10px center  no-repeat").end().siblings('li').css("background","url(../image/admin/icon.gif) 10px center  no-repeat;");
    });
    $('.add-menu').click(function(){
        var url=String(parent.main.location);
        n=url.lastIndexOf('/')+1;
    });
    var headers = new Array('index','global','pay','product','member','shop','business','website','running','tools');
    var menukey = '';
    function toggleMenu( url) {
        switchheader();
        alert(url);
        if(url) {

            parent.main.location = url;

            var hrefs = document.getElementById('menu_' + key).getElementsByTagName('a');
            for(var j = 0; j < hrefs.length; j++) {
                hrefs[j].className = j == 0 ? 'tabon' : '';
            }
        }
        setMenuScroll();
    }
    function setMenuScroll() {
        var obj = document.getElementById('menu_' + menukey);
        if(!obj) {
            return;
        }
        var scrollh = document.body.offsetHeight - 160;
        obj.style.overflow = 'visible';
        obj.style.height = '';
        document.getElementById('scrolllink').style.display = 'none';

        if(obj.offsetHeight + 150 > document.body.offsetHeight && scrollh > 0) {
            obj.style.overflow = 'hidden';
            obj.style.height = scrollh+10 + 'px';
            document.getElementById('scrolllink').style.display = '';
        }
    }
    function menuScroll(op, e) {
        var obj = document.getElementById('menu_' + menukey);
        var scrollh = document.body.offsetHeight - 160;
        if(op == 1) {
            obj.scrollTop = obj.scrollTop - scrollh;
        } else if(op == 2) {
            obj.scrollTop = obj.scrollTop + scrollh;
        } else if(op == 3) {
            if(!e) e = window.event;
            if(e.wheelDelta <= 0 || e.detail > 0) {
                obj.scrollTop = obj.scrollTop + 20;
            } else {
                obj.scrollTop = obj.scrollTop - 20;
            }
        }
    }
    function switchheader(key) {
        for(var k in headers) {
            if(document.getElementById('menu_' + headers[k])) {
                document.getElementById('menu_' + headers[k]).style.display = headers[k] == key ? '' : 'none';
            }
        }
        var lis = document.getElementById('topmenu').getElementsByTagName('li');
        for(var i = 0; i < lis.length; i++) {
            if(lis[i].className == 'navon') lis[i].className = '';
        }
        document.getElementById('header_' + key).parentNode.className = 'navon';
    }

    var menus = document.getElementById('leftmenu').getElementsByTagName('a');
    for(var i = 0; i < menus.length; i++) {
        var menu = menus[i];
        menu.onclick = function() {
            for(var i = 0; i < menus.length; i++)
            {
                menus[i].className = '';
            }
            parent.main.location = this.href;
            this.className = 'tabon';
            return false;
        }
    }
    function opendiv(obj) {

        obj.className = obj.className != 'add' ? 'add' : 'minus';
        setMenuScroll();
    }
    function _attachEvent(obj, evt, func) {
        if(obj.addEventListener) {
            obj.addEventListener(evt, func, false);
        } else if(obj.attachEvent) {
            obj.attachEvent("on" + evt, func);
        }
    }
    toggleMenu('index','main_index.php');

    _attachEvent(window, 'resize', setMenuScroll, document);

    function closeWin(url)
    {
        close_win();
        document.getElementById('main').src=url;
    }
</script>
</body>
</html>