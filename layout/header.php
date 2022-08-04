<?php


include 'config/app.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.js">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>FUll CRUD PHP</title>
    <link rel="icon" href="assets/img/icon/btlogo.svg">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>    
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
            <a class="navbar-brand"  href="index.php">JS-KINGDOM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
                         <div class="collapse navbar-collapse" id="navbarNav">
                           <ul class="navbar-nav">
                            <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 2) :?> 
                            <li class="nav-item">
                              <a class="nav-link li-gaya"  href="index.php">Barang</a>
                             </li>
                             <?php endif;?>
                        
                             <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 3) :?> 
                        <li class="nav-item">
                             <a class="nav-link li-gaya" href="mahasiswa.php">Mahasiswa</a>
                          </li>
                          <?php endif; ?>
                        <li class="nav-item li-gaya">

                 <a class="nav-link" href="modal.php">Akun</a>    
            </li>
            <li>
                 <a href="./logout.php" class="nav-link li-gaya" onclick="return confirm('yakin ingin keluar.?')">Keluar</a>
                 </li>
        </ul>
     </div>
 
    </div>
  
    <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">
</nav>
    </div>
    <div class="container text-center "> <small class="h1-user" href="#"> Hallo <?= $_SESSION['nama']; ?></small></div>