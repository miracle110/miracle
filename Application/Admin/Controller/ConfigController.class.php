<?php
namespace Admin\Controller;
use Think\Controller;
class ConfigController extends Controller {
    public function index()
    {
        $this->display();
    }
    public function upload()
    {
        $config=M('web_config');
        $data['value']='logo';
        $data['type']='logo';
        $data['index']=$_POST['file'];
        $config->add($data);
    }
}