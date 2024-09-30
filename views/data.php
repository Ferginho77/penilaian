<?php include_once'layouts/header.php'; 

require_once '../controllers/c_kategori.php';

$tampil = new C_kategori();

?>
<main>
<div class="container">
        <h1 class="text-white">Daftar Data</h1>
        <?php 
                                $event = $tampil->tampil_data();
                                if (empty($event)) {
                                 echo "";
                                } else {
                                 foreach ($event as $x) : 
                                 ?>  
        <div class="card" style="width: 18rem;">
        <div class="card-body">
                <h5 class="card-title"><?= $x->NamaEvent ?></h5>
                <p class="card-text"><?= $x->Deskripsi ?></p>
                <a href="devent.php?IdKategori=<?= $x->IdKategori ?>" class="btn btn-outline-primary">Lihat Detail</a>
        </div>
        </div>
        <?php endforeach ?>
        <?php }?>   
   </div>
</main>