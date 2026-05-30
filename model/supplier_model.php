<?php

function getDataSupplier($limit = 5, $offset = 0, $id = null)
{
    global $db;

    if ($id === null) {

        $query = "
            SELECT *
            FROM supplier
            ORDER BY id DESC
            LIMIT $limit OFFSET $offset
        ";

    } else {

        $query = "
            SELECT *
            FROM supplier
            WHERE id = $id
        ";
    }

    return $db->query($query);
}



function countSupplier()
{
    global $db;

    $query = "
        SELECT COUNT(*) as total
        FROM supplier
    ";

    $result = $db->query($query);

    $row = $result->fetch_assoc();

    return $row['total'];
}



function insertDataSupplier($data)
{
    global $db;

    $nama_supplier = $data['nama_supplier'];
    $alamat = $data['alamat'];
    $telepon = $data['telepon'];

    $query = "
        INSERT INTO supplier
        (nama_supplier, alamat, telepon)

        VALUES
        ('$nama_supplier', '$alamat', '$telepon')
    ";

    return $db->query($query);
}



function updateDataSupplier($id, $data)
{
    global $db;

    $nama_supplier = $data['nama_supplier'];
    $alamat = $data['alamat'];
    $telepon = $data['telepon'];

    $query = "
        UPDATE supplier
        SET
            nama_supplier = '$nama_supplier',
            alamat = '$alamat',
            telepon = '$telepon'
        WHERE id = $id
    ";

    return $db->query($query);
}



function deleteDataSupplier($id)
{
    global $db;

    $query = "
        DELETE FROM supplier
        WHERE id = $id
    ";

    return $db->query($query);
}

?>