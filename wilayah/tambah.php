<?php
$title = "Tambah Wilayah";
require "../template/header.php";
require "controllers.php";

if (isset($_POST["tambah"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href='index.php';
        </script>";
    } else {
        echo "<script>
            alert('data gagal ditambahkan!');
            document.location.href='index.php';
        </script>";
    }
}
?>
<h3 class="mt-3"><?= $title; ?></h3>
<div class="row">
    <div class="col-lg-6">
        <form action="" method="post">
            <div class="mb-3">
                <label for="Wilayah" class="form-label">Wilayah</label>
                <input type="text" class="form-control" id="Wilayah" name="Wilayah" required autofocus autocomplete="off">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-sm" name="tambah">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php require "../template/footer.php"; ?>