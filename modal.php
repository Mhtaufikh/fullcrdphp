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
    $tittle = 'daftar akun';
    include "layout/header.php";  

    //tampil seluruh data
    $data_akun = select("SELECT * FROM akun");

    //tampil berdasarkan user login
    $id_akun = $_SESSION['id_akun'];
    $data_bylogin = select("SELECT * FROM akun WHERE id_akun = $id_akun");
    //jika tombol tambah ditekan jalankan script berikut
    if (isset($_POST['tambah'])){
      if (create_akun($_POST) > 0) {
        echo "<script>
        alert('Data akun berhasil Ditambahkan');
        document.location.href = 'modal.php'; 
        </script>";
    } else{
    echo "<script>
        alert('Data akun gagal Ditambahkan');
        document.location.href = 'modal.php'; 
        </script>";
      }
    }
    
    //mengecek apakah tombol tambah ditekan (alert)
  if(isset($_POST['ubah'])){
    if (update_akun($_POST) > 0){
        echo "<script>
        alert('Data modal berhasil Diubah');
        document.location.href = 'modal.php'; 
        </script>";
    } else{
    echo "<script>
        alert('Data modal gagal Diubah');
        document.location.href = 'modal.php'; 
        </script>";
     }
  } 

?>



<div class="container mt-5">
            <h1 class="text-center">Akun</h1>     
            <?php if ($_SESSION['level'] == 1) :?>
              <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#modalUbah<?=$akun['id_akun'];?>"><i class="fas fa-edit"></i> Ubah</button>
 
              <?php endif; ?>
   <table class="table table-bordered table-horver mt-5" id="datatables">
    <thead>
        <tr class="table-dark">
            <td><i class="fas fa-sort-amount-down"></i> No</td>
            <td>Nama</td>
            <td>Username</td>
            <td>Email</td>
            <td>Password</td>
            <td>Aksi</td>
        


        </tr>
    </thead>
    <tbody>
      <?php $no = 1;?> 
      <!-- tampil seluruh data -->
     <?php if($_SESSION['level'] == 1) : ?>
      <?php foreach ($data_akun as $akun) :?>
           <tr>
                 <td><?= $no++;?></td>
                 <td><?= $akun['nama'];?></td>
                 <td><?= $akun['username'];?></td>
                 <td><?= $akun['email'];?></td>
                 <td>**********</td>
                 <td width="20%" class="text-center">
                  <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#modalUbah<?=$akun['id_akun'];?>"><i class="fas fa-edit"></i> Ubah</button>

                  <button type="button" class="btn btn-danger mb-1" data-toggle="modal" data-target="#modalHapus<?= $akun['id_akun'];?>"><i class="fas fa-trash"></i> Hapus</button> 
                </td>   
          </tr>
        <?php endforeach;?>
      
          <!-- tampil data berdasarkan user login -->
          <?php foreach ($data_bylogin as $akun) :?>
           <tr>
                 <td><?= $no++;?></td>
                 <td><?= $akun['nama'];?></td>
                 <td><?= $akun['username'];?></td>
                 <td><?= $akun['email'];?></td>
                 <td>**********</td>
                 <td width="20%" class="text-center">
                 <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#modalUbah<?=$akun['id_akun'];?>"><i class="fas fa-edit"></i> Ubah</button>
              
                </td>
                 
          </tr>
        <?php endforeach;?>
        <?php endif;?>
     

    </tbody>
   </table>
   <?php if($_SESSION['level'] == 1) : ?>
   <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modalTambah" ><i class="fa fa-plus-circle"></i>Tambah</button>
    <?php endif?>
  </div>

    <!-- Modal Tambah-->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel">Tambah akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" 
            required minlength="6">
          </div>

          <div class="mb-3">
            <label for="level">Level</label>
           <select name="level" id="level" class="form-control" required>
            <option value="">---Pilih level---</option>
            <option value="1">Admin</option>
            <option value="2">Operator Barang</option>
            <option value="3">Operator Mahasiswa</option>
           </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus-->
<?php foreach ($data_akun as $akun) : ?>
    <div class="modal fade" id="modalHapus<?= $akun['id_akun'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">Hapus akun</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">  
        <p>Yakin ingin menghapus akun : <?= $akun['nama'];?> .?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <a href="hapusakun.php?id_akun=<?= $akun['id_akun'];?>" class="btn btn-danger">Hapus</a>
        </div>
      </form>
    </div>
  </div>
</div>
  <?php endforeach;?>
  
  <!-- Modal Ubah-->
  <?php foreach ($data_akun as $akun) : ?>
   
  <div class="modal fade" id="modalUbah<?= $akun['id_akun'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="exampleModalLabel">Ubah akun</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">
          <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= $akun['nama']; ?>" required>
          </div>

          <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $akun['username']; ?>" required>
          </div>

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $akun['email']; ?>"required>
          </div>

          <div class="mb-3">
            <label for="password">Password</label> <small>(masukan password baru/lama)</small>
            <input type="password" name="password" id="password" class="form-control" 
            required minlength="6">
          </div>

          <?php if($_SESSION['level'] == 1) :?>
            <div class="mb-3">
            <label for="level">Level</label>
           <select name="level" id="level" class="form-control" required>
           <?php $level = $akun['level'];?>
            <option value="1"<?= $level == '1' ? 'selected':null ?>>Admin</option>
            <option value="2"<?= $level == '2' ? 'selected':null ?>>Operator Barang</option>
            <option value="3"<?= $level == '3' ? 'selected':null ?>>Operator Mahasiswa</option>
           </select>
          </div>
        </div>
        <?php else: ?>
          <input type="hidden" name="level" value="<?= $akun['level']; ?>">
            <?php endif;?>
    </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
     
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach;?>

<?php   
    include "layout/footer.php";
?>
