<?php
session_start();
require 'assets/koneksi.php';

$daftarKategori = query("SELECT * FROM kategori");

if (isset($_POST["login"])) {

    $username = $_POST["UserName"];
    $password = $_POST["Password"];
    $Kategori = $_POST["Kategori"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE UserName = '$username' AND Kategori='$Kategori'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["Password"])) {
            // set session
            $_SESSION["IdUser"] = $row["IdUser"];

            header("Location: home/index.php");
            exit;
        }
    }

    $error = true;
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center mt-3">Login</h3>
        <?php if (isset($error)) : ?>
            <p style="color: red; font-style: italic;">Login gagal!</p>
        <?php endif; ?>
        <form action="" method="post">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <input type="text" name="UserName" class="form-control" placeholder="Nama pengguna">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="Password" class="form-control" placeholder="Kata sandi">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="Kategori">
                                <?php foreach ($daftarKategori as $kategori) : ?>
                                    <option><?= $kategori["Kategori"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary" name="login">Masuk</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

<!-- <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>