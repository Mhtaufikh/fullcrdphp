<?php  

//render data di halaman jadi json 
header('Content-Type: application/json');
    require '../config/app.php';

    // menerima input
$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
$harga = $_POST['harga'];

//validasi data
if ($nama == null) {
    echo json_encode(['pesan' => 'Nama Barang tidak boleh kosong']);
    exit;
}
//QUERY TAMBAH DATA
$query = "INSERT INTO tb_barang VALUES(null,'$nama','$jumlah','$harga',CURRENT_TIMESTAMP())";
mysqli_query($db, $query);
//cek status data
if ($query) {
    echo json_encode(['pesan' => 'Data barang berhasil ditambah']);
}else{
    echo json_encode(['pesan' => 'Data barang gagal ditambah']);
}

