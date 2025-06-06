<?php
include 'config/koneksi.php';
?>

<h2>Gaji Karyawan</h2>

<a href="../forms/add_gaji.php">
    <button class="btn btn-primary" type="button">+ Tambah Gaji Karyawan</button>
</a>
<br><br>

<!-- Tambahkan pembungkus agar tabel responsif di HP -->
<div class="table-responsive">
    <table border="1" cellpadding="10" cellspacing="0" class="table text-center table-bordered table-hover">
        <tr class="table-dark">
            <th>No</th>
            <th>Nama Karyawan</th>
            <th>Periode</th>
            <th>Total Gaji</th>
            <th>Aksi</th>
        </tr>
        <?php
$no = 1;
$bulan = [
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember',
];

$query = mysqli_query($conn, "SELECT gaji.*, karyawan.nama FROM gaji 
                              JOIN karyawan ON gaji.id_karyawan = karyawan.id");

while ($data = mysqli_fetch_assoc($query)) {
    $periode = $data['periode']; // tipe DATE 'YYYY-MM-DD', contoh '2025-06-01'
    $bln = substr($periode, 5, 2);
    $thn = substr($periode, 0, 4);

    $periode_format = isset($bulan[$bln]) ? $bulan[$bln] . ' ' . $thn : $periode;

    echo "<tr>
            <td>$no</td>
            <td>{$data['nama']}</td>
            <td>$periode_format</td>
            <td>" . number_format($data['total_pendapatan']) . "</td>
            <td>
                <div class='d-flex justify-content-center flex-wrap gap-2'>
                    <a href='forms/detail_gaji.php?id={$data['id']}'>
                        <button class='btn btn-info btn-sm px-3' type='button'><i class='bi bi-info-circle'></i></button>
                    </a> 
                    <a href='forms/edit_gaji.php?id={$data['id']}'>
                        <button class='btn btn-warning btn-sm px-3' type='button'><i class='bi bi-pencil'></i></button>
                    </a> 
                    <a href='forms/hapus_gaji.php?id={$data['id']}' onclick=\"return confirm('Yakin hapus?')\">
                        <button class='btn btn-danger btn-sm px-3' type='button'><i class='bi bi-trash3-fill'></i></button>
                    </a>
                </div>
            </td>
          </tr>";
    $no++;
}
?>

    </table>
</div>
