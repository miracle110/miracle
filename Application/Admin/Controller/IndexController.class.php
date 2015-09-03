<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }
    public function  code()
    {
        $config = array(
            'expire'   =>10,
            'fontSize' => 12,
            'length'   => 4,
            'imageW'   =>100,
            'imageH'   =>30,
            'useNoise' =>false,
            'useImgBg' =>false,
            'useCurve' =>false,
        );
        $Verify=new \Think\Verify($config);
        $Verify->entry();
    }
    function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    public function login()
    {
        $code=$_POST['yzm'];
        $re=$this->check_verify($code);
        if($re)
        {
        $where['user'] = $_POST['user'];
        $where['password'] = MD5($_POST['password']);
        $date['ip'] = get_client_ip();
        $admin = M('admin');
        $re = $admin->where($where)->find();
        $id=$re['id'];
        if ($re > 0)
        {
            session('user',$where['user']);
            $date['num']=$re['num']+1;
            $date['lascreate_time']=time();
            $admin->where("id=$id")->save($date);
            $this->redirect('?m=admin&c=Main&a=index');
        }
        else
        {
            $this->error("用户名或密码错误");
        }
        }
        else
        {
            $this->error("验证码错误");
        }
    }
}