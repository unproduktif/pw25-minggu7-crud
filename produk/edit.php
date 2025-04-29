<?php
require('../koneksi.php');
$id_produk = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama_produk = $_POST['nama_produk'];
  $harga_item = $_POST['harga_item'];
  $jumlah_beli = $_POST['jumlah_beli'];
  $diskon = $_POST['diskon'];
  $tgl_beli = $_POST['tgl_beli'];

  $query = "UPDATE crud_047 SET 
              nama_produk = '$nama_produk',
              harga_item = '$harga_item',
              jumlah_beli = '$jumlah_beli',
              diskon = '$diskon',
              tgl_beli = '$tgl_beli'
            WHERE id_produk = '$id_produk'";

  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "<script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          title: 'Berhasil!',
          text: 'Produk berhasil diperbarui.',
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
          text: 'Gagal memperbarui data.',
          icon: 'error',
          confirmButtonColor: '#ff6600'
        });
      });
    </script>";
  }  
}

$query_select = "SELECT * FROM crud_047 WHERE id_produk = '$id_produk'";
$result_select = mysqli_query($conn, $query_select);
$data = mysqli_fetch_assoc($result_select);
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Transaksi</title>
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
    .btn-success {
      background-color: #ff7f50;
      border: none;
    }
    .btn-success:hover {
      background-color: #e0663c;
    }
  </style>
</head>
<body>
  <div class="container animate__animated animate__fadeIn">
    <h2 class="mb-4 text-center">Edit Transaksi</h2>
    <form action="" method="POST">
      <div class="mb-3">
        <label class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="nama_produk" value="<?= $data['nama_produk'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Harga Item</label>
        <input type="number" class="form-control" name="harga_item" value="<?= $data['harga_item'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Jumlah Beli</label>
        <input type="number" class="form-control" name="jumlah_beli" value="<?= $data['jumlah_beli'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Diskon (%)</label>
        <input type="number" class="form-control" name="diskon" step="0.01" value="<?= $data['diskon'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Tanggal Beli</label>
        <input type="datetime-local" class="form-control" name="tgl_beli" value="<?= date('Y-m-d\TH:i', strtotime($data['tgl_beli'])) ?>" required>
      </div>
      <button type="submit" class="btn btn-success">Update Produk</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
