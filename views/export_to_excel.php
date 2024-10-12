<?php
include_once '../controllers/c_nilai.php'; // Pastikan untuk menyertakan controller yang diperlukan

$nilai = new C_nilai();
$data = $nilai->TampilNilai($_GET['IdKategori']); // Ambil data berdasarkan IdKategori

// Ambil nama event dari parameter
$eventName = isset($_GET['eventName']) ? $_GET['eventName'] : 'data_peserta';
$eventName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $eventName); // Sanitasi nama event

header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=\"{$eventName}.xls\""); // Menggunakan nama event sebagai nama file

echo "<table border='1'>
<tr>
    <th>No Peserta</th>
    <th>Nama Anjing</th>
    <th>Nama Pemilik</th>
    <th>Handler</th>
    <th>Size</th>
    <th>Kelas</th>
    <th>Waktu Tempuh</th>
    <th>Status</th>
    <th>Fault</th>
    <th>Refusal</th>
    <th>Result</th>
    <th>Tanggal</th>
    <th>Juri</th>
</tr>";

if (!empty($data)) {
    foreach ($data as $x) {
        echo "<tr>
            <td>{$x->no_peserta}</td>
            <td>{$x->nama_anjing}</td>
            <td>{$x->nama_pemilik}</td>
            <td>{$x->handler}</td>
            <td>{$x->size}</td>
            <td>{$x->kelas}</td>
            <td>{$x->waktu_tempuh}</td>
            <td>{$x->status}</td>
            <td>{$x->fault}</td>
            <td>{$x->refusal}</td>
            <td>{$x->result}</td>
            <td>{$x->tanggal}</td>
            <td>{$x->Username}</td>
        </tr>";
    }
}

echo "</table>";
?>