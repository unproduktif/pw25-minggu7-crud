<?php
require('../koneksi.php');
$id = $_GET['id'];

$query = "DELETE FROM crud_047 WHERE id_produk = '$id'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Hapus Produk</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <script>
    <?php if ($result): ?>
      Swal.fire({
        title: 'Berhasil!',
        text: 'Data berhasil dihapus.',
        icon: 'success',
        confirmButtonColor: '#ff6600'
      }).then(() => {
        window.location.href = 'index.php';
      });
    <?php else: ?>
      Swal.fire({
        title: 'Gagal!',
        text: 'Gagal menghapus data.',
        icon: 'error',
        confirmButtonColor: '#ff6600'
      }).then(() => {
        window.location.href = 'index.php';
      });
    <?php endif; ?>
  </script>
</body>
</html>
