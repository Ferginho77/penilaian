<?php include_once'../views/layouts/header.php'; 
include_once'../controllers/c_kategori.php';
include_once'../controllers/c_peserta.php';
include_once'../controllers/c_nilai.php';

$tampil = new C_kategori();
$peserta = new C_peserta();
$nilai = new C_nilai();
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
                                    <option value="Small">Small</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Large">Large</option>
                                    <option value="Intermediate">Intermediate</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Kelas</label>
                                <select name="kelas" class="form-select">
                                    <option value="FA1">FA1</option>
                                    <option value="FA2">FA2</option>
                                    <option value="A1">A1</option>
                                    <option value="A2">A2</option>
                                    <option value="A3">A3</option>
                                    <option value="J1">J1</option>
                                    <option value="J2">J2</option>
                                    <option value="J3">J3 </option>
                                </select>
                            </div>
                            <div class="form-group">
                                    <select name="IdKategori" class="form-select" hidden>
                                    <?php foreach (($tampil->tampil_devent($_GET['IdKategori'])) as $x) : ?>
                                        <option value="<?= $x->IdKategori ?>"><?= $x->NamaEvent ?></option>
                                    
                                    </select>
                            </div>
                            <a href="devent.php?IdKategori=<?= $x->IdKategori ?>"><button type="submit" name="tambah" class="btn-input btn btn-outline-info mt-3">Tambah Data</button></a>
                            <?php endforeach; ?>
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
                           <td><a onclick="return confirm('Apakah yakin data akan di hapus?')" href="../routers/r_peserta.php?no_peserta=<?= $x->no_peserta ?>&IdKategori=<?= $x->IdKategori ?>&aksi=hapus"><button type="button" name="hapus" class="btn btn-round btn-danger"><i class="far fa-trash-alt"></i></button></a>
                           <a href="nilai.php?no_peserta=<?= $x->no_peserta ?>" class="btn btn-outline-info">Pilih</a>
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
                 <tr>
                    <td>No Peserta</td>
                    <td>Timestamp</td>
                    <td>Status</td>
                    <td>Waktu Tempuh</td>
                    <td>Fault</td>
                    <td>Refusal</td>
                    <td>Result</td>
                 </tr>           
            </thead>
            <?php
    $event = $nilai->TampilNilai($_GET['IdKategori']);
                        if (empty($event)) {
                         echo "";
                        } else {
                         foreach ($nilai->TampilNilai($_GET['IdKategori'])as $x) : 
                         ?> 
            <tbody>
                <tr>
                    <td><?= $x->no_peserta ?></td>
                    <td><?= $x->timestamp?></td>
                    <td><?= $x->status ?></td>
                    <td><?= $x->waktu_tempuh ?></td>
                    <td><?= $x->fault ?></td>
                    <td><?= $x->refusal ?></td>
                    <td><?= $x->result ?></td>
                </tr>
                <?php endforeach ?>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
   
</div>
</main>