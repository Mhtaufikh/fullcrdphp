<?php
session_start();
if(!isset($_SESSION['login'])){ echo "<script> alert('login masse');document.location.href = 'login.php';</script>"; exit;
}
include 'layout/header.php';

///mengambil id barang dari url
$id_barang = (int)$_GET['id_barang'];

$barang = select("SELECT * FROM tb_barang WHERE id_barang = $id_barang")[0];

//mengecek apakah tombol tambah ditekan (alert)
if(isset($_POST['ubah'])){
    if (update_barang($_POST) > 0){
        echo "<script>
        alert('Data barang berhasil Diubah');
        document.location.href = 'index.php'; 
        </script>";
    } else
    echo "<script>
        alert('Data barang gagal Diubah');
        document.location.href = 'index.php'; 
        </script>";
}
?>

    <div class="container mt-5">
        <h1> Ubah Data Barang</h1>
        <form action="" method="post">
            <input type="hidden" name="id_barang" value="<?= $barang['id_barang'];?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $barang['nama']; ?>" placeholder="Masukan nama barang" 
                 required
                >
        </div>

        <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $barang['jumlah'];?>" placeholder="Masukan Jumlah" required
                required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <div class="mb-3">
                <label for="harga" class="form-label">harga Barang</label>
                <input type="number" class="form-control" id="harga" name="harga" value="<?= $barang['harga'];?>"  placeholder="Masukan harga" required 
                oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float: right"> ubah</button>
    </form>

    </div>
<?php include 'layout/footer.php'; 
?>