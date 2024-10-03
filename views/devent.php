<?php include_once'../views/layouts/header.php'; 
include_once'../controllers/c_kategori.php';
include_once'../controllers/c_peserta.php';

$tampil = new C_kategori();
$peserta = new C_peserta();
?>

<main>                      
<div class= "container" data-aos="fade-right">
    <div class= "row">
        <div class="col-md-4">
            <a href="data.php" class="btn btn-danger">Kembali</a>
                <div class="card">
                    <div class="card-body">
                        <form action="../routers/r_peserta.php?aksi=tambah" method="post">
                            <div class="form-group">
                                <label>Nama Anjing</label>
                                <input type="text" class="form-control" name="nama_anjing">
                            </div>
                            
                            <div class="form-group">
                                <label>Nama Pemilik</label>
                                <input type="text" class="form-control" name="nama_pemilik">
                            </div>
                            
                            <div class="form-group">
                                <label>Handler</label>
                                <input type="text" class="form-control" name="handler">
                            </div>
                            
                            <div class="form-group">
                                <label>Size</label>
                                <select name="size" class="form-select">
                                    <option value="">Small</option>
                                    <option value="">Medium</option>
                                    <option value="">Large</option>
                                    <option value="">Intermediate</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="kelas" class="form-select">
                                    <option value="">FA1</option>
                                    <option value="">FA2</option>
                                    <option value="">A1</option>
                                    <option value="">A2</option>
                                    <option value="">A3</option>
                                    <option value="">J1</option>
                                    <option value="">J2</option>
                                    <option value="">J3 </option>
                                </select>
                            </div>
                            <div class="form-group">
                                    <label>Pilih Event</label>
                                    <select name="IdKategori" class="form-select">
                                    <?php foreach (($tampil->tampil_devent($_GET['IdKategori'])) as $x) : ?>
                                        <option value="<?= $x->IdKategori ?>"><?= $x->NamaEvent ?></option>
                                    <?php endforeach; ?>
                                    </select>
                            </div>
                            <button type="submit" name="tambah" class="btn-input btn btn-outline-info mt-3">Tambah Data</button>
                        </form>

                    </div>
            </div>
        </div>
            <div class="col-md-8">
                <div class="card mt-5">
                        <div class="card-header">
                            <h3>Data Peserta</h3>
                        </div>
                    <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>Nama Anjing</td>
                                <td>Nama Pemilik</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                          
                        <?php 
                        $event = $peserta->Tampilpeserta($_GET['IdKategori']);
                        if (empty($event)) {
                         echo "";
                        } else {
                         foreach ($peserta->Tampilpeserta($_GET['IdKategori'])as $x) : 
                         ?>  
                            
                        
                        <tbody>
                         <tr>
                           <td><?= $x->nama_anjing ?></td>
                           <td><?= $x->nama_pemilik ?></td>
                           <td><a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../routers/r_peserta.php?no_peserta=<?= $x->no_peserta ?>&aksi=hapus"><button type="button" name="hapus" class="btn btn-round btn-danger"><i class="far fa-trash-alt"></i></button></a>
                           <a href="#" class="btn btn-outline-info">Pilih</a>
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
    <div class="card mt-5">
        <div class="card-header">
            <h3>Result</h3>
        </div>
        <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>

            </thead>
        </table>
        </div>
    </div>
</div>
</main>