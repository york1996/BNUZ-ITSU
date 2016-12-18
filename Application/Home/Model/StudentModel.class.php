<?php
namespace Home\Model;
use Think\Model;
class StudentModel extends Model {
    protected $_validate = array(
        array('name', 'require', '姓名不能为空！'), //默认情况下用正则进行验证
        array('id', 'require', '学号不能为空！'), //默认情况下用正则进行验证
        array('id', '', '该学号已添加！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
    );
    protected $_auto = array (
        array('password', 'md5', 3, 'function') , // 对password字段在新增和编辑的时候使md5函数处理
    );
}