<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Sepatu</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top text-dark p-3">
  <div class="container-fluid">
    <h6 class="navbar-brand" href="#">Sepatuku</h6>
      <div class="navbar-nav ms-auto">
        <a href="../../views/dashboard.php">Home</a>
        <a href="../../views/about.php">About</a>
        <li class="nav-item dropdown pe-3">
    <a dropdown-toggle href="#" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="far fa-user"></i>
       
    </a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
            <h6>Nama</h6>
            <span>Email</span>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="../../app/views/profile.php">
            <i class="far fa-user"></i>
                <span>My Profile</span>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="" onclick="return confirm('Yakin ingin keluar dari aplikasi?')">
            <i class="fas fa-sign-out-alt"></i>
                <span>Sign Out</span>
            </a>
        </li>
    </ul>
</li>

       
      </div>
      </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>