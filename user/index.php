<?php $title = "Halaman User";
require "../template/header.php";

$daftarUser = query("SELECT * FROM user");
?>

<h3 class="mt-3">Daftar User</h3>
<div class="row">
    <div class="col-lg-12 text-end">
        <a href="tambah.php" class="btn btn-primary btn-sm">Tambah</a>
    </div>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kategori</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;
        foreach ($daftarUser as $user) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $user["Kategori"]; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $user["IdUser"]; ?>" class="btn btn-warning btn-sm">Ubah</a>
                    <a href="hapus.php?id=<?= $user["IdUser"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin?');">Hapus</a>
                </td>
            </tr>
        <?php $i++;
        endforeach; ?>
    </tbody>
</table>


<?php require "../template/footer.php"; ?>