<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Cate as CateModel;
use app\index\model\Article as ArticleModel;

class BaseController extends Controller
{    
    public function getCate()
    {
        $cateModel = new CateModel();
        return $cateModel->select();
    }

    public function getPopularArticles()
    {
        $pArticleList = ArticleModel::order('click desc')->limit(5)->select();
        return $pArticleList;
    }
}
