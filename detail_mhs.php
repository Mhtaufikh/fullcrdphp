<?php   
session_start();
//membatasi halaman sebelum login
if(!isset($_SESSION['login'])){ echo "<script> alert('login masse');document.location.href = 'login.php';</script>"; exit;
}
    include "layout/header.php";

    $title = "daftar mahasisawa";

    //mengaambil id mahasiswa dari url
    $id_mhs = (int)$_GET['id_mhs'];

    //menampilkan data mahasiswa
    $datamhs = select("SELECT * FROM tb_mhs WHERE id_mhs = $id_mhs")[0];

?>

<div class="container mt-5">
          <div class="col-lg-12">
            <h1 class="text-center">Detail data mahasiswa ciamis</h1>
           
</div>
        </div>
    <div class="row">
          <div class="col-lg-12">
              <div  class="table-responsive">
        <div class="container mt-3"> 
                    <div class="container-fluid">
                        <h1>
                            <marquee behavior="alternate" direction="right"> Hallo <?= $datamhs['nama']; ?> Semoga Sukses </marquee></h1>
                        </div>
                   
                    
                <table class="table table-boardered table-hover table-striped mt-5">
            <tr>
                <td>Nama</td>
                <td>: <?= $datamhs['nama'];?></td>
            </tr>
            <tr>
                <td>Program studi</td>
                <td>: <?= $datamhs['prodi'];?></td>
            </tr>
            <tr>
                <td>Jenis kelamin</td>
                <td>: <?= $datamhs['jk'];?></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td>: <?= $datamhs['no_tlp'];?></td>
            </tr>
            <tr>
                <td>email</td>
                <td>: <?= $datamhs['email'];?></td>
            </tr>
            <tr>
                <td width="50%">foto</td>
                <td>
                    <a href="assets/img/<?= $datamhs['foto'];?>">
                    <img src="assets/img/<?= $datamhs['foto'];?>" alt="foto" width="50%">
                    <p><small>klik foto untuk lebih besar</small></p>
                 
                    </a>
                </td>
            </tr>
        
    </table>
    <a href="mahasiswa.php" class="btn btn-secondary primary" style="float:right">Back</a>
    <div>


    </div>
    </div>

<?php   
    include "layout/footer.php";
?>