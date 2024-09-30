<?php include_once'../views/layouts/header.php'; 

require_once '../controllers/c_kategori.php';

$tampil = new C_kategori();

?>

<main>
<div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-2">
                        <div class="card-header">
                            Tambah Kategori
                        </div>
                    <div class="card-body">
                        <form action="../routers/r_kategori.php?aksi=tambah" method="POST">
                            <label for="">Nama Kategori</label>
                            <input type="text" name="NamaEvent" class="form-control" required>
                            <label for="">Deskripsi</label>
                            <textarea type="text" name="Deskripsi" class="form-control" required></textarea>
                                <button type="submit" name="tambah" class="btn-input btn btn-outline-info mt-3 ">Tambah Kategori</button>
                        </form>
                    </div>  
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header">
                        Data Kategori
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                                $event = $tampil->tampil_data();
                                if (empty($event)) {
                                 echo "";
                                } else {
                                 foreach ($event as $x) : 
                                 ?>  
                                    <tr>
                                        <td><?= $x->NamaEvent ?></td>
                                        <td><?= $x->Deskripsi ?></td>
                                        <td>
                                        <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../routers/r_kategori.php?IdKategori=<?= $x->IdKategori ?>&aksi=hapus"><button type="button" name="hapus" class="btn btn-round btn-danger"><i class="far fa-trash-alt"></i></button></a>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                <?php }?>   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>