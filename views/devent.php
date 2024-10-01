<?php include_once'../views/layouts/header.php'; 
include_once'../controllers/c_kategori.php';

$tampil = new C_kategori();
?>

<main>
    <a href="data.php" class="btn btn-danger">Kembali</a>


    
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

</div>
</main>