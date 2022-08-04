<?php
session_start();
if(!isset($_SESSION['login'])){ echo "<script> alert('login masse');document.location.href = 'login.php';</script>"; exit;
}
include 'layout/header.php';

///mengambil id barang dari url
$id_mhs = (int)$_GET['id_mhs'];

$mhs = select("SELECT * FROM tb_mhs WHERE id_mhs = $id_mhs")[0];

//mengecek apakah tombol tambah ditekan (alert)
if(isset($_POST['ubah'])){
    if (update_mhs($_POST) > 0){
        echo "<script>
        alert('Data mhs berhasil Diubah');
        document.location.href = 'mahasiswa.php'; 
        </script>";
    } else
    echo "<script>
        alert('Data mhs gagal Diubah');
        document.location.href = 'mahasiswa.php'; 
        </script>";
}
?>

    <div class="container mt-5">
        <h1> Ubah Data Mahasiswa</h1>
        <form action="" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name="id_mhs" value="<?= $mhs['id_mhs'];?>">
        <input type="hidden" name="fotolama" value="<?= $mhs['foto'];?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs['nama'];?>" placeholder="Masukan nama Mahasiswa" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" >
        </div>
         <div class="row">
            <div class="mb-3 col-5">
                <label for="prodi" class="form-label">Program Study</label>
               <select name="prodi" value="<?= $mhs['prodi'];?>" id="prodi" class="form-control" required>
               <?php $prodi = $mhs['prodi'];?>
               <option value="Pyscology"<?= $prodi == 'Psycology' ? 'selected':null ?>>Pyscology</option>
               <option value="Managemen"<?= $prodi == 'Managemen' ? 'selected':null ?>>Managemen</option>
               <option value="Informatika"<?= $prodi == 'Informatika' ? 'selected':null ?>>Informatika</option>
               </select>
            </div>
            <div class="mb-3 col-6">
                <label for="jk" class="form-label">Jenis Kelamin</label>
               <select name="jk" <?= $mhs['jk'];?> id="jk" class="form-control" required>
               <?php $jk = $mhs['jk'];?>
                <option value="Laki-laki"<?=$jk == 'Laki-laki' ? 'selected' :null?> >Laki-laki</option>
                <option value="Perempuan"<?=$jk == 'Perempuan' ? 'selected' :null?> >Perempuan</option>
               </select>
            </div>
         </div>
    

        <div class="mb-3">
                <label for="no_tlp" class="form-label">No Telepon</label>
                <input type="number" class="form-control" id="no_tlp" name="no_tlp" value="<?= $mhs['no_tlp'];?>" placeholder="Masukan No Telepon" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        
        <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $mhs['email'];?>" placeholder="Masukan Email" required
                required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
        
        <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                
                <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukan foto" onchange="previewImg()" >
                <p></p>
                <p>
                    <img src="assets/img/<?= $mhs['foto']?>" alt="" class="img-thumbnail img-preview mt-2" width="50px">
                    <P><small>Gambar sebelumnya</small></P>
                </p>
        </div>

        <button type="submit" name="ubah" class="btn btn-primary" style="float: right">Ubah</button>
    </form>

    </div>
      <!-- ==============PREVIEW FOTO==============-->
      <script> 
    function previewImg(){
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const filefoto = new FileReader();
        filefoto.readAsDataURL(foto.files[0]);

        filefoto.onload = function(e){
            imgPreview.src = e.target.result; 
        }
    }

     </script>
<?php include 'layout/footer.php'; 
?>