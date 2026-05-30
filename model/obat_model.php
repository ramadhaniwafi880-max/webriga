<?php

function getDataObat($limit = 5, $offset = 0, $id = null)
{
    global $db;

    if ($id === null) {

        $data = $db->query("
            SELECT * FROM obat
            ORDER BY id ASC
            LIMIT $limit OFFSET $offset
        ");

    } else {

        $data = $db->query("
            SELECT * FROM obat
            WHERE id = $id
        ");
    }

    return $data;
}

function countObat()
{
    global $db;

    $result = $db->query("
        SELECT COUNT(*) AS total FROM obat
    ");

    $row = $result->fetch_assoc();

    return $row['total'];
}

function insertDataObat($data)
{
    global $db;

    $kode_obat = $data['kode_obat'];
    $nama_obat = $data['nama_obat'];
    $harga = $data['harga'];
    $stok = $data['stok'];

    // VALIDASI DUPLIKAT
    $cek = $db->query("
        SELECT * FROM obat
        WHERE kode_obat = '$kode_obat'
    ");

    if ($cek->num_rows > 0) {

        return [
            'error' => true,
            'message' => 'Kode obat sudah digunakan'
        ];
    }

    $query = "
        INSERT INTO obat
        (kode_obat, nama_obat, harga, stok)
        VALUES
        ('$kode_obat', '$nama_obat', '$harga', '$stok')
    ";

    $result = $db->query($query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function updateDataObat($id, $data)
{
    global $db;

    $kode_obat = $data['kode_obat'];
    $nama_obat = $data['nama_obat'];
    $harga = $data['harga'];
    $stok = $data['stok'];

    $query = "
        UPDATE obat
        SET
            kode_obat = '$kode_obat',
            nama_obat = '$nama_obat',
            harga = '$harga',
            stok = '$stok'
        WHERE id = $id
    ";

    $result = $db->query($query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function deleteDataObat($id)
{
    global $db;

    $query = "
        DELETE FROM obat
        WHERE id = $id
    ";

    $result = $db->query($query);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

?>