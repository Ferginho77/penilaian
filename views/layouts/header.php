<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERKIN</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../assets/img/img-admin.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        .loading-spinner {
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .fade-out {
            animation: fadeOut 0.5s ease-out;
        }
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
    </style>
</head>
<body>
<div class="loading" id="loading">
    <div class="loading-spinner"></div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <div class="container">
    <a class="navbar-brand" href="#">
        <img src="../assets/img/img-admin.png" alt="Logo" height="60">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="../views/dashboard.php"><i class="fas fa-home me-2"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../views/data.php"><i class="fas fa-table me-2"></i>Data Event</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../views/kategori.php"><i class="fas fa-calendar-alt me-2"></i>Event</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../views/leaderboard.php"><i class="fa-solid fa-square-poll-vertical"></i> Leaderboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="far fa-user me-2"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            
            <li><a class="dropdown-item" href="../routers/r_user.php?aksi=logout" onclick="return confirm('Yakin ingin keluar dari aplikasi?')"><i class="fas fa-sign-out-alt me-2"></i>Sign Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.addEventListener('load', function() {
        const loading = document.getElementById('loading');
        loading.classList.add('fade-out');
        setTimeout(() => {
            loading.style.display = 'none';
        }, 500);
    });
</script>
</body>
</html>
