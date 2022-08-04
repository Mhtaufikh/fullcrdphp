<?php
session_start();
include "config/app.php";


//cek apakah tombol login ditekan
if(isset($_POST['login'])){
  //ngambil data input username dan password
  $user = mysqli_real_escape_string($db, $_POST['username']);
  $pass = mysqli_real_escape_string($db, $_POST['password']);
  
  //cek
   
  $result = mysqli_query($db, "SELECT * FROM akun WHERE username = '$user'");

  //cek password
  if(mysqli_num_rows($result) == 1){
    # cek password
    $hasil = mysqli_fetch_assoc($result);

    if (password_verify($pass, $hasil['password'])) {
      # set session
      $_SESSION['login']        = true;
      $_SESSION['id_akun']      = $hasil['id_akun'];
      $_SESSION['nama']         = $hasil['nama'];
      $_SESSION['username']     = $hasil['usernmae'];
      $_SESSION['level']        = $hasil['level'];

      //jika login benar arahkan ke file index.php
      header("location: index.php");
      exit;
    }
  }
  // jika tidak ada usernya/login salah
  $error = true;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Admin Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />


    <!-- Favicons -->

<link rel="icon" href="assets/img/icon/btlogo.svg">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
     
    
<main class="form-signin">
  <form action="" method="POST">
    <img class="mb-4" src="assets/img/icon/warszawianka_chlamys_(clothing).svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Silahakan admin login</h1>

     <?php if(isset($error)) :?>
      <div class="alert alert-danger text-center">
        <b>Username/Password tidak sesuai</b> 
      </div>
      <?php endif;?>
    
      <div class="form-floating">
      <input type="text" class="form-control" name="username" id="floatingInput" placeholder="username" required>
      <label for="floatingInput" placeholder="username" >Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password...." required>
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Login</button>
    <p class="mt-5 mb-3 text-muted">Copyright &copy; mhtaufikh from 2022 to<small> <?= date('Y/m/d');?></small></p>
    
    <div class="btn btn-info"><a href="user/pendaftaran.php">Mahasiswa baru sini </a></div>
  </form>
</main>


    
  </body>
</html>
