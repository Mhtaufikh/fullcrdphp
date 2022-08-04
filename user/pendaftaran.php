<?php
session_start();
include '../config/app.php';

if(isset($_POST['tambah'])){
  if (daftar_mhs($_POST) > 0){
      echo "<script>
      alert('Data Mahasiswa berhasil Ditambahkan');
      document.location.href = 'pendaftaran.php'; 
      </script>";
  } else
  echo "<script>
      alert('Data Mahasiswa gagal Ditambahkan');
      document.location.href = 'pendaftaran.php'; 
      </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Document</title>
</head>
<body class="bg-light">
  <nav  class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top"  >
  <div class="container-fluid ">
    <a class="navbar-brand" href="Pendaftaran.php"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link li-gaya" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link li-gaya" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link li-gaya" href="#">Pendaftaran</a>
          
        </li>
        <li>
        
    <div class="container text-light text-center">
        <a href="../login.php" class="btn li-gaya square-btn-adjust text-light" onclick="return confirm('yakin ingin keluar.?')">Keluar</a></div>
        </li>
      </ul>
  </div>
</nav>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="image/mhs.jpg" class="d-block w-100" alt="" style="height: 350px "  />
            <div class="carousel-caption text-light">
              <h5>✨ <span style="color: rgb(202, 5, 5)"> Universitas Ternama </span> ✨</h5>
              <p>Menikmati Keindahan Belajar dengan konsep alam.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="image/mhs2.jpg" class="d-block w-100" alt="" style="height: 350px" />
            <div class="carousel-caption text-light">
              <h5>✨ <span style="color: rgb(202, 5, 5)"> Fasilitas Mewah</span> ✨</h5>
              <p>Menikmati Fasilitas yang super mewah.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="image/wisuda.jpg" class="d-block w-100" alt="" style="height: 350px" />
            <div class="carousel-caption text-light">
              <h5>✨ <span style="color: rgb(202, 5, 5)"> Pangandaran </span> ✨</h5>
              <p>Menikmati Keindahan Panatai di Cianjur Selatan.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="container-fluid text-light mb-4" style="height: 20vh">
      </div>

      <div class="container mt-2">
        <h1> Daftar Calon Mahasiswa Baru</h1>
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
    

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>


