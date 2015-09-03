<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0025)http://yixi.tv/usercenter -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<title>一席｜个人中心</title>
<meta name="Keywords" content="一席,yixi,YIXI,演讲,听君一席话,人文,科技,白日梦,get inspired,">
<!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<meta name="Description" content="听君一席话，胜读十年书。（Get Inspired） 一席鼓励分享见解、体验和对未来的想象，做有价值的传播。">
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, minimum-scale=1, user-scalable=no">
<link href="/Public/CSS/mainStyle.css" rel="stylesheet" type="text/css">
<link href="/Public/CSS/animation.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Public/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="./一席｜个人中心_files/html5.js"></script>
<script type="text/javascript" src="./一席｜个人中心_files/retina.js"></script>
    <script type="text/javascript">
        var curlPage=1;
        var total,pageSize,totalPage;
        //评论
        function getComments(page)
        {
            $.ajax({
                type:'post',
                url:'Home/Registered/com',
                data:{'pageNum':page-1},
                dataType:'json',
                beforeSend:function(){
                    $('#commentContainer').append("<ul><li id='load'>loading....</li></ul>")
                },
                success:function(data)
                {
                    $('#commentContainer').empty();
                    total=data.total;
                    pageSize=data.pageSize;
                    curlPage=page;
                    totalPage=data.totalPage;
                    var li="";
                    var list=data.list;
                    $.each(list,function(index,array){
                        li+="<div class='baseCommentListBox'>";
                        li+="<span class='newMassage'></span>";
                        li+="<div class='commentHeadBox'></div>";
                        li+="<div class='wordBox'>";
                        li+="<div class='title'><span>您在《》中评论</span><span>"+array['create_time']+"</span></div>";
                        li+="<div class='commentDetail'>"+array['comments']+"</div>";
                        li+="</div>";
                        li+="</div>";
                    });
                $("#pagetxt").append(li);
            if(total>15)
            {
                getPageBar();
            }
        },
        error:function(XMLHttpRequest, textStatus, errorThrown) {
            alert(XMLHttpRequest.status);
            alert("数据加载失败");
        }
            });
        }

        function getPageBar(){
            var pageStr;
            //页码大于最大页数
            if(curPage>totalPage) curPage=totalPage;
            //页码小于1
            if(curPage<1) curPage=1;
            pageStr = "<span>共"+total+"条</span><span>"+curPage+"/"+totalPage+"</span>";

            //如果是第一页
            if(curPage==1){
                pageStr += "<span>首页</span><span>上一页</span>";
            }else{
                pageStr += "<span><a href='javascript:void(0)' rel='1'>首页</a></span><span><a href='javascript:void(0)' rel='"+(curPage-1)+"'>上一页</a></span>";
            }

            //如果是最后页
            if(curPage>=totalPage){
                pageStr += "<span>下一页</span><span>尾页</span>";
            }else{
                pageStr += "<span><a href='javascript:void(0)' rel='"+(parseInt(curPage)+1)+"'>下一页</a></span><span><a href='javascript:void(0)' rel='"+totalPage+"'>尾页</a></span>";
            }

            $("#pageList").html(pageStr);
        }

        $(function(){
            getComments(1);
            $("#pageList span a ").live('click',function(){
                var rel = $(this).attr("rel");
                if(rel){
                    getComments(rel);
                }
            });
        });
    </script>
</head>
<body>
<div class="wrapper"> 
    <!--760main nav start-->
    <nav class="MMainNav">
        <div class="topArea"> 
            <!--logo--> 
            <a class="logoMb">
            <h1>一席</h1>
            </a> 
            <!--mobile button srart--> 
            <a class="MNavButton" id="menuIcon" onclick="menuCge()"><span class="MbLine1" id="button1"></span><span class="MbLine2" id="button2"></span><span class="MbLine3" id="button3"></span></a> 
            <!--mobile button over-->
            <div class="clear"></div>
        </div>
        <div class="MbListBoxOut" id="mianNavContent">
            <div class="MpopoutBG">
                <div class="MloginPopout">
                    <div class="MPopoutLoginBox"><span>登录</span>
                        <form method="POST" action="./一席｜个人中心_files/一席｜个人中心.html" accept-charset="UTF-8" id="mLoginForm"><input name="_token" type="hidden" value="pmzNEHyd5fXw8MNmdIzo7eZuRYXFrGTlaSgRnmiV">
                        <input type="text" class="inputText" placeholder="请输入账号" name="email">
                        <input type="password" class="inputText" placeholder="请输入密码" name="password">
                        <input type="submit" class="inputButton" value="登  录">
                        <div class="Fpassword"><a href="http://yixi.tv/findpassword" target="_blank">忘记密码了？</a></div>
                        <a href="http://yixi.tv/usercenter#" class="chagePanel" id="MloginChage">注册新账号&nbsp;&gt;</a>
                        </form>
                    </div>
                    <div class="MPopoutsignBox"><span>注册</span>
                        <form method="POST" action="./一席｜个人中心_files/一席｜个人中心.html" accept-charset="UTF-8" id="mRegisterForm"><input name="_token" type="hidden" value="pmzNEHyd5fXw8MNmdIzo7eZuRYXFrGTlaSgRnmiV">
                        <input type="email" class="inputText" placeholder="请输入邮箱" name="email">
                        <input type="password" class="inputText" placeholder="请输入新密码" name="password">
                        <input type="password" class="inputText" placeholder="再次输入密码" name="repass">
                        <input type="submit" class="inputButton" value="注  册">
                        <a href="http://yixi.tv/usercenter#" class="chagePanel" id="MsignChage">&lt;&nbsp;已有账号</a>
                        </form>
                    </div>
                    <a href="http://yixi.tv/usercenter#" class="MpopoutCloseButton">关闭</a>
                </div>
            </div>
            <div class="searchBox">
                <input type="search" placeholder="输入关键字..." class="searchInput searchBtn">
            </div>
            <ul class="mbNavList">
                <li><a href="http://yixi.tv/">首页</a></li>
                <li><a href="http://yixi.tv/albums">专题集</a></li>
                <li><a href="http://yixi.tv/lectures/all">演讲集</a></li>
                <li><a href="http://yixi.tv/activities">活动</a></li>
                <li><a href="http://yixi.tv/records">纪录</a></li>
                <!-- <li><a href="#">课堂</a></li> -->
                <li><a href="http://yixi.tv/gifts">礼物</a></li>
                <li><a href="http://yixi.tv/about">关于</a></li>
            </ul>
            <div class="MloginBox"><a href="./一席｜个人中心_files/一席｜个人中心.html" class="MloginButton">939335694@qq.com</a></div>
        </div>
        <div class="clear"></div>
    </nav>
    <!--nav part-->
    <div class="navBox">
        <div class="navBg">
            <!--mainnav start-->
            <nav id="mainNav">
                <!--login popout box start-->
                <div class="loginPopout"> <a class="popoutCloseButton clearfix"><span class="line1"></span><span class="line2"></span></a>
                    <div class="PopoutLoginBox"><span>登录</span>
                        <form method="POST" action="./一席｜个人中心_files/一席｜个人中心.html" accept-charset="UTF-8" id="loginForm"><input name="_token" type="hidden" value="pmzNEHyd5fXw8MNmdIzo7eZuRYXFrGTlaSgRnmiV">
                        <input type="text" class="inputText" placeholder="请输入账号" name="email">
                        <input type="password" class="inputText" placeholder="请输入密码" name="password">
                        <input type="submit" class="inputButton" value="登  录">
                        <div class="Fpassword"><a href="http://yixi.tv/findpassword" target="_blank">忘记密码了？</a></div>
                        <a href="http://yixi.tv/usercenter#" class="chagePanel" id="loginChage">注册新账号&nbsp;&gt;</a>
                        </form>
                    </div>
                    <div class="PopoutsignBox"><span>注册</span>
                        <form method="POST" action="./一席｜个人中心_files/一席｜个人中心.html" accept-charset="UTF-8" id="registerForm"><input name="_token" type="hidden" value="pmzNEHyd5fXw8MNmdIzo7eZuRYXFrGTlaSgRnmiV">
                        <input type="email" class="inputText" placeholder="请输入邮箱" name="email">
                        <input type="password" class="inputText" placeholder="请输入新密码" name="password">
                        <input type="password" class="inputText" placeholder="再次输入密码" name="repass">
                        <input type="submit" class="inputButton" value="注  册">
                        <a href="http://yixi.tv/usercenter#" class="chagePanel" id="signChage">&lt;&nbsp;已有账号</a>
                        </form>
                    </div>
                </div>
                <!--login popout box over-->
                <div class="userLogin"><span><a href="./一席｜个人中心_files/一席｜个人中心.html" id="MainLoginButton" class="noBorder">939335694@qq.com</a></span> </div>
                <div class="navSearchBox">
                    <input class="navSearchInput searchBtn">
                </div>
                <a href="http://yixi.tv/">首页</a>
                <a href="http://yixi.tv/albums">专题集</a>
                <a href="http://yixi.tv/lectures/all">演讲集</a>
                <a href="http://yixi.tv/activities">活动</a>
                <a href="http://yixi.tv/records">纪录</a>
                <!-- <a href="#" >课堂</a> -->
                <a href="http://yixi.tv/gifts">礼物</a>
                <a href="http://yixi.tv/about">关于</a>
            </nav>
            <!--mainnav over--> 
            <!--logo-->
            <a class="logo">
            <h1>一席</h1>
            </a> 
            <!--logo over--> 
        </div>
    </div>
    <!--body part-->
    <div class="mainBody"> 
        <!--second banner section!!!!-->
        <section>
            <div class="secondBnnerForDetail" style=" background-image: url(http://static.yixi.tv/background/2015-08-20/4668f3ffa436c4e78b029ff3c7a175d2.1536x600.jpg);">
                <div class="detailHeadBox"><img src="./一席｜个人中心_files/head_black90@2x.png"></div>
                <span class="speakerName">939335694@qq.com</span><span class="speakerIntr"></span> </div>
            <div class="editPersonBox">
                <div class="editContentOut" id="editContent">
                    <div class="topPart"><a href="http://yixi.tv/user/logout" class="logOut">退出登录</a><span>939335694@qq.com</span></div>
                    <form method="POST" action="http://yixi.tv/user/setting" accept-charset="UTF-8" id="settingForm" target="postfrm" enctype="multipart/form-data"><input name="_token" type="hidden" value="pmzNEHyd5fXw8MNmdIzo7eZuRYXFrGTlaSgRnmiV">
                    <div class="secondPart clearfix">
                        <div class="changeHeadBox">
                            <span class="title">编辑头像</span>
                            <input type="file" class="headSelectFile" onchange="document.getElementById(&#39;textfield&#39;).value=this.value" name="portrait">
                            <input class="fileSelectCover" type="text" value="选择一张图片" id="textfield">
                            <span class="tip">图片尺寸必须大于260x260</span>
                        </div>
                        <div class="changeBackBgBox">
                            <span class="title">编辑背景</span>
                            <input type="file" class="headSelectFile" onchange="document.getElementById(&#39;textfield2&#39;).value=this.value" name="background">
                            <input class="fileSelectCover" type="text" value="选择一张图片" id="textfield2">
                            <span class="tip">图片尺寸必须大于1536x746</span>
                        </div>
                        <div class="changeNickname">
                                <span class="title">编辑昵称</span>
                                <input type="text" class="baseChangeInput" name="nickname" value="939335694@qq.com">
                        </div>
                        <div class="changeDesc">
                                <span class="title">编辑个人描述</span>
                                <textarea class="descInput" name="desc"></textarea>
                        </div>
                        <div class="changePassword noBorder">
                                    <span class="title">重设密码</span>
                                   <input type="password" class="baseChangeInput" name="password">
                                   <input type="password" class="baseChangeInput" name="repass">
                        </div>
                    </div>
                    <div class="lastPart">
                        <input type="submit" class="submitPersonInfoButton" value="确认修改">
                    </div>
                    </form>
                </div>
                <div class="tipForChangeInfo"><a href="http://yixi.tv/usercenter#" title="修改个人信息" class="openButton">⇓</a></div>
            </div>

        </section>
        <!--main list section-->
        <section class="sbw1240 pdt40 clearfix"> 
            <!--left row !!!!!-->
            <div class="leftRow">
                <div class="personComment">
                    <div class="personTitle">和我有关的评论</div>
                    <div id="commentContainer"><!--base user comment start-->
<!--base user comment over-->
</div>
                </div>
            </div>
            <!--right row !!!!!-->
            <div class="rightRow"> 
                <!--related list box start-->
                <div class="relatedBox">
                    <div class="personTitle">我收藏的演讲</div>
                                        <div class="noContent">还没有收藏演讲</div>
                                    </div>
                <!--related list box over-->
            </div>
        </section>
    </div>
    <iframe id="postfrm" name="postfrm" frameborder="0" style="display:none"></iframe>
    <div class="backToTop" id="backToTop"><span>⇑</span><span>TOP</span></div>
    <!--foot part-->


<div class="londingPopout"> <span><img src="./一席｜个人中心_files/popout_Like.png"></span> <span>资料修改中，请稍后...</span><div class="londingbar"></div><div class="wait">图片较大，请耐心等待</div></div>

<script>
    var loginUrl="http://yixi.tv/api/v1/user/login";    //用户登录
    var registerUrl="http://yixi.tv/api/v1/user/register";    //用户注册
    var userInfoUrl="http://yixi.tv/api/v1/user/info"; //用户信息



    function menuCge() {
        if (document.getElementById("button1").className == "MbLine1")
        {document.getElementById("button1").className = "MbLine1R1";
        document.getElementById("button2").className = "MbLine2R2";
        document.getElementById("button3").className = "MbLine3R3";
        document.getElementById("mianNavContent").className = "MbListBox";
        }
        else
        {document.getElementById("button1").className = "MbLine1";
        document.getElementById("button2").className = "MbLine2";
        document.getElementById("button3").className = "MbLine3";
        document.getElementById("mianNavContent").className = "MbListBoxOut";
        }
    }

    // 没有href的a链不能点击
    $('a').click(function(e){
        var href=$(this).attr('href');
        if(!href){
            e.preventDefault();
        }
    });

    // 注册登录
    $('#MainLoginButton').click(function(){
        if($(this).text() == '注册/登录'){
            $('.loginPopout').css('height','280px').css('opacity','1');
            return false;
        }
    });
    $('.popoutCloseButton').click(function(){
        $('.loginPopout').css('height','0px').css('opacity','0');
        return false;
    });

    $('#loginChage').click(function(){
        $('.loginPopout').css('height','320px').css('opacity','1');
        $('.PopoutLoginBox').css('left','-200px').css('opacity','0');
        $('.PopoutsignBox').css('left','0px').css('opacity','1');
        return false;
    });
    $('#signChage').click(function(){
        $('.loginPopout').css('height','280px').css('opacity','1');
        $('.PopoutsignBox').css('left','200px').css('opacity','0');
        $('.PopoutLoginBox').css('left','0px').css('opacity','1');
        return false;
    });


     //小屏注册登录
    $('.MloginButton').click(function(){
        if($(this).text() == '注册/登录'){
            $('.MpopoutBG').css('height','100%').css('opacity','1');
            $('.MloginPopout').css('height','300px').css('opacity','1');
            return false;
        }
    });
    $('.MpopoutCloseButton').click(function(){
        $('.MloginPopout').css('height','0px').css('opacity','0');
        $('.MpopoutBG').css('height','0px').css('opacity','0');
        return false;
    });
    $('#MloginChage').click(function(){
        $('.MloginPopout').css('height','360px');
        $('.MPopoutLoginBox').css('left','-100%').css('opacity','0');
        $('.MPopoutsignBox').css('left','0px').css('opacity','1');
        return false;
    });
    $('#MsignChage').click(function(){
        $('.MloginPopout').css('height','300px');
        $('.MPopoutsignBox').css('left','100%').css('opacity','0');
        $('.MPopoutLoginBox').css('left','0px').css('opacity','1');
        return false;
    });


    // 登录注册成功后获取用户信息
    function loadUserInfo(id){
        $.get(userInfoUrl+'/'+id,function(info){
            $('#MainLoginButton').text(info.data.nickname);
            $('.MloginButton').text(info.data.nickname);
            $('.popoutCloseButton').trigger('click');
            $('.MpopoutCloseButton').trigger('click');
        });
        if(location.href.search(/activities/)){
            location.reload();
        }
    }
    // 登录
    $('#loginForm,#mLoginForm').submit(function(){
        $.post(loginUrl,$(this).serialize(),function(data){
            if(data.res == 0 ){
                loadUserInfo(data.data);
            }else{
                alertMsg(data.msg);
            }
        });
        return false;
    });
    // 注册
    $('#registerForm,#mRegisterForm').submit(function(){
        var _this=$(this);
        var pass=_this.find('input[name="password"]').val();
        var repass=_this.find('input[name="repass"]').val();
        if(pass != repass){
            alertMsg('两次输入的密码不同');
            return false;
        }

        $.post(registerUrl,$(this).serialize(),function(data){
            if(data.res == 0 ){
                loadUserInfo(data.data);
            }else{
                alertMsg(data.msg);
            }
        });
        return false;
    });

    // 关闭提示框
    $('.signBoxCloseButton').click(function(){
        $('.signPopout').hide();
        return false;
    });

    // 关闭错误提示框
    $('.baseCloseButton').click(function(){
        $('.basePopout').hide();
        return false;
    });

    // 弹出提示框
    function alertMsg(msg){
        var box=$('.basePopout');
        box.find('span').text(msg);
        box.show();
    }

    // 需要登录
    function notLogin(){
        var box=$('.signPopout');
        box.show();
    }

    //搜索
    $('.searchBtn').keyup(function(e){
        if(e.which == 13){
            location.href='/search/'+$(this).val();
        }
    });

    // backToTop
    $(window).scroll( function() { 
        var scrollValue=$(window).scrollTop();
        scrollValue > 1500 ? $('#backToTop').fadeIn():$('#backToTop').fadeOut();
    } );    
    $('#backToTop').click(function(){
        $("html,body").animate({scrollTop:0},300);  
    });

    //页脚二维码遮罩
    $('.coedDownloadBox').on('mouseover',function(){
        $(this).children('.comingCover').css('bottom','50px');
    })
    $('.coedDownloadBox').mouseleave(function(){
        $(this).children('.comingCover').css('bottom','-100%');
    })

</script>
<script>
    var userId=42230;
    var commentsUrl='http://yixi.tv/user/replylist';    //获取评论
    var addCommentUrl='http://yixi.tv/lecture/comment'; //添加评论
    var bookmarksUrl='http://yixi.tv/user/bookmarks';   //获取收藏


    /*person page chagebox open*/
    $('.openButton').click(function(){
        if($('#editContent').hasClass('editContentOut')){
            $('#editContent').removeClass('editContentOut').addClass('editContent');
            $('.tipForChangeInfo').removeClass('tipForChangeInfo').addClass('tipForChangeInfoOpen');
            $(this).html('&uArr;');
        }
        else {
            $('#editContent').removeClass('editContent').addClass('editContentOut');
            $('.tipForChangeInfoOpen').removeClass('tipForChangeInfoOpen').addClass('tipForChangeInfo');
            $(this).html('&dArr;');
        }
        return false;
    });

    // 修改资料
    $('#settingForm').submit(function(e){
        var form=$(this);
        var action=form.attr('action');
        var pass=$.trim(form.find('input[name="password"]').val());
        var repass=$.trim(form.find('input[name="repass"]').val());
        if(pass != repass){
            alertMsg('两次输入的密码不同');
            return false;
        }
        $('.londingPopout').show();
    });
    function settingCB(obj){
        if(obj.res == 0){
            $('#settingForm').find('input').val('');
            window.location.href=window.location.href;
        }else{
            alertMsg(obj.msg);
        }
        $('.londingPopout').hide();
    }

    // 读取评论
    $('#commentContainer').load(commentsUrl);
    $('#commentContainer').on('click','a',function(e){
        var _this=$(this);
        var href=_this.attr('href');
        if(href){
            $('#commentContainer').load(href);
        }
        e.preventDefault();
    });

    // 添加评论
    function addComment(content,toid,lecid,obj){
        var args={
            toid:toid,
            content:content,
            lecid:lecid
        };
        $.post(addCommentUrl,args,function(data){
            if(data.res == 0){
                $('#commentContainer').prepend(data.data.html);
                if(toid){
                    var wBox=obj.closest('.wordBox');
                    wBox.width(wBox.find('.commentDetail').attr('width'));
                    wBox.find('.buttonBox').addClass('buttonNotShow');
                }
            }else if(data.res == -1){
                notLogin();
            }else{
                alertMsg(data.msg);
            }
        });
    }

    // 回复框
    $('#commentContainer').on('keyup','.commentInput',function(e){
        if(e.which == 13){
            var content=$.trim($(this).val());
            addComment(content,$(this).attr('userid'),$(this).attr('lecid'),$(this));
            $(this).val('');
        }
    });

    // 发表回复
    $('#commentContainer').on('click','.commentDetail',function(){
        var _this=$(this);
        var replyBox=_this.siblings('.buttonBox');
        var curUserId=replyBox.find('input').attr('userid');

        if(replyBox.hasClass('buttonNotShow') && userId != curUserId){     //弹出回复输入框
            replyBox.removeClass('buttonNotShow');
            var curWidth=_this.closest('.wordBox').width();
            _this.closest('.wordBox').width('95%');
            _this.attr('width',curWidth);
        }else{
            _this.closest('.wordBox').width(_this.attr('width'));
            replyBox.addClass('buttonNotShow');
        }
    });
</script>
</body></html>