<?php 
include_once '../config/koneksi.php';

$query = "SELECT * FROM jabatan ORDER BY id ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Jabatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="text-center mb-4 text-primary fw-bold">Detail Data Jabatan</h3>

    <div class="card shadow-sm rounded">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Total Gaji</th>
                            <th>Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        while ($jabatan = mysqli_fetch_assoc($result)) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($jabatan['nama']) ?></td>
                                <td>Rp <?= number_format($jabatan['gaji_pokok'], 0, ',', '.') ?></td>
                                <td>Rp <?= number_format($jabatan['tunjangan'], 0, ',', '.') ?></td>
                                <td>Rp <?= number_format($jabatan['gaji_pokok'] + $jabatan['tunjangan'], 0, ',', '.') ?></td>
                                <td><?= date('d M Y', strtotime($jabatan['created_at'])) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <a href="../index.php?page=jabatan" class="btn btn-secondary mt-3">
                ← Kembali
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
