<?php

function getDataPenjualan($id = null)
{
    global $db;

    if ($id == null) {

        $query = "
            SELECT
                penjualan.*,
                obat.nama_obat,
                supplier.nama_supplier

            FROM penjualan

            JOIN obat
            ON penjualan.id_obat = obat.id

            JOIN supplier
            ON penjualan.id_supplier = supplier.id

            ORDER BY penjualan.id DESC
        ";

    } else {

        $query = "
            SELECT *
            FROM penjualan
            WHERE id = $id
        ";
    }

    return $db->query($query);
}



function insertDataPenjualan($data)
{
    global $db;

    $id_obat = $data['id_obat'];
    $id_supplier = $data['id_supplier'];
    $jumlah = $data['jumlah'];
    $tanggal = $data['tanggal'];

    $query = "
        INSERT INTO penjualan
        (id_obat, id_supplier, jumlah, tanggal)

        VALUES
        ('$id_obat', '$id_supplier', '$jumlah', '$tanggal')
    ";

    return $db->query($query);
}



function deleteDataPenjualan($id)
{
    global $db;

    $query = "
        DELETE FROM penjualan
        WHERE id = $id
    ";

    return $db->query($query);
}

?>