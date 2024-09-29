<?php

include_once 'conn.php';

class C_user {
    public function register($Username, $Password, $NamaJuri){
        $conn = new database();
        if(isset($_POST['regis'])){
            $cek = mysqli_query($conn->koneksi, "SELECT * FROM juri WHERE Username = '$Username'");
            $data = mysqli_num_rows($cek);
            if($data > 0){
                echo "<script> alert('username sudah terdaftar');
                      document.location.href = '../views/register.php';
                     </script>";
            }else{
                $sql = mysqli_query($conn->koneksi, "INSERT INTO juri VALUES (NULL, '$Username', '$Password', '$NamaJuri')" );
                var_dump($sql);
                exit;
                if ($sql) {
                    header("Location: ../index.php");
                    } else {
                        echo "<script>alert('Data Gagal Ditambah');window.location='../views/register.php'</script>";
                    }
            }
        }  
    }

    public function login($Username=null, $Password=null){
        $conn = new database();
        if (empty($Username) || empty($Password)) {
            echo "<script>alert('Username dan Password harus diisi.');window.location='../index.php'</script>";
            exit();
        }

        //untuk mengecek apakah tombol login di tekan, jika di tekan akan menjalankan perintah dibawahnya
        if (isset($_POST['login'])) {
            $sql = "SELECT * FROM juri WHERE Username  = '$Username'";
            $result = mysqli_query($conn->koneksi, $sql);
            $data = mysqli_fetch_assoc($result);
            if ($result) {
               if(mysqli_num_rows($result) > 0){
                if(password_verify($Password, $data['Password'])){
                    $_SESSION["data"] = $data;
                    header("Location: ../views/dashboard.php");
                }else{
                    echo "<script>alert('Password/Username Salah');window.location='../index.php'</script>";
                }
            }
            }
        }
    }



}