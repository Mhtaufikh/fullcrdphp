<?php

///fungsi menampilkan data
    function select($query)
    {
            global $db;

            $result = mysqli_query($db, $query);
            $rows = [];


            while ($row = mysqli_fetch_assoc($result)){
                $rows[] = $row;
            }
            
            return $rows;
    }

//nambah data
function create_barang($post){
    global $db;

    $nama = $post['nama'];
    $jumlah = $post['jumlah']; 
    $harga = $post['harga'];
    $barcode = rand(100000, 999999);
   

    $query = "INSERT INTO tb_barang VALUES(null, '$nama','$jumlah','$harga','$barcode', CURRENT_TIMESTAMP())";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

//update barang
function update_barang($post)
{
        global $db;
        $id_barang = $post['id_barang'];
        $nama = $post['nama'];
        $jumlah = $post['jumlah'];
        $harga = $post['harga'];
        $barcode = rand(100000, 999999);

        $query = "UPDATE tb_barang SET nama='$nama', jumlah='$jumlah', harga='$harga', barcode='$barcode' WHERE id_barang = $id_barang ";     

        mysqli_query($db, $query);

        return mysqli_affected_rows($db);
}
function update_mhs($post)
{
        global $db;
        
        $id_mhs     = strip_tags($post['id_mhs']); 
        $nama       = strip_tags($post['nama']);
        $prodi      = strip_tags($post['prodi']); 
        $jk         = strip_tags($post['jk']);
        $no_tlp     = strip_tags($post['no_tlp']);
        $email      = strip_tags($post['email']);
        $fotolama   = strip_tags($post['fotolama']);

        if($_FILES['foto']['error'] == 4){
            $foto = $fotolama;
        }else {
            $foto = upload_file();
        }

        $query = "UPDATE tb_mhs SET nama='$nama', prodi='$prodi', jk='$jk', no_tlp='$no_tlp', email='$email', foto = '$foto' where id_mhs = $id_mhs";    
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);


}


//function delete
function delete_brg($id_barang)
{
    global $db;

    //query hapus
    $query = "DELETE FROM tb_barang WHERE id_barang = $id_barang";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//function delete akun
//function delete
function delete_akun($id_akun)
{
    global $db;

    //query hapus
    $query = "DELETE FROM akun WHERE id_akun = $id_akun";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function delete_mhs($id_mhs)
{
    global $db;
    //ambil foto sesuai data yang dipilih
    $foto = select("SELECT * FROM tb_mhs WHERE id_mhs = $id_mhs")[0];
    unlink("assets/img/". $foto['foto']);
  

    //query hapus
    $query = "DELETE FROM tb_mhs WHERE id_mhs = $id_mhs";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//tambah mahasiswa
function create_mhs($post){
    global $db;

    $nama   = $post['nama'];
    $prodi  = $post['prodi']; 
    $jk     = $post['jk'];
    $no_tlp = $post['no_tlp'];
    $email  = $post['email'];
    $foto   = upload_file();
    
    //cek upload foto
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO tb_mhs VALUES(null, '$nama','$prodi','$jk','$no_tlp','$email','$foto')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

//fungsi mengupload file foto/pdf/dll
function upload_file()
{
    

    $namafile = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpname = $_FILES['foto']['tmp_name'];

    //cek file

    $extensifileValid = ['jpg','jpeg','png'];
    $extensifile      = explode('.', $namafile);
    $extensifile      = strtolower(end($extensifile)); //extensi file menjadi kecil JPG->jpg

    if (!in_array($extensifile, $extensifileValid)) {
        //pesan gagal
        echo "<script>
            alert('format file tidak valid');
            document.location.href = 'tambahmhs.php';
            </script>";
        die();
    }

    //cek ukuran file 2 mb
    if ($ukuranfile > 1048000) {
        echo "<script>
        alert('Ukuran File Max 2 MB');
        document.location.href = 'tambahmhs.php';
        </script>";
    die();
    }


    //generate nama file baru
    $namafileBaru = uniqid();
    $namafileBaru .= '.';
    $namafileBaru .= $extensifile;

    // penyimpanan difolder local
 
    move_uploaded_file($tmpname,'assets/img/'.$namafileBaru);
    return $namafileBaru;
    
}

//daftar mahasiswa

function daftar_mhs($post){
    global $db;

    $nama   = $post['nama'];
    $prodi  = $post['prodi']; 
    $jk     = $post['jk'];
    $no_tlp = $post['no_tlp'];
    $email  = $post['email'];
    $foto   = upload_file_user();
    
    //cek upload foto
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO tb_mhs VALUES(null, '$nama','$prodi','$jk','$no_tlp','$email','$foto')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}


//fungsi mengupload file USER
function upload_file_user()
{
    

    $namafile = $_FILES['foto']['name'];
    $ukuranfile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpname = $_FILES['foto']['tmp_name'];

    //cek file

    $extensifileValid = ['jpg','jpeg','png'];
    $extensifile      = explode('.', $namafile);
    $extensifile      = strtolower(end($extensifile)); //extensi file menjadi kecil JPG->jpg

    if (!in_array($extensifile, $extensifileValid)) {
        //pesan gagal
        echo "<script>
            alert('format file tidak valid');
            document.location.href = '../user/pendaftaran.php';
            </script>";
        die();
    }

    //cek ukuran file 2 mb
    if ($ukuranfile > 1048000) {
        echo "<script>
        alert('Ukuran File Max 2 MB');
        document.location.href = '../user/pendaftaran.php';
        </script>";
    die();
    }


    //generate nama file baru
    $namafileBaru = uniqid();
    $namafileBaru .= '.';
    $namafileBaru .= $extensifile;

    // penyimpanan difolder local
    move_uploaded_file($tmpname,'../assets/img/'.$namafileBaru);
    
    return $namafileBaru;
    
}

//fungsi tambah akum
    function create_akun($post)
    {
        global $db;


        $nama       =        strip_tags($post['nama']);
        $username   =        strip_tags($post['username']);
        $email      =        strip_tags($post['email']);
        $password   =        strip_tags($post['password']);
        $level      =        strip_tags($post['level']);

        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //validasi email
    //     if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    
    //         $cek_email = "SELECT * FROM tb_mhs where email='$email'";
    //         $kueri = mysqli_query($db, $cek_email);
    //         if(mysqli_num_rows($kueri) > 0){
    //             echo "Email sudah ada";
    //         } else{
    //             echo "email sukses di masukan";
    //         }
    // }

        $query = "INSERT INTO akun VALUES(null, '$nama','$username','$email','$password','$level')";     

        mysqli_query($db, $query);

        return mysqli_affected_rows($db);

    }
    //ubah akun
    function update_akun($post)
    {
        global $db;

        $id_akun    =        strip_tags($post['id_akun']);
        $nama       =        strip_tags($post['nama']);
        $username   =        strip_tags($post['username']);
        $email      =        strip_tags($post['email']);
        $password   =        strip_tags($post['password']);
        $level      =        strip_tags($post['level']);

        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //validasi email
    //     if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    
    //         $cek_email = "SELECT * FROM tb_mhs where email='$email'";
    //         $kueri = mysqli_query($db, $cek_email);
    //         if(mysqli_num_rows($kueri) > 0){
    //             echo "Email sudah ada";
    //         } else{
    //             echo "email sukses di masukan";
    //         }
    // }

        $query = "UPDATE akun SET  nama = '$nama', username = '$username', email = '$email', password = '$password', level='$level' WHERE id_akun='$id_akun'";     

        mysqli_query($db, $query);

        return mysqli_affected_rows($db);

    }

//   function login(){
//     global $db;
//     $user = $_POST['username'];
//     $pass = $_POST['password'];

//     $data = mysqli_query($db,"SELECT * from akun where username='$user' AND password='$pass'");

//     $cek=mysqli_num_rows($data);
    
//     if($cek==0){
//       $_SESSION['login']="bagoong salah password salahna!";
      
//       echo"<script languange='javascript'>
//       document.location='index.php';
//       </script>";
//       }
       
//   //5.jika user ada
//   else{
//       $a=mysqli_fetch_assoc($data);
//       $_SESSION['username']=$a['username'];
//       $_SESSION['username'] = $a['username'];
//       {header('location:index.php');}
//       echo "gagal";
//   //6.buat session untuk user halaman admin
//   }
    

//   }
?>





