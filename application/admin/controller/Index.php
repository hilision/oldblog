<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;

class Index extends Controller
{
    public function index()
    {
        $hasSession = Session::has('id');
        if(!$hasSession){
            $this->redirect('Login/index');
        }
        return $this->fetch();
    }
}   
