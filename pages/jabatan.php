<?php
include 'config/koneksi.php';
?>

<h2>Daftar Jabatan</h2>

<a href="forms/add_jabatan.php">
    <button class="btn btn-primary" type="button">+ Tambah Jabatan</button>
</a>
<br><br>

<!-- Tambahkan div class="table-responsive" -->
<div class="table-responsive">
    <table class="table text-center table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($conn, "SELECT * FROM jabatan");
            while ($data = mysqli_fetch_assoc($query)) {
                echo "<tr>
                        <td>$no</td>
                        <td>{$data['nama']}</td>
                        <td>Rp " . number_format($data['gaji_pokok']) . "</td>
                        <td>Rp " . number_format($data['tunjangan']) . "</td>
                        <td>
                            <div class='d-flex justify-content-center flex-wrap gap-2'>
                                <a href='forms/detail_jabatan.php?id={$data['id']}'>
                                    <button class='btn btn-info btn-sm px-3' type='button'><i class='bi bi-info-circle'></i></button>
                                </a> 
                                <a href='forms/edit_jabatan.php?id={$data['id']}'>
                                    <button class='btn btn-warning btn-sm px-3' type='button'><i class='bi bi-pencil'></i></button>
                                </a> 
                                <a href='forms/hapus_jabatan.php?id={$data['id']}' onclick=\"return confirm('Yakin hapus?')\">
                                    <button class='btn btn-danger btn-sm px-3' type='button'><i class='bi bi-trash3-fill'></i></button>
                                </a>
                            </div>
                        </td>
                      </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>
