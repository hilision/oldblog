<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
use think\facade\Request;
use app\admin\model\Admin as AdminModel;

class Login extends Controller
{
    public function index()
    {
        Session::clear();
        return $this->fetch('login');
    }

    public function loginIn()
    {
        $username = Request::post('username');
        $pwd = Request::post('password');
        $adminModel = new AdminModel();
        $rst = $adminModel->where(['username'=>$username,'password'=>md5($pwd)])->find();
        if($rst){
            Session::set('id',$rst['id']);
            $this->redirect('Index/index');
        }else{
            $this->redirect('Login/index');
        }
    }
}
