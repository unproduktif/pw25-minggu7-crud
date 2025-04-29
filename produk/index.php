<?php include '../koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Transaksi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #fff8f2;
    }

    h2 {
      color: #ff7f50;
      font-weight: 600;
    }

    .table thead {
      background-color: #ffa07a;
      color: white;
      text-align: center;
    }

    .btn-success {
      background-color: #ff7f50;
      border: none;
    }

    .btn-success:hover {
      background-color: #e0663c;
    }

    .btn-warning {
      background-color: #ffc107;
      color: white;
    }

    .btn-danger {
      background-color: #dc3545;
      color: white;
    }

    .container {
      border-radius: 15px;
      padding: 30px;
      background: #ffffff;
      box-shadow: 0px 0px 12px rgba(255, 127, 80, 0.2);
      margin-top: 40px;
    }

    .btn {
      border-radius: 10px;
    }

    table {
      border-radius: 10px;
      overflow: hidden;
    }
  </style>
</head>
<body>
<div class="container">
  <h2 class="mb-4 text-center">📦 Daftar Transaksi</h2>
  <a href="add.php" class="btn btn-success mb-3">+ Tambah Transaksi</a>
  <div class="table-responsive">
    <table class="table table-striped table-hover" id="produkTable">
      <thead>
        <tr>
          <th>ID Produk</th>
          <th>Tanggal Beli</th>
          <th>Nama Produk</th>
          <th>Harga Item</th>
          <th>Diskon (%)</th>
          <th>Jumlah Beli</th>
          <th>Total Bayar</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM crud_047");
        while ($row = mysqli_fetch_assoc($query)) :
          $total = ($row['harga_item'] * $row['jumlah_beli']) * (1 - ($row['diskon'] / 100));
        ?>
        <tr>
          <td><?= $row['id_produk'] ?></td>
          <td><?= date('d-m-Y H:i', strtotime($row['tgl_beli'])) ?></td>
          <td><?= $row['nama_produk'] ?></td>
          <td>Rp <?= number_format($row['harga_item'], 2, ',', '.') ?></td>
          <td><?= $row['diskon'] ?>%</td>
          <td><?= $row['jumlah_beli'] ?></td>
          <td>Rp <?= number_format($total, 2, ',', '.') ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id_produk'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <button class="btn btn-danger btn-sm" onclick="hapusData('<?= $row['id_produk'] ?>')">Hapus</button>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function () {
    $('#produkTable').DataTable({
      "language": {
        "search": "Cari:",
        "lengthMenu": "Tampilkan _MENU_ entri",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "paginate": {
          "next": "Berikutnya",
          "previous": "Sebelumnya"
        }
      }
    });
  });

  function hapusData(id) {
    Swal.fire({
      title: 'Yakin hapus produk ini?',
      text: "Data yang dihapus tidak bisa dikembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = 'hapus.php?id=' + id;
      }
    });
  }
</script>
</body>
</html>
