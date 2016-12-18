<?php
/**
 * Created by PhpStorm.
 * User: York
 * Date: 16/3/11
 * Time: 12:03
 */

namespace Admin\Controller;
use Think\Controller;

class TccController extends Controller{
    public function index(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        $vote = M('fwsc');
        $count      = $vote->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $vote->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }

    public function add(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        $vote = M('fwsc');
        if(IS_POST){
            if ($vote->create()) {
                $result = $vote->add();
                if ($result) {
                    $this->success('添加成功',U('Tcc/Index'));
                } else {
                    $this->error('添加失败');
                }
            } else {
                $this->error($vote->getError());
            }
        }else{
            $this->display();
        }
    }

    public function addtc($id=0){
        $Form   =   M('tcc');
        $kjxs = M('fwsc');
        $list = $Form->where("classify=$id")->select();
        $k =  $kjxs->where("id=$id")->find();
        $this->assign('voo',$k);
        $this->assign('list',$list);
        $this->display();
    }

    public function addinfo(){
        define('UID',is_login());
        if( !UID ){// 还没登录 跳转到登录页面
            $this->redirect('Public/login');
        }
        $voting=M('tcc');
        if(IS_POST){
            if ($voting->create()) {
                $result = $voting->add();
                if ($result) {
                    $this->success('添加成功');
                } else {
                    $this->error('添加失败');
                }
            } else {
                $this->error($voting->getError());
            }
        }
    }

    public function del($id=0){
        $vote=M('fwsc');
        $voting=M('tcc');
        if($vote->where("id=$id")->delete()){
            $voting->where("classify=$id")->delete();
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }
    public function delinfo($tid=0){
        $voting=M('tcc');
        if($voting->where("tid='$tid'")->delete()){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }
//Excel导入
    public function excel_runimport(){
        import("Org.Util.PHPExcel");
        $PHPExcel=new \PHPExcel();
        import("Org.Util.PHPExcel.Reader.Excel5");

        if (! empty ( $_FILES ['file_stu'] ['name'] ))
        {
            $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
            $file_types = explode ( ".", $_FILES ['file_stu'] ['name'] );
            $file_type = $file_types [count ( $file_types ) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower ( $file_type ) != "xls")
            {
                $this->error ( '不是Excel文件，重新上传' );
            }
            /*设置上传路径*/
            $savePath = './Uploads/';
            /*以时间来命名上传的文件*/
            $str = date ( 'Ymdhis' );
            $file_name = $str . "." . $file_type;
            /*是否上传成功*/
            if (! copy ( $tmp_file, $savePath . $file_name ))
            {
                $this->error ( '上传失败' );
            }
            /*
              *对上传的Excel数据进行处理生成编程数据,这个函数会在下面第三步的ExcelToArray类中

             注意：这里调用执行了第三步类里面的read函数，把Excel转化为数组并返回给$res,再进行数据库写入
            */
            $res = $this->read ( $savePath . $file_name );
            /*
              重要代码 解决Thinkphp M、D方法不能调用的问题
              如果在thinkphp中遇到M 、D方法失效时就加入下面一句代码
            */
            //spl_autoload_register ( array ('Think', 'autoload' ) );
            /*对生成的数组进行数据库的写入*/
            foreach ( $res as $k => $v )
            {
                if ($k != 0)
                {
                    $data ['id'] = $v [0];
                    $data ['name'] = $v [1];
                    $data ['score'] = $v [2];
                    $data ['title'] = $_POST['title'];
                    $data ['classify'] = $_POST['classify'];
                    $result = M ( 'tcc' )->add ( $data );
                    if (!$result){
                        $this->error ('导入数据库失败');
                    }
                }
            }
            $this->success ('导入数据库成功');
        }
    }

    public function read($filename,$encode='utf-8'){
        $objReader = \PHPExcel_IOFactory::createReader(Excel5);
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($filename);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
        $excelData = array();
        for ($row = 1; $row <= $highestRow; $row++) {
            for ($col = 0; $col < $highestColumnIndex; $col++) {
                $excelData[$row][] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
            }
        }
        return $excelData;
    }

    //导出
    public function excel_runexport(){
        $id = $_POST['id'];
        $map['id'] = array('like',"$id%");
        $data= M('tcc')->where($map)->group('id')->select();

        import("Org.Util.PHPExcel");
        error_reporting(E_ALL);
        date_default_timezone_set('Europe/London');
        $objPHPExcel = new \PHPExcel();
        import("Org.Util.PHPExcel.Reader.Excel5");
        /*设置excel的属性*/
        $objPHPExcel->getProperties()->setCreator("itsu")//创建人
        ->setLastModifiedBy("itsu")//最后修改人
        ->setTitle("数据EXCEL导出")//标题
        ->setSubject("数据EXCEL导出")//题目
        ->setDescription("功能示例")//描述
        ->setKeywords("excel")//关键字
        ->setCategory("result file");//种类

        //第一行数据
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '学号')
            ->setCellValue('B1','姓名')
            ->setCellValue('C1', '总分');

        foreach($data as $k => $v){
            $k=$k+1;
            $num=$k+1;//数据从第二行开始录入
            $id = $v['id'];

            $objPHPExcel->setActiveSheetIndex(0)
                //Excel的第A列，uid是你查出数组的键值，下面以此类推
                ->setCellValue('A'.$num, $v['id'])
                ->setCellValue('B'.$num, $v['name'])
                ->setCellValue('C'.$num, M('tcc')->where("id=$id")->sum('score'));

        }
        $objPHPExcel->getActiveSheet()->setTitle('User');
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.time().'.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }
}