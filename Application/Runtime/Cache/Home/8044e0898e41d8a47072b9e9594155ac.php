<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        #list{width:680px; height:530px; margin:50px auto 2px auto; position:relative}
        #list ul li{ float:left;width:220px; height:260px; margin:2px}
        #list ul li img{width:220px; height:220px}
        #list ul li p{line-height:22px}
        #pagecount{width:500px; margin:10px auto 2px auto; padding-bottom:20px; text-align:center}
        #pagecount span{margin:4px; font-size:14px}
        #list ul li#loading{width:120px; height:32px; line-height:32px; border:1px solid #d3d3d3; position:absolute; top:35%; left:42%; text-align:center; background:#f7f7f7 url(loading.gif) no-repeat 8px 8px;-moz-box-shadow:1px 1px 2px rgba(0,0,0,.2); -webkit-box-shadow:1px 1px 2px rgba(0,0,0,.2); box-shadow:1px 1px 2px rgba(0,0,0,.2);}
    </style>
    <script type="text/javascript" src="/Public/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript">
        var curPage = 1; //当前页码
        var total,pageSize,totalPage;
        //获取数据
        function getData(page,speech){
            $.ajax({
                type: 'POST',
                url: 'Home/Registered/ajax',
                data: {'pageNum':page-1,'speech_id':speech},
                dataType:'json',
                beforeSend:function(){
                    $("#list ul").append("<li id='loading'>loading...</li>");
                },
                success:function(json){
                    $("#list ul").empty();
                    total = json.total; //总记录数
                    pageSize = json.pageSize; //每页显示条数
                    curPage = page; //当前页
                    totalPage = json.totalPage; //总页数
                    var li = "";
                    var list = json.list;
                    $.each(list,function(index,array){ //遍历json数据列
//                        li += "<li><a href='#'><img src='"+array['pic']+"'>"+array['title']+"</a></li>";
                        li+="<div class='baseCommentListBox'>";
                        li+="<div class='commentHeadBox'><img src='"+array['logo']+"'></div>";
                        li+="<div class='wordBox'>";
                        li+="<div class='title'><span>"+array['user_name']+"</span><span>"+array['create_time']+"</span></div>";
                        li+="<div class='commentDetail'>"+array['comments']+"</div>";
                        li+="<div class='buttonBox buttonNotShow'><input type='text' class='commentInput' placeholder='回复.....'></div>"
                        li+="</div>";
                        li+="</div>";
                    });
                    $("#list ul").append(li);
                },
                complete:function(){ //生成分页条
                    getPageBar();
                },
                error:function(){
                    alert("数据加载失败");
                }
            });
        }

        //获取分页条
        function getPageBar(){
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

            $("#page").html(pageStr);
        }

    </script>
</head>

<body>
<div id="header">
    <div id="logo"><h1><a href="http://www.helloweba.com" title="返回helloweba首页">helloweba</a></h1></div>
</div>

<div id="main">
    <h2 class="top_title"><a href="http://www.helloweba.com/view-blog-195.html">jQuery+Ajax+PHP+Mysql实现分页显示数据</a></h2>
    <div id="list">
        <ul></ul>
    </div>
    <div id="page"></div>
</div>

</body>
<script type="text/javascript">
    $(function(){
        getData(1,1);
        $("#page span a").live('click',function(){
            var rel = $(this).attr("rel");
            if(rel){
                getData(rel,1);
            }
        });
    });
</script>
</html>