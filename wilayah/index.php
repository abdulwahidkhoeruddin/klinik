<?php $title = "Halaman Wilayah";
require "../template/header.php";

$daftarWilayah = query("SELECT * FROM wilayah");
?>

<h3 class="mt-3">Daftar Wilayah</h3>
<div class="row">
    <div class="col-lg-12 text-end">
        <a href="tambah.php" class="btn btn-primary btn-sm">Tambah</a>
    </div>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Wilayah</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($daftarWilayah as $wilayah) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $wilayah["Wilayah"]; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $wilayah["IdWilayah"]; ?>" class="btn btn-warning btn-sm">Ubah</a>
                    <a href="hapus.php?id=<?= $wilayah["IdWilayah"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin?');">Hapus</a>
                </td>
            </tr>
        <?php $i++;
        endforeach; ?>
    </tbody>
</table>


<?php require "../template/footer.php"; ?>