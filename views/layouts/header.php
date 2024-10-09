<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERKIN</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="icon" href="/assets/img/img-admin.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top text-dark p-3">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
        <img class="" src="/assets/img/img-admin.png" style="height: max-content;">
    </a>
      <div class="navbar-nav ms-auto">
        <a href="../../views/dashboard.php">Home</a>
        <a href="../../views/data.php">Data Event</a>
        <a href="../../views/kategori.php">Kategori</a>
        <li class="nav-item dropdown pe-3">
    <a dropdown-toggle href="#" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="far fa-user"></i>
       
    </a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li>
            <a class="dropdown-item d-flex align-items-center" href="../routers/r_user.php?aksi=logout" onclick="return confirm('Yakin ingin keluar dari aplikasi?')">
            <i class="fas fa-sign-out-alt"></i>
                <span>Sign Out</span>
            </a>
        </li>
    </ul>
</li>

       
      </div>
      </div>
</nav>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>