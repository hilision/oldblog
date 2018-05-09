<?php
namespace app\admin\controller;
use app\admin\model\Cate as CateModel;

class Category extends BaseController
{
    
    public function categoryList()
    {
        $cateList = CateModel::paginate(5);
        $page = $cateList->render();
        $this->assign('page',$page);
        $this->assign('cateList',$cateList);
        return $this->fetch('categoryList');
    }

    public function addCategory()
    {
        if(request()->isPost()){
            $cateModel = new CateModel($_POST);
            $cateModel->allowField(['catename'])->save();
            $id = $cateModel->id;
            if($id){
                $this->success('Add category successed','categoryList');
            }else{
                $this->error('Add category failed');
            }
        }
        return $this->fetch('addCategory');
    }

    public function delete()
    {
        $id = input('id');
        $rst = CateModel::destroy($id);
        if($rst){
            $this->success('Delete category successed','categoryList');
        }else{
            $this->error('Delete category failed');
        }
    }
}
