<?php  

//render data di halaman jadi json 
header('Content-Type: application/json');
    require '../config/app.php';

    //menerima request put/delete
parse_str(file_get_contents('php://input'), $delete);

//Menerima input id data yang akan dihapus
$id_barang = $delete['id_barang'];

//QUERY HAPUS DATA
$query = "DELETE FROM tb_barang WHERE id_barang = $id_barang"; 
mysqli_query($db, $query);
//cek status data
if ($query) {
    echo json_encode(['pesan' => 'Data barang berhasil di Hapus']);
}else{
    echo json_encode(['pesan' => 'Data barang gagal di Hapus']);
}

