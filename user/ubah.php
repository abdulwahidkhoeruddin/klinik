<?php
$title = "Ubah User";
require "../template/header.php";
require "controllers.php";

$id = $_GET["id"];
$user = query("SELECT * FROM user WHERE IdUser=$id")[0];
$daftarKategori = query("SELECT * FROM kategori");

if (isset($_POST["ubah"])) {
    if (ubah($_POST) > 0) {
        echo "<script>
            alert('data berhasil diubah');
            document.location.href='index.php';
        </script>";
    } else {
        echo "<script>
            alert('data gagal diubah!');
            document.location.href='index.php';
        </script>";
    }
}
?>
<h3 class="mt-3"><?= $title; ?></h3>
<div class="row">
    <div class="col-lg-6">
        <form action="" method="post">
            <input type="hidden" name="IdUser" value="<?= $user["IdUser"]; ?>">
            <div class="mb-3">
                <select name="Kategori" class="form-select" aria-label="Default select example" disabled>
                    <?php foreach ($daftarKategori as $kategori) : ?>
                        <?php if ($kategori["Kategori"] === "Pasien") : ?>
                            <option value="<?= $kategori["Nilai"]; ?>" hidden><?= $kategori["Kategori"]; ?></option>
                        <?php else : ?>
                            <?php if ($kategori["Kategori"] === $user["Kategori"]) : ?>
                                <option value="<?= $kategori["Nilai"]; ?>" selected><?= $kategori["Kategori"]; ?></option>
                            <?php else : ?>
                                <option value="<?= $kategori["Nilai"]; ?>"><?= $kategori["Kategori"]; ?></option>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="UserName" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="UserName" name="UserName" required autocomplete="off" value="<?= $user["UserName"]; ?>">
            </div>
            <div class="mb-3">
                <label for="PasswordLama" class="form-label">Kata Sandi Lama</label>
                <input type="password" class="form-control" id="PasswordLama" name="PasswordLama" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="PasswordBaru" class="form-label">Kata Sandi Baru</label>
                <input type="password" class="form-control" id="PasswordBaru" name="PasswordBaru" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="PasswordBaru2" class="form-label">Konfirmasi kata sandi baru</label>
                <input type="password" class="form-control" id="PasswordBaru2" name="PasswordBaru2" autocomplete="off">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-sm" name="ubah">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php require "../template/footer.php"; ?>