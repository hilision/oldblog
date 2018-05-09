<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Request;
use app\admin\model\Article as ArticleModel;
use app\admin\model\Cate as CateModel;

class Article extends Controller
{
    public function addArticle()
    {
        if(request()->isPost()){
            $data = [
                'title' => Request::post('title'),
                'desc' => Request::post('desc'),
                'content' => Request::post('content','','htmlspecialchars'),
                'author' => Request::post('author'),
                'cateid' => Request::post('cateid')
            ];
            $articel = ArticleModel::create($data);
            if($articel){
                $this->success('添加成功','articleList');
            }else{
                $this->error('添加失败');
            }
        }else{
            $cate = CateModel::select();
            $this->assign('cate',$cate);
            return $this->fetch('addArticle');
        }        
    }

    public function articleList()
    {
        $articleList = ArticleModel::with('Cate')->select();
        $this->assign('articleList',$articleList);
        return $this->fetch('articleList');
    }

    public function edit()
    {
        if(request()->isPost()){
            $data = [
                'id' => Request::post('id'),
                'title' => Request::post('title'),
                'desc' => Request::post('desc'),
                'content' => Request::post('content','','htmlspecialchars'),
                'author' => Request::post('author'),
                'cateid' => Request::post('cateid')
            ];
            $articel = ArticleModel::update($data);
            if($articel){
                $this->success('添加成功','articleList');
            }else{
                $this->error('添加失败');
            }
        }else{      
            $id = input('param.id');      
            $cate = CateModel::select();
            $article = ArticleModel::with('cate')->find($id);
            $this->assign('cate',$cate);
            $this->assign('article',$article);
            return $this->fetch('editArticle');
        }
    }
}
