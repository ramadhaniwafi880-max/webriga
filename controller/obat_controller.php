<?php

include "model/obat_model.php";

function getObatAll($limit = 5, $offset = 0)
{
    $data = getDataObat($limit, $offset);

    $result = [];

    while ($r = $data->fetch_array()) {
        $result[] = $r;
    }

    return $result;
}

function getTotalObat()
{
    return countObat();
}

function getObatId($id = null)
{
    if (!$id) {
        return false;
    }

    $data = getDataObat(0, 0, $id);

    return $data->fetch_assoc();
}

function tambahObat($data = [])
{
    if (!$data) {
        return [
            'error' => true,
            'message' => 'Data obat tidak valid'
        ];
    }

    $insert = insertDataObat($data);

    if (isset($insert['error']) && $insert['error']) {
        return [
            'error' => true,
            'message' => $insert['message']
        ];
    }

    if ($insert) {
        return [
            'error' => false,
            'message' => 'Obat berhasil ditambahkan'
        ];
    } else {
        return [
            'error' => true,
            'message' => 'Gagal menambahkan obat'
        ];
    }
}

function ubahObat($id = null, $data = [])
{
    if (!$id || !$data) {
        return [
            'error' => true,
            'message' => 'ID atau data tidak valid'
        ];
    }

    $update = updateDataObat($id, $data);

    if ($update) {
        return [
            'error' => false,
            'message' => 'Obat berhasil diperbarui'
        ];
    } else {
        return [
            'error' => true,
            'message' => 'Gagal memperbarui obat'
        ];
    }
}

function hapusObat($id = null)
{
    if (!$id) {
        return [
            'error' => true,
            'message' => 'ID tidak valid'
        ];
    }

    $delete = deleteDataObat($id);

    if ($delete) {
        return [
            'error' => false,
            'message' => 'Obat berhasil dihapus'
        ];
    } else {
        return [
            'error' => true,
            'message' => 'Gagal menghapus obat'
        ];
    }
}

?>