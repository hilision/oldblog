<?php
namespace app\index\controller;
use app\index\model\Article as ArticleModel;

class Article extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $id = input('id');
        $click = ArticleModel::find($id);
        $count = $click['click'];
        ArticleModel::where('id',$id)->update(['click'=>++$count]);
    }
    public function getArticle()
    {
        $id = input('id');   
        $articles = new ArticleModel();
        $article = $articles->find($id);

        $cate = $this->getCate();
        $pArticles = $this->getPopularArticles();
        $this->assign('pArticles',$pArticles);
        $this->assign('cateList',$cate);
        $this->assign('article',$article);
        return $this->fetch('article');
    }
}
