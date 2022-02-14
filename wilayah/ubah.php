<?php
$title = "Ubah Wilayah";
require "../template/header.php";
require "controllers.php";

$id = $_GET["id"];
$wilayah = query("SELECT * FROM wilayah WHERE IdWilayah=$id")[0];

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
            <input type="hidden" name="IdWilayah" value="<?= $wilayah["IdWilayah"]; ?>">
            <div class="mb-3">
                <label for="Wilayah" class="form-label">Wilayah</label>
                <input type="text" class="form-control" id="Wilayah" name="Wilayah" value="<?= $wilayah["Wilayah"]; ?>" required autofocus autocomplete="off">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-sm" name="ubah">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php require "../template/footer.php"; ?>