<?php
namespace app\index\controller;
use app\index\model\Article as ArticleModel;


class Index extends BaseController
{
    public function index()
    {     
        $cate = $this->getCate();
        $list = ArticleModel::with('cate')->order('create_time desc')->paginate(5);
        $totalPage = $list->lastPage();
        $currentPage = $list->currentPage();
        $pArticles = $this->getPopularArticles();
        $this->assign('pArticles',$pArticles);
        $this->assign('currentPage',$currentPage);  
        $this->assign('totalPage',$totalPage); 
        $this->assign('list',$list);      
        $this->assign('cateList',$cate);
        return $this->fetch();
    }  
}

