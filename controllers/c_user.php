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
            
                if ($sql) {
                    header("Location: ../index.php");
                    } else {
                        echo "<script>alert('Data Gagal Ditambah');window.location='../views/register.php'</script>";
                    }
            }
        }  
    }
    public function login($Username = null, $Password = null) {
        $conn = new database();
        
        // Cek apakah username atau password kosong
        if (empty($Username) || empty($Password)) {
            echo "<script>alert('Username dan Password harus diisi.');window.location='../index.php'</script>";
            exit();
        }
    
        // Cek apakah tombol login ditekan
        if (isset($_POST['login'])) {
            $sql = "SELECT * FROM juri WHERE Username = '$Username'";
            $result = mysqli_query($conn->koneksi, $sql);
    
            // Cek apakah query berhasil dan data ditemukan
            if ($result && mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);
                
                // Verifikasi password
                if (password_verify($Password, $data['Password'])) {
                    $_SESSION["data"] = $data;
                    header("Location: ../views/dashboard.php");
                } else {
                    echo "<script>alert('Password/Username Salah');window.location='../index.php'</script>";
                }
            } else {
                // Username tidak ditemukan
                echo "<script>alert('Password/Username Salah');window.location='../index.php'</script>";
            }
        }
    }
    


    public function logout(){

        //menghentikan session
        session_destroy();
      

        header("Location: ../index.php");
        exit;
    }

}