<?php  
session_start();
//membatasi halaman sebelum login
if(!isset($_SESSION['login'])){
    echo "<script>
    alert('login masse');
        document.location.href = 'login.php';        
    </script>";
    exit;
} 
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 3){
    echo "<script>
    alert('anda tidak punya hak akses kesini');
    document.location.href = 'modal.php';
    </script>";
    exit;
}
    include "layout/header.php";

    $title = "daftar mahasisawa";
    $datamhs = select("SELECT * FROM tb_mhs ORDER BY id_mhs DESC");
?>

<div class="container mt-5">
          <div class="col-lg-12">
            <h1 class="text-center text">Informasi data mahasiswa Mobile Legend</h1>
           
</div>
        </div>
    <div class="row">
          <div class="col-lg-12">
              <div  class="table-responsive">
        <div class="container mt-3"> 
                        
                <table class="table table-striped table-boardered table-hover mt-8" id="datatables" data-page-length='10'>
                    <thead>
                        <tr class="table-dark table-active">
                            <th>ID</th>
                            <th class="text">Nama </th>
                            <th class="text">Prodi</th>
                            <th>Jenis Kelamin</th>
                            <th>NO Hp</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th class="text-center">Aksi</th>
                          </tr>    
            </thead>
            <tbody>
     
                <?php $no =1;?>
                <?php foreach ($datamhs as $mhs) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td class="text"><?= $mhs['nama'];?></td>
                    <td><?= $mhs['prodi'];?></td>
                    <td><?= $mhs['jk'];?></td>
                    <td><?= $mhs['no_tlp'];?></td>
                    <td><?= $mhs['email'];?></td>
                    <td width="10%">
                    <img src="assets/img/<?= $mhs['foto'];?>" alt="foto" width="50%"></td>
                   
                
                    <td class="text-center" width="25%">
                    <a href="detail_mhs.php?id_mhs=<?= $mhs['id_mhs']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-info-circle"></i> Detail</a>
                    <a href="ubahmhs.php?id_mhs=<?= $mhs['id_mhs'];?>" class="btn btn-success"><i class="fa fa-edit"></i> Ubah</a>
                    <a href="hapusmhs.php?id_mhs=<?= $mhs['id_mhs']; ?>" class="btn btn-danger"
                        onclick="return confirm('Yakin dihapus..?')"><i class="fas fa-trash"></i>  Hapus</a>
                    </td>
               
                </tr>
                <?php endforeach;  ?>
          
            </tbody>
        
    </table>
    <div>
    <a href="tambahmhs.php" class="btn btn-primary " style="float:center">Tambahkan</a>
    <a href="download-excel-mahasiswa.php" class="btn btn-success mb-1" style="float:center"><i class="fas fa-file-excel"></i>Download Excel</a>
    <a href="download-pdf-mahasiswa.php" class="btn btn-danger mb-1" style="float:center"><i class="fas fa-file-pdf"></i>Download PDF</a>

    </div>
    </div>

    

<?php   
    include "layout/footer.php";
?>
