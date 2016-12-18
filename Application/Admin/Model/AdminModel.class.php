<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model {
    protected $_validate = array(
        array('username', 'require', '用户名不能为空！'), //默认情况下用正则进行验证
        array('nickname', 'require', '昵称不能为空！'), //默认情况下用正则进行验证
        array('username', '', '该用户名已添加！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
    );
    protected $_auto = array (
        array('password', 'md5', 3, 'function') , // 对password字段在新增和编辑的时候使md5函数处理
    );
}