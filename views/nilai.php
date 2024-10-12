<?php include_once'../views/layouts/header.php'; 
include_once'../controllers/c_kategori.php';
include_once'../controllers/c_peserta.php';

$tampil = new C_kategori();
$peserta = new C_peserta();
?>

<main>
<?php 
                        foreach($peserta->SelectPeserta($_GET['no_peserta']) as $tampil) :
                    ?>
                    <div class="card">
                        <div class="card-body">
                        <form method="post" action="../routers/r_nilai.php?aksi=tambah">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-select">
                                    <option value="Finish">Finish</option>
                                    <option value="Eliminasi">Eliminasi</option>
                                    <option value="Diskualifikasi">Diskualifikasi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="waktu_tempuh">Waktu Tempuh</label>
                                <input type="number" step="0.01" class="form-control" id="waktu_tempuh" name="waktu_tempuh">
                            </div>
                            <div class="form-group">
                                <label for="fault">Fault</label>
                                <input type="number" class="form-control" id="fault" name="fault" min="0">
                            </div>
                            <div class="form-group">
                                <label for="refusal">Refusal</label>
                                <input type="number" class="form-control" id="refusal" name="refusal" min="0">
                            </div>
                            <div class="form-group">
                                <label for="result">Result</label>
                                <input type="number" step="0.01" class="form-control" id="result" name="result" readonly>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" value="<?= $tampil->IdKategori ?>"  name="IdKategori">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" value="<?= $tampil->no_peserta ?>"  name="no_peserta">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" value="<?= $_SESSION['data']['IdJuri'] ?>"  name="IdJuri">
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
                            <div class="modal-footer">
                        <a href="devent.php?IdKategori=<?= $tampil->IdKategori ?>"><button type="button" class="btn btn-secondary">Close</button></a>
                        <button type="submit" class="btn btn-primary" name="tambah">Save</button>
                    </div>
                        </form>
                        </div>
                        
                    </div>
                    <?php endforeach; ?>
                    
            
</main>
<script>
    function calculateResult() {
        const refusal = Math.max(parseFloat(document.getElementById('refusal').value) || 0, 0);
        const fault = Math.max(parseFloat(document.getElementById('fault').value) || 0, 0);
        const waktuTempuh = parseFloat(document.getElementById('waktu_tempuh').value) || 0;
        const result = ((refusal + fault) * 5) + waktuTempuh;
        document.getElementById('result').value = result.toFixed(2);
    }

    document.getElementById('refusal').addEventListener('input', calculateResult);
    document.getElementById('fault').addEventListener('input', calculateResult);
    document.getElementById('waktu_tempuh').addEventListener('input', calculateResult);
</script>