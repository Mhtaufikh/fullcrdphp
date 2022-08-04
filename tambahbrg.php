<?php
session_start();

if(!isset($_SESSION['login'])){ echo "<script> alert('login masse');document.location.href = 'login.php';</script>"; exit;
}
include 'layout/header.php';
//membatasi halaman sebelum login
if(!isset($_SESSION['login'])){
    echo "<script>
    alert('login masse');
        document.location.href = 'login.php';        
    </script>";
    exit;
}

if(isset($_POST['tambah'])){
    if (create_barang($_POST) > 0){
        echo "<script>
        alert('Data barang berhasil Ditambahkan');
        document.location.href = 'index.php'; 
        </script>";
    } else
    echo "<script>
        alert('Data barang gagal Ditambahkan');
        document.location.href = 'index.php'; 
        </script>";
}
?>

    <div class="container mt-5">
        <h1> Tambah Data Barang</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label"><i class="fas fa-ballot"></i>Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama barang" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" >
        </div>

        <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan Jumlah" required
                required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <div class="mb-3">
                <label for="harga" class="form-label">harga Barang</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukan harga" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <button type="submit" name="tambah" class="btn btn-primary" style="float: right">tambah</button>
    </form>

    </div>
<?php include 'layout/footer.php'; 
?>