<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;

class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $hasSeesion = Session::has('id');
        if(!$hasSeesion){
            $this->redirect('Login/index');
        }
    }
}
