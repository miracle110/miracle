<?php
namespace Home\Controller;
use Think\Controller;
class RegisteredController extends Controller {
    public function index(){
            $m=M('comments')->join('left join user on comments.user_id=user.id')->field("comments.*,user.name as user_name,user.logo")->where('speech_id=7')->order('create_time')->select();

            foreach($m as $key=>$se)
            {
                if($se['pid']!='')
                {
                    $m[$key]['pname']=M('comments')->join(' user on comments.user_id=user.id')->where('comments.id='.$se['pid'])->getField('user.name');
                }
                if($se['logo']=='')
                {
                    $m[$key]['logo']='__IMG__/default/avatar.png';
                }
            }
            dump($m);
        $this->display();
    }
    public function ajax()
    {
        $page = intval($_POST['pageNum']);
        $pageSize=6;
        $speech_id=$_POST['speech_id'];
        $total=M('comments')->where('speech_id='.$speech_id)->count();
        $totalPage = ceil($total/$pageSize);
        $startPage = $page*$pageSize;
        $arr['total'] = $total;
        $arr['pageSize'] = $pageSize;
        $arr['totalPage'] = $totalPage;
        $m=M('comments')->join('left join user on comments.user_id=user.id')->field("comments.*,user.name as user_name,user.logo")->where('speech_id='.$speech_id)->limit($startPage.','.$pageSize)->order('id')->select();
        foreach($m as $de)
        {
            $arr['list'][]=array(
                id=>$de['id'],
                user_id=>$de['user_id'],
                speech_id=>$de['speech_id'],
                comments=>$de['comments'],
                create_time=>$de['create_time'],
                user_name=>$de['user_name'],
                logo=>$de['logo'],
            );
        }
//        echo json_encode($arr);
        $this->ajaxReturn($arr,"json");
    }

    public function user ()
    {
        $this->com();
        $this->display();
    }
    public function com()
    {
        $page = intval($_POST['pageNum']);
        $pageSize=16;
        $total=M('comments')->where('user_id=2')->count();
        $totalPage = ceil($total/$pageSize);
        $startPage = $page*$pageSize;
        $arr['total'] = $total;
        $arr['pageSize'] = $pageSize;
        $arr['totalPage'] = $totalPage;
        $re=M('comments')->join('left join comments on comments.id=comments.id')->where('pid is null or comments.id=comments.pid')->select();
//        $re=M('comments')->join('left join speech on comments.speech_id=speech.id')->join('left join user on comments.user_id=user.id')->field('comments.*,speech.name as sname,user.user,user.name,user.logo')->where('user_id=2')->order('create_time desc')->select();
//        foreach($re as $key=>$de)
//        {
//            if($de['pid']!="")
//            {
//                $re[$key]['pname']=M('comments')->join('left join user on comments.user_id=user.id')->where('comments.id='.$de['pid'])->getField('user.name');
//                $re[$key]['puser']=M('comments')->join('left join user on comments.user_id=user.id')->where('comments.id='.$de['pid'])->getField('user.user');
//            }
//        }
//
//        收到回复
//        foreach($re as $keyy=>$ls)
//        {
//            $pcom=M('comments')->join('left join speech on comments.speech_id=speech.id')->join('left join user on comments.user_id=user.id')->field('comments.*,speech.name as sname,user.user,user.name,user.logo')->where('pid='.$ls['id'])->select();
//            if($pcom)
//            {
//                foreach ($pcom as $kes => $k)
//                {
//                    $pcom[$kes]['pname'] = M('comments')->join('left join user on comments.user_id=user.id')->where('comments.user_id=' . $k['user_id'])->getField('user.name');
//                    $pcom[$kes]['puser'] = M('comments')->join('left join user on comments.user_id=user.id')->where('comments.user_id=' . $k['user_id'])->getField('user.user');
//                }
//
//                foreach($pcom as $d)
//                {
//                    $re[]=$d;
//                }
//            }


//        }
//        foreach($re as $s )
//        {
//            $arr['list'][]=$s;
//        }
        dump($re);
//        $this->ajaxReturn($arr,'json');
    }

}