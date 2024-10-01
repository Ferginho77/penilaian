  // Dapatkan elemen tombol dan form
  const tambahDataBtn = document.getElementById('tambahDataBtn');
  const formTambahData = document.getElementById('formTambahData');

  // Tambahkan event listener untuk tombol tambah data
  tambahDataBtn.addEventListener('click', function() {
      // Tampilkan atau sembunyikan form
      if (formTambahData.style.display === "none") {
          formTambahData.style.display = "block";
      } else {
          formTambahData.style.display = "none";
      }
  });