<?php
require_once './Classes/PHPExcel.php';
include './Classes/PHPExcel/Writer/Excel2007.php';
if(isset($_POST["submitBtn"]))
{
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Ayah Alrifai")
               ->setLastModifiedBy("Ayah Alrifai")
               ->setTitle("student Registered")
               ->setSubject("student's Personal Data")
               ->setDescription("all students registerd in this section")
               ->setKeywords("")
               ->setCategory("");

$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->setTitle('student Registered');

$objPHPExcel->getActiveSheet()->setCellValue('A1', 'symbol')
                              ->setCellValue('B1', 'name')
                              ->setCellValue('C1', 'section')
                              ->setCellValue('D1', 'day')
                              ->setCellValue('E1', 'time')
                              ->setCellValue('F1', 'hall')
                              ->setCellValue('G1', 'Registered')
                              ->setCellValue('H1', 'Capacity');
$con=mysqli_connect("localhost","root","HaYa.IaFiRlA.79","labs_registration_system");
if(!$con)
  die("not connected".mysqli_connect_error());
$sql="SELECT lab.*,hall.Capacity FROM lab LEFT JOIN hall ON lab.hall = hall.hallName order by lab.symbol,lab.section";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0)
{
   $i = 2;
   while($row = mysqli_fetch_object($res)) {
    $objPHPExcel->getActiveSheet()->setCellValue('A'.($i), $row->symbol)
                                  ->setCellValue('B'.($i), $row->name)
                                  ->setCellValue('C'.($i), $row->section)
                                  ->setCellValue('D'.($i), $row->day)
                                  ->setCellValue('E'.($i), $row->time)
                                  ->setCellValue('F'.($i), $row->hall)
                                  ->setCellValue('G'.($i), $row->Registered)
                                  ->setCellValue('H'.($i), $row->Capacity);
      $i++;
   }
}

$filename = date('d-m-Y_H-i-s').".xlsx";
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//if you want to save the file on the server instead of downloading,
//comment the last 3 lines and remove the comment from the next line
//$objWriter->save(str_replace('.php', '.xlsx', $filename));
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=file.xls");
header("Content-Transfer-Encoding: binary ");
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
$objWriter->setOffice2003Compatibility(true);
$objWriter->save("php://output");
}
?>
