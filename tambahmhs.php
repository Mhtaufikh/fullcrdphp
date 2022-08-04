<?php
session_start();
if(!isset($_SESSION['login'])){ echo "<script> alert('login masse');document.location.href = 'login.php';</script>"; exit;
}
include 'layout/header.php';
$title = 'Tambah Mahasiswa';


if(isset($_POST['tambah'])){
    if (create_mhs($_POST) > 0){
        echo "<script>
        alert('Data Mahasiswa berhasil Ditambahkan');
        document.location.href = 'mahasiswa.php'; 
        </script>";
    } else
    echo "<script>
        alert('Data Mahasiswa gagal Ditambahkan');
        document.location.href = 'mahasiswa.php'; 
        </script>";
}
?>

    <div class="container mt-5">
        <h1> Tambah Data Mahasiswa</h1>
        <hr>
        <!--enctype="multipart/form-data ->untuk menggungah sebuah file -->
        <form action="" method="post" enctype="multipart/form-data"> 
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama Mahasiswa" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" >
        </div>
         <div class="row">
            <div class="mb-3 col-5">
                <label for="prodi" class="form-label">Program Study</label>
               <select name="prodi" id="prodi" class="form-control" required>
                <option value="">----Pilih Prodi----</option>
                <option value="Informatika">Informatika</option>
                <option value="Pyscology">Pyscology</option>
                <option value="Managemen">Managemen</option>
               </select>
            </div>
            <div class="mb-3 col-6">
                <label for="jk" class="form-label">Jenis Kelamin</label>
               <select name="jk" id="jk" class="form-control" required>
                <option value="">----Pilih Jenis Kelamin----</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
               </select>
            </div>
         </div>
    

        <div class="mb-3">
                <label for="no_tlp" class="form-label">No Telepon</label>
                <input type="number" class="form-control" id="no_tlp" name="no_tlp" placeholder="Masukan No Telepon" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        
        <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email" required
                required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
        
        <div class="mb-3">
                <label for="foto" class="form-label">FOTO</label>
                <div class="mb-2">
                <img src="" alt="" class="img-thumbnail img-preview mt-2" width="200px">
                </div>
                <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukan foto" onchange="previewImg()">

                
        </div>

        <button type="submit" name="tambah" class="btn btn-primary" style="float: right">tambah</button>
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