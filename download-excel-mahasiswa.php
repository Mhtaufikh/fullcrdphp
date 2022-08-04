<?php
// session_start();
// //membatasi halaman sebelum login
// if(!isset($_SESSION['login'])){
//     echo "<script>
//     alert('login masse');
//         document.location.href = 'login.php';        
//     </script>";
//     exit;
// } 
// if ($_SESSION["level"] != 1 and $_SESSION["level"] != 3){
//     echo "<script>
//     alert('anda tidak punya hak akses kesini');
//     document.location.href = 'modal.php';
//     </script>";
//     exit;
// }


require 'vendor/autoload.php';



use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A2', 'No');
$sheet->setCellValue('B2', 'Nama');
$sheet->setCellValue('C2', 'Program Study');
$sheet->setCellValue('D2', 'Jenis Kelamin');
$sheet->setCellValue('E2', 'Telepon');
$sheet->setCellValue('F2', 'Email');
$sheet->setCellValue('G2', 'Foto');

// $datamhs = select("SELECT * FROM tb_mhs");

// $no = 1;
// $start = 3;

// foreach ($datamhs as $mahasiswa) {
//     $sheet->setCellValue('A' . $start, $no++);
//     $sheet->setCellValue('B' . $start, $mahasiswa['nama']);
// }

$writer = new Xlsx($spreadsheet);
$writer->save('data mhs.xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
header('Content-Disposition: attachment;filename="data mhs.xlsx"');
readfile('data mhs.xlsx');
unlink('data mhs.xlsx');

exit;

// $writer = new Xlsx($spreadsheet);
// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
// header('Content-Disposition: attachment; filename="datamhs.xlsx"');
// $writer->save('php://output');

// //$sheet->setCellValue('A2', 'No');
// $sheet->setCellValue('B2', 'Nama');
// $sheet->setCellValue('C2', 'Program Study');
// $sheet->setCellValue('D2', 'Jenis Kelamin');
// $sheet->setCellValue('E2', 'Telepon');
// $sheet->setCellValue('F2', 'Email');
// $sheet->setCellValue('G2', 'Foto');