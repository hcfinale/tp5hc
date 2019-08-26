<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
//寮曞叆phpexecl鐗堟湰锛屾搷浣渆xecl琛?
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use think\console\Input;
// use app\admin\model\Column as ColumnModel;
class Excel extends Common
{
    private  $reader;
    public function __construct(){
        parent::__construct();
        $this->reader = new Xlsx();
    }

    public function index(){
        /**
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'id缂栧彿');
        $sheet->setCellValue('B1', '濮撳悕');
        $sheet->setCellValue('C1', '鎵嬫満鍙风爜');
        $sheet->setCellValue('D1', '鏉ユ簮');
        $sheet->setCellValue('E1', '鏉ユ簮ip');
        $sheet->setCellValue('F1', '鍏ュ簱鏃堕棿');
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.'淇℃伅'.'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        **/
        $inputFileName = 'one.xlsx';
        $excel = $this->reader->load($inputFileName);
        $sheet = $excel->getSheet(0);
        $row_num = $sheet->getHighestRow();
        $col_num = $sheet->getHighestColumn();
     
        $data = [];
        for($col='A';$col<=$col_num;$col++)
        {
            for($row=2;$row<=$row_num;$row++)
            {
                $data[$row-2][] = $sheet->getCell($col.$row)->getValue();
            }
        }
        $sdata = [];
        $java_dj = [];
        $java_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "Java")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $java_dj[] = $sdata[$y][4];
            $java_xf[] = $sdata[$y][5];
        }
        $java_dj = array_sum($java_dj);
        $java_xf = array_sum($java_xf);
        $sdata = [];
        $web_dj = [];
        $web_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "Web")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $web_dj[] = $sdata[$y][4];
            $web_xf[] = $sdata[$y][5];
        }
        $web_dj = array_sum($web_dj);
        $web_xf = array_sum($web_xf);
        $sdata = [];
        $ui_dj = [];
        $ui_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "UI")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $ui_dj[] = $sdata[$y][4];
            $ui_xf[] = $sdata[$y][5];
        }
        $ui_dj = array_sum($ui_dj);
        $ui_xf = array_sum($ui_xf);
        $sdata = [];
        $python_dj = [];
        $python_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "Python")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $python_dj[] = $sdata[$y][4];
            $python_xf[] = $sdata[$y][5];
        }
        $python_dj = array_sum($python_dj);
        $python_xf = array_sum($python_xf);
        $sdata = [];
        $accd_dj = [];
        $accd_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "ACCD")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $accd_dj[] = $sdata[$y][4];
            $accd_xf[] = $sdata[$y][5];
        }
        $accd_dj = array_sum($accd_dj);
        $accd_xf = array_sum($accd_xf);
        $sdata = [];
        $redhat_dj = [];
        $redhat_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "红帽")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $redhat_dj[] = $sdata[$y][4];
            $redhat_xf[] = $sdata[$y][5];
        }
        $redhat_dj = array_sum($redhat_dj);
        $redhat_xf = array_sum($redhat_xf);
        $sdata = [];
        $huawei_dj = [];
        $huawei_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "华为")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $huawei_dj[] = $sdata[$y][4];
            $huawei_xf[] = $sdata[$y][5];
        }
        $huawei_dj = array_sum($huawei_dj);
        $huawei_xf = array_sum($huawei_xf);
        $sdata = [];
        $it_dj = [];
        $it_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "it")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $it_dj[] = $sdata[$y][4];
            $it_xf[] = $sdata[$y][5];
        }
        $it_dj = array_sum($it_dj);
        $it_xf = array_sum($it_xf);
        $sdata = [];
        $ywei_dj = [];
        $ywei_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "运维")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $ywei_dj[] = $sdata[$y][4];
            $ywei_xf[] = $sdata[$y][5];
        }
        $ywei_dj = array_sum($ywei_dj);
        $ywei_xf = array_sum($ywei_xf);
        $sdata = [];
        $oracle_dj = [];
        $oracle_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "Oracle")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $oracle_dj[] = $sdata[$y][4];
            $oracle_xf[] = $sdata[$y][5];
        }
        $oracle_dj = array_sum($oracle_dj);
        $oracle_xf = array_sum($oracle_xf);
        $sdata = [];
        $cisco_dj = [];
        $cisco_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "思科")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $cisco_dj[] = $sdata[$y][4];
            $cisco_xf[] = $sdata[$y][5];
        }
        $cisco_dj = array_sum($cisco_dj);
        $cisco_xf = array_sum($cisco_xf);
        $sdata = [];
        $dshou_dj = [];
        $dshou_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "对手")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $dshou_dj[] = $sdata[$y][4];
            $dshou_xf[] = $sdata[$y][5];
        }
        $dshou_dj = array_sum($dshou_dj);
        $dshou_xf = array_sum($dshou_xf);
        $sdata = [];
        $ppai_dj = [];
        $ppai_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "品牌")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $ppai_dj[] = $sdata[$y][4];
            $ppai_xf[] = $sdata[$y][5];
        }
        $ppai_dj = array_sum($ppai_dj);
        $ppai_xf = array_sum($ppai_xf);
        $sdata = [];
        $bigdata_dj = [];
        $bigdata_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "大数据")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $bigdata_dj[] = $sdata[$y][4];
            $bigdata_xf[] = $sdata[$y][5];
        }
        $bigdata_dj = array_sum($bigdata_dj);
        $bigdata_xf = array_sum($bigdata_xf);
        $sdata = [];
        $android_dj = [];
        $android_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "安卓")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $android_dj[] = $sdata[$y][4];
            $android_xf[] = $sdata[$y][5];
        }
        $android_dj = array_sum($android_dj);
        $android_xf = array_sum($android_xf);
        $sdata = [];
        $jpin_dj = [];
        $jpin_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "竞品")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $jpin_dj[] = $sdata[$y][4];
            $jpin_xf[] = $sdata[$y][5];
        }
        $jpin_dj = array_sum($jpin_dj);
        $jpin_xf = array_sum($jpin_xf);
        //软件测试
        $sdata = [];
        $rjcshi_dj = [];
        $rjcshi_xf = [];
        for ($i=0; $i < count($data); $i++) {
            $str = $data[$i][1];
            if (stristr($str, "软件测试")) {
                $sdata[] = $data[$i];
            }
        }
        for ($y=0; $y < count($sdata); $y++) { 
            $rjcshi_dj[] = $sdata[$y][4];
            $rjcshi_xf[] = $sdata[$y][5];
        }
        $rjcshi_dj = array_sum($rjcshi_dj);
        $rjcshi_xf = array_sum($rjcshi_xf);
        echo "<pre>";
        echo "java点击".$java_dj."<br />"."java消费".$java_xf."<br /><br />";
        echo "ui点击".$ui_dj."<br />"."ui消费".$ui_xf."<br /><br />";
        echo "Web点击".$web_dj."<br />"."Web消费".$web_xf."<br /><br />";
        echo "python点击".$python_dj."<br />"."python消费".$python_xf."<br /><br />";
        echo "ACCD点击".$accd_dj."<br />"."ACCD消费".$accd_xf."<br /><br />";
        echo "安卓点击".$android_dj."<br />"."安卓消费".$android_xf."<br /><br />";
        echo "大数据点击".$bigdata_dj."<br />"."大数据消费".$bigdata_xf."<br /><br />";
        echo "运维点击".$ywei_dj."<br />"."运维消费".$ywei_xf."<br /><br />";
        echo "思科点击".$cisco_dj."<br />"."思科消费".$cisco_xf."<br /><br />";
        echo "华为点击".$huawei_dj."<br />"."华为消费".$huawei_xf."<br /><br />";
        echo "Oracle点击".$oracle_dj."<br />"."Oracle消费".$oracle_xf."<br /><br />";
        echo "红帽点击".$redhat_dj."<br />"."红帽消费".$redhat_xf."<br /><br />";
        echo "品牌点击".$ppai_dj."<br />"."品牌消费".$ppai_xf."<br /><br />";
        echo "对手点击".$dshou_dj."<br />"."对手消费".$dshou_xf."<br /><br />";
        echo "竞品点击".$jpin_dj."<br />"."竞品消费".$jpin_xf."<br /><br />";
        echo "it点击".$it_dj."<br />"."it消费".$it_xf."<br /><br />";
        echo "软件测试点击".$rjcshi_dj."<br />"."软件测试消费".$rjcshi_xf."<br /><br />";
        // var_dump($sdata);
        echo "</pre>";
        //dump($data);
    }
    public function search(){
        $html =<<<str
        <form action="/index/excel/search" method="get">
        <label>名称</label><input type="text" name="kcmc" />
        <input  type="submit" value="查询详细信息" />
        </form>
str;
        echo $html;
        if (input('?get.kcmc')) {
            $shuju = input('get.kcmc');
            echo "查询详细信息&nbsp;".$shuju;
            $inputFileName = 'one.xlsx';
            $excel = $this->reader->load($inputFileName);
            $sheet = $excel->getSheet(0);
            $row_num = $sheet->getHighestRow();
            $col_num = $sheet->getHighestColumn();
            $data = [];
            for($col='A';$col<=$col_num;$col++)
            {
                for($row=2;$row<=$row_num;$row++)
                {
                    $data[$row-2][] = $sheet->getCell($col.$row)->getValue();
                }
            }
            $sdata = [];
            $get_dj = [];
            $get_xf = [];
            for ($i=0; $i < count($data); $i++) {
                $str = $data[$i][1];
                if (stristr($str, $shuju)) {
                    $sdata[] = $data[$i];
                }
            }
            for ($y=0; $y < count($sdata); $y++) { 
                $get_dj[] = $sdata[$y][4];
                $get_xf[] = $sdata[$y][5];
            }
            $get_dj = array_sum($get_dj);
            $get_xf = array_sum($get_xf);
            
            echo "<pre>";
            echo "<strong>".$shuju."</strong>消费<span style='color:block;font-weight:bold;'>&nbsp;&nbsp;&nbsp;&nbsp;".$get_dj."</span>&nbsp;&nbsp;&nbsp;&nbsp;人民币<br /><strong>".$shuju."</strong>点击<span style='color:block;font-weight:bold;'>&nbsp;&nbsp;&nbsp;&nbsp;".$get_xf."</span>&nbsp;&nbsp;&nbsp;&nbsp;次<br />";
            // var_dump($sdata);
            echo "</pre>";
            //dump($data);
        }
    }
    public function hehe(){
        return $this->getClassName();
    }
    /**
     * 创建随机数
     * Power by Mikkle
     * QQ:776329498
     * @param int $num  随机数位数
     * @return string
     */
    public function builderRand($num=8){
        return substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, $num);
    }
}