<?php
namespace app\index\controller;
use app\index\model\Article as ArticleModel;
use app\index\model\Cate as CateModel;

class Cate extends BaseController
{
    public function index()
    {
        $cateID = input('cateID');
        $cate = $this->getCate();
        $articleList = ArticleModel::with('cate')->where('cateid','=',$cateID)->order('create_time desc')->select();
        $count = ArticleModel::with('cate')->where('cateid','=',$cateID)->count();
        $pArticles = $this->getPopularArticles();
        $this->assign('pArticles',$pArticles);
        $this->assign('count',$count);
        $this->assign('article',$articleList);
        $this->assign('cateList',$cate);
        return $this->fetch('category');
    }
}
