<?php

require_once "model/supplier_model.php";

function getSupplierAll($limit = 5, $offset = 0)
{
    $data = getDataSupplier($limit, $offset);

    $result = [];

    while ($r = $data->fetch_array()) {
        $result[] = $r;
    }

    return $result;
}

function getTotalSupplier()
{
    return countSupplier();
}

function getSupplierId($id = null)
{
    if (!$id) {
        return false;
    }

    $data = getDataSupplier(0, 0, $id);

    return $data->fetch_assoc();
}

function tambahSupplier($data = [])
{
    if (!$data) {

        return [
            'error' => true,
            'message' => 'Data supplier tidak valid'
        ];
    }

    $insert = insertDataSupplier($data);

    if ($insert) {

        return [
            'error' => false,
            'message' => 'Supplier berhasil ditambahkan'
        ];

    } else {

        return [
            'error' => true,
            'message' => 'Gagal menambahkan supplier'
        ];
    }
}

function ubahSupplier($id = null, $data = [])
{
    if (!$id || !$data) {

        return [
            'error' => true,
            'message' => 'Data tidak valid'
        ];
    }

    $update = updateDataSupplier($id, $data);

    if ($update) {

        return [
            'error' => false,
            'message' => 'Supplier berhasil diperbarui'
        ];

    } else {

        return [
            'error' => true,
            'message' => 'Gagal memperbarui supplier'
        ];
    }
}

function hapusSupplier($id = null)
{
    if (!$id) {

        return [
            'error' => true,
            'message' => 'ID tidak valid'
        ];
    }

    $delete = deleteDataSupplier($id);

    if ($delete) {

        return [
            'error' => false,
            'message' => 'Supplier berhasil dihapus'
        ];

    } else {

        return [
            'error' => true,
            'message' => 'Gagal menghapus supplier'
        ];
    }
}

?>