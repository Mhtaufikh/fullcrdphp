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

// membatasi sesuai user login
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 2){
    echo "<script>
    alert('anda tidak punya hak akses kesini');
    document.location.href = 'modal.php';
    </script>";
    exit;
}
  include 'layout/header.php';
  $databarang = select("SELECT * FROM tb_barang ORDER BY id_barang DESC");
?>
        <div class="container mt-5">
          <div class="col-lg-12">
            <h1 class="container-fluid text-center" >Aksesoris</h1>
</div>
        </div>
        
    <div class="row">
          <div class="col-lg-12">
              <div  class="table-responsive">
        <div class="container mt-3"> 
                    <h1><i class="fas fa-list"></i> Data Barang</h1>
                    <hr>
                   
                    
                <table class="table table-boardered table-hover table-striped mt-5" id="datatables" data-page-length='5'>
                    <thead>
                        <tr class="table-dark">
                            <th>No</th>
                            <th>Nama </th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Barcode</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                          </tr>    
            </thead>
            <tbody>
        </div>
              </div>
          </div>
                <?php $no =1;?>
                <?php foreach ($databarang as $barang) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $barang['nama'];?></td>
                    <td><?= $barang['jumlah'];?></td>
                    <td>Rp. <?= number_format($barang['harga'],2,',','.') //format harga?></td>
                    <td class="text-center"><img alt="barcode" src="barcode.php?codetype=Code128&size=15&text=PR<?= $barang['barcode'];?>&print=true" /></td>
                    <td><?= date('d-m-y | H:i:s', strtotime($barang['tanggal'])) //format jam?></td> 
                    <td width="15%" class="text-center">
                        <a href="ubahbrg.php?id_barang=<?= $barang['id_barang'];?>" class="btn btn-success">Ubah</a>
                        <a href="hapusbrg.php?id_barang=<?= $barang['id_barang']; ?>" class="btn btn-danger"
                        onclick="return confirm('Yakin dihapus..?')"> Hapus</a>
                    </td>
               
                </tr>
                <?php endforeach;  ?>
          
            </tbody>
        
    </table>
    <div>
    <a href="tambahbrg.php" class="btn btn-primary" style="float:right">Tambahkan</a>

    </div>
    </div>
    <div>      
    
      
<?php    
include 'layout/footer.php';
?>
