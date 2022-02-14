<?php
function tambah($data)
{
    global $conn;

    $Wilayah = htmlspecialchars($data["Wilayah"]);

    mysqli_query($conn, "INSERT INTO wilayah VALUES ('', '$Wilayah')");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $IdWilayah = htmlspecialchars($data["IdWilayah"]);
    $Wilayah = htmlspecialchars($data["Wilayah"]);

    mysqli_query($conn, "UPDATE wilayah SET Wilayah='$Wilayah' WHERE IdWilayah=$IdWilayah");

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM wilayah WHERE IdWilayah = $id");
    return mysqli_affected_rows($conn);
}
