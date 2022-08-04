<?php   
session_start();
include 'config/app.php';
//menerima id barang yang dipilih pengguna

$id_mhs = (int)$_GET['id_mhs'];

if(delete_mhs($id_mhs) > 0){
    echo "<script>
        alert('data mahasiswa berhasil dihapus');
        document.location.href = 'mahasiswa.php';
    </script>";
}else{
    echo "<script>
    alert('data mahasiswa gagal dihapus');
    document.location.href = 'mahasiswa.php';
    </script>";
}