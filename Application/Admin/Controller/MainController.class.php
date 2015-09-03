<?php
namespace Admin\Controller;
use Think\Controller;
class MainController extends Controller {
    public function index()
    {
        $user=M('web_config');
        $top=$user->where(' type="menu" and id2 is null')->select();
        if($_GET['menu'])
        {
            $left=$user->where('type="menu" and id2="$_GET[menu]"')->select();
        }
        else
        {
            $left=$user->where('type="menu" and id2=1')->select();
        }
        $this->assign('left',$left);
        $this->assign('top',$top);
        $this->assign('session',session('user'));
        $this->display();
    }
}