<?php
include 'config/koneksi.php';
?>

<h2>Tarif Lembur</h2>

<a href="../forms/add_lembur.php">
    <button class="btn btn-primary" type="button">+ Tambah Tarif Lembur</button>
</a>
<br><br>

<table border="1" cellpadding="10" cellspacing="0" class="table text-center table-bordered table-hover">
    <tr class="table-dark">
        <th>No</th>
        <th>Nama Jabatan</th>
        <th>Tarif</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    // Ambil data lembur + nama jabatan
    $query = mysqli_query($conn, "
        SELECT lembur.id, jabatan.nama AS nama_jabatan, lembur.tarif
        FROM lembur
        JOIN jabatan ON lembur.id_jabatan = jabatan.id
    ");
    while ($data = mysqli_fetch_assoc($query)) {
        echo "<tr>
                <td>{$no}</td>
                <td>" . htmlspecialchars($data['nama_jabatan']) . "</td>
                <td>" . number_format($data['tarif']) . "</td>
                <td>
                    <div class='d-flex justify-content-center flex-wrap gap-2'>
                        <a href='forms/detail_lembur.php?id={$data['id']}'>
                            <button class='btn btn-info btn-sm px-3' type='button'><i class='bi bi-info-circle'></i></button>
                        </a> 
                        <a href='forms/edit_lembur.php?id={$data['id']}'>
                            <button class='btn btn-warning btn-sm px-3' type='button'><i class='bi bi-pencil'></i></button>
                        </a> 
                        <a href='forms/hapus_lembur.php?id={$data['id']}' onclick=\"return confirm('Yakin hapus?')\">
                            <button class='btn btn-danger btn-sm px-3' type='button'><i class='bi bi-trash3-fill'></i></button>
                        </a>
                    </div>
                </td>
              </tr>";
        $no++;
    }
    ?>
</table>
