<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function ueditor(){
        $data = new \Org\Util\Ueditor();
        echo $data->output();
    }
    public function index(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        $Article = M('Article'); // 实例化User对象
        $count      = $Article->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        //$Page->setConfig('theme',"<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Article->order('create_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板

    }
    public function add(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        if (IS_POST) {

            // 实例化article对象
            $Article = D('Article');
            if ($Article->create()) {
                $result = $Article->add();
                if ($result) {
                    $this->success('文章发布成功',U('Article/Index'));
                } else {
                    $this->error('文章发布失败,若有问题请联系技术部');
                }
            } else {
                $this->error($Article->getError());
            }
        }else{
            $Cate=M('Cate');
            $list = $Cate->order('id')->select();
            $this->assign('list',$list);
            $this->display();
        }
    }
    public function del(){
        $Article = M('Article');
        if($Article->where('id="'.$_GET['id'].'"')->delete()){
            $this->success('文章删除成功',U('Article/Index'));
        }
        else{
            $this->error('文章删除失败');
        }
    }
    public function edit(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        $Article = M('Article');
        $id=(int)$_GET['id'];
        $list=$Article->where("id=$id")->find();
        $this->assign('vo',$list);
        $this->assign('title','显示用户编辑信息');
        $this->display();
    }
    public function update(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        $Article = M('Article');
        if($Article->create()){
            $result =   $Article->save();
            if($result){
                $this->success('操作成功！');
            }
            else{
                $this->error('操作失败!请作出修改!若有疑问请联系技术部');
            }
        }else{
            $this->error($Article->getError());
        }
    }


}