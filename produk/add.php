<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Transaksi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background-color: #fff8f2;
      font-family: 'Poppins', sans-serif;
    }
    .container {
      margin-top: 50px;
      background: #ffffff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0px 0px 12px rgba(255, 127, 80, 0.2);
    }
    h2 {
      color: #ff7f50;
      font-weight: 600;
    }
    .btn-primary {
      background-color: #ff7f50;
      border: none;
    }
    .btn-primary:hover {
      background-color: #e0663c;
    }
  </style>
</head>
<body>
<div class="container animate__animated animate__fadeIn">
  <h2 class="mb-4 text-center">Tambah Transaksi</h2>
  <form method="POST">
    <div class="mb-3">
      <label>ID Produk</label>
      <input type="text" name="id_produk" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Tanggal Beli</label>
      <input type="datetime-local" name="tgl_beli" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Nama Produk</label>
      <input type="text" name="nama_produk" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Harga Item</label>
      <input type="number" step="0.01" name="harga_item" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Diskon (%)</label>
      <input type="number" step="0.01" name="diskon" class="form-control" value="0.00">
    </div>
    <div class="mb-3">
      <label>Jumlah Beli</label>
      <input type="number" name="jumlah_beli" class="form-control" required>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>

<?php
if (isset($_POST['simpan'])) {
  $id = $_POST['id_produk'];
  $tgl = $_POST['tgl_beli'];
  $nama = $_POST['nama_produk'];
  $harga = $_POST['harga_item'];
  $diskon = $_POST['diskon'];
  $jumlah = $_POST['jumlah_beli'];


  $cek = mysqli_query($conn, "SELECT * FROM crud_047 WHERE id_produk = '$id'");
  if (mysqli_num_rows($cek) > 0) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          title: 'ID Duplikat!',
          text: 'ID Produk sudah digunakan. Gunakan ID yang berbeda.',
          icon: 'warning',
          confirmButtonColor: '#ff6600'
        });
      });
    </script>";
  } else {
    $sql = "INSERT INTO crud_047 VALUES ('$id', '$tgl', '$nama', $harga, $diskon, $jumlah)";
    if (mysqli_query($conn, $sql)) {
      echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            title: 'Sukses!',
            text: 'Produk berhasil ditambahkan.',
            icon: 'success',
            confirmButtonColor: '#ff6600'
          }).then(() => window.location.href='index.php');
        });
      </script>";
    } else {
      echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            title: 'Gagal!',
            text: 'Terjadi kesalahan saat menyimpan.',
            icon: 'error',
            confirmButtonColor: '#ff6600'
          });
        });
      </script>";
    }
  }
}
?>


