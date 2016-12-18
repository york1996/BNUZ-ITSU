<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/7/27
 * Time: 16:31
 */
namespace Home\Controller;
use Think\Controller;

class ActivityController extends Controller{
    public function index(){
        if(!$_SESSION['id']){// 还没登录 跳转到登录页面
            $this->error("请先登录,即将为你跳入登录页面",U('Index/login'));
        }
        $Active = M('Active'); // 实例化User对象
        $count      = $Active->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Active->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('now',NOW_TIME);
        $this->display(); // 输出模板
    }

    public function sign(){
        $tc=M('signup');
        $classify=$data['classify']=$_POST['classify'];
        $id = $data['id']=$_POST['id'];
        $data['name'] = $_POST['name'];
        $data['major']=$_POST['major'];
        $data['mobile']=$_POST['mobile'];
        $data['content']=$_POST['content'];
        $data['qq'] = $_POST['qq'];
        if($tc->where("id='$id' AND classify=$classify")->select()){
            $this->error('您已经报过名啦~请不要重复报名~',U('Activity/Index'));
        }
        if(IS_POST){
            if ($tc->create($data)) {
                $result = $tc->add($data);
                if ($result) {
                    $this->success('报名成功',U('Activity/Index'));
                } else {
                    $this->error('报名失败');
                }
            } else {
                $this->error($tc->getError());
            }
        }
    }
}