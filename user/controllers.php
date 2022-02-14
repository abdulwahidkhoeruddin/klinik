<?php
function tambah($data)
{
    global $conn;

    $Kategori = htmlspecialchars($data["Kategori"]);
    $UserName = htmlspecialchars($data["UserName"]);
    $Password = $data["Password"];
    $Password2 = $data["Password2"];

    // cek kategori sudah ada atau belum
    $cekKategori = mysqli_query($conn, "SELECT Kategori FROM user WHERE Kategori = '$Kategori'");
    if (
        mysqli_fetch_assoc($cekKategori)
    ) {
        echo "<script>
				alert('Kategori sudah terdaftar!')
		      </script>";
        return false;
    }

    // cek konfirmasi password
    if ($Password !== $Password2) {
        echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
        return false;
    }

    // enkripsi password
    $Password = password_hash($Password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user VALUES ('', '$Kategori', '$UserName', '$Password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $IdUser = htmlspecialchars($data["IdUser"]);
    $UserName = htmlspecialchars($data["UserName"]);
    $PasswordLama = $data["PasswordLama"];
    $PasswordBaru = $data["PasswordBaru"];
    $PasswordBaru2 = $data["PasswordBaru2"];

    // Cek password lama
    $userResult = mysqli_query($conn, "SELECT * FROM user WHERE IdUser = '$IdUser'");
    $userRow = mysqli_fetch_assoc($userResult);

    $userPassword = $userRow["Password"];

    if (!password_verify($PasswordLama, $userPassword)) {
        echo "<script>
				alert('Kata sandi lama salah!')
		      </script>";
        return false;
    }

    // cek konfirmasi password
    if ($PasswordBaru !== $PasswordBaru2) {
        echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
        return false;
    }

    // enkripsi password
    $PasswordBaru = password_hash($PasswordBaru, PASSWORD_DEFAULT);

    $query = "UPDATE user SET UserName='$UserName', Password='$PasswordBaru'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE IdUser = $id");
    return mysqli_affected_rows($conn);
}
