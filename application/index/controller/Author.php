<?php
namespace app\index\controller;

class Author extends BaseController
{
    public function index()
    {
        $cate = $this->getCate();
        $pArticles = $this->getPopularArticles();
        $this->assign('pArticles',$pArticles);
        $this->assign('cateList',$cate);
        return $this->fetch('info');
    }
}
