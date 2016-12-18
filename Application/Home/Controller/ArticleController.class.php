<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/3/15
 * Time: 13:11
 */

namespace Home\Controller;
use Think\Controller;

class ArticleController extends Controller{
    public function index(){
        $Article = M('Article');
        $list=$Article->select();
        $this->assign('vo',$list);
        $this->display();
    }

    public function postlist(){
        $Article=M('Article');
        $count      = $Article->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Article->order('create_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function classify(){
        $classify=$_GET['id'];
        $Article = M('Article'); // 实例化User对象
        $count      = $Article->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        if($_GET['id']==null){
            $list = $Article->order('create_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        }else{
            $list = $Article->where("classify=$classify")->order('create_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        }
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function read($id=0){
        $Article=M('Article');
        $list=$Article->where("id=$id")->find();
        $this->assign('vo',$list);
        $this->display();

    }


}