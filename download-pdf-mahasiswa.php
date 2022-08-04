<?php   
require __DIR__.'/vendor/autoload.php';
require 'config/app.php';

use Spipu\Html2Pdf\Html2Pdf;

$databrg   =  select("SELECT * from tb_mhs");



$content .= '<style types="text/css">
    .gambar {
        width: 100px;
    }
</style>';


$content .= '

<page>
<h1 class="text-center">Informasi data semua karyawan</h1>
    <table border="2" align="center">
        <tr>
            <th>NO</th>
            <th>Nama</th>
            <th>Progran Study</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Foto</th>
        </tr>';

        $no = 1;
        foreach ($datamhs as $mhs){
            $content .=' 
                <tr>
                    <td>'.$no++.'</td>
                    <td>'.$mhs['nama'].'</td>
                    <td>'.$mhs['prodi'].'</td>
                    <td>'.$mhs['jk'].'</td>
                    <td>'.$mhs['no_tlp'].'</td>
                    <td>'.$mhs['email'].'</td>
                    <td><img src="assets/img/'.$mhs['foto'].'" class="gambar"></td>
                   
                  
                
                    
                </tr>
            ';
        }

$content .='
    </table>
</page>';

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML($content);
ob_start();
$html2pdf->output('laporan-mahasiswa.pdf');