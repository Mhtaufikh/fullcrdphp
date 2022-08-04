<?php   
session_start();
include 'config/app.php';
//menerima id barang yang dipilih pengguna

$id_barang = (int)$_GET['id_barang'];

if(delete_brg($id_barang) > 0){
    echo "<script>
        alert('data barang berhasil dihapus');
        document.location.href = 'index.php';
    </script>";
}else{
    echo "<script>
    alert('data barang gagal dihapus');
    document.location.href = 'index.php';
    </script>";
}