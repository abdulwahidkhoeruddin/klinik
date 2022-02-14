<?php
$title = "Tambah User";
require "../template/header.php";
require "controllers.php";

$daftarKategori = query("SELECT Nilai, Kategori FROM kategori");

if (isset($_POST["tambah"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href='index.php';
        </script>";
    } else {
        echo "<script>
            alert('data gagal ditambahkan!');
            document.location.href='tambah.php';
        </script>";
    }
}
?>
<h3 class="mt-3"><?= $title; ?></h3>
<div class="row">
    <div class="col-lg-6">
        <form action="" method="post">
            <div class="mb-3">
                <select name="Kategori" class="form-select" aria-label="Default select example" required>
                    <?php foreach ($daftarKategori as $kategori) : ?>
                        <?php if ($kategori["Kategori"] === "Pasien") : ?>
                            <option value="<?= $kategori["Nilai"]; ?>" hidden><?= $kategori["Kategori"]; ?></option>
                        <?php else : ?>
                            <option value="<?= $kategori["Nilai"]; ?>"><?= $kategori["Kategori"]; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="UserName" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="UserName" name="UserName" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="Password" name="Password" required autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="Password2" class="form-label">Konfirmasi kata Sandi</label>
                <input type="password" class="form-control" id="Password2" name="Password2" required autocomplete="off">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-sm" name="tambah">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php require "../template/footer.php"; ?>