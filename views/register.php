
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../assets/img/img-admin.png">
    <title>Register Page</title>
</head>

<body>
    <div class="input">
        <h1>PERKIN</h1>
        <h3>REGISTER</h3>
        <form action="../routers/r_user.php?aksi=regis" method="POST">
            <div class="box-input">
                    <i class="far fa-user"></i>
                    <input type="text" name="Username" placeholder="Username">
            </div>
            <div class="box-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="Password" autocomplete="current-password" required="" id="id_password" placeholder="Password"><i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
            </div>
            <div class="box-input">
                    <i class="far fa-user"></i>
                    <input type="text" name="NamaJuri" placeholder="Nama Juri">
            </div>
                <button type="submit" name="regis" class="btn-input">Register</button>
            <div class="bottom">
                <p>Sudah punya akun?
                    <a href="../../index.php">Login disini</a>
                </p>
            </div>
        </form>
    </div>
    <script>
      feather.replace();
    </script>
    <script src="../assets/js/login.js">
    </script>
</body>

</html>