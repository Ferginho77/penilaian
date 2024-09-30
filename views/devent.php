<?php include_once'../views/layouts/header.php'; 
include_once'../controllers/c_kategori.php';

$tampil = new C_kategori();
?>

<main>
    <a href="data.php" class="btn btn-danger">Kembali</a>
    <a href="#" class="btn btn-info text-white">Tambah Data</a>
<?php 
                        $event = $tampil->tampil_devent($_GET['IdKategori']);
                        if (empty($event)) {
                         echo "<h2>Tidak Ada Data</h2>";
                        } else {
                         foreach ($tampil->tampil_devent($_GET['IdKategori'])as $x) : 
                         ?>  
                            
                        <?php endforeach ?>
                        <?php }?>  

<div id="tambahdata">
    <form action="#" method="POST">

    </form>
</div>
</main>