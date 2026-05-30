<?php

require_once "model/penjualan_model.php";

function getPenjualanAll()
{
    $data = getDataPenjualan();

    $result = [];

    while ($r = $data->fetch_assoc()) {
        $result[] = $r;
    }

    return $result;
}



function tambahPenjualan($data)
{
    $insert = insertDataPenjualan($data);

    if ($insert) {

        return [
            'error' => false,
            'message' => 'Penjualan berhasil ditambahkan'
        ];

    } else {

        return [
            'error' => true,
            'message' => 'Penjualan gagal ditambahkan'
        ];
    }
}



function hapusPenjualan($id)
{
    $delete = deleteDataPenjualan($id);

    if ($delete) {

        return [
            'error' => false,
            'message' => 'Penjualan berhasil dihapus'
        ];

    } else {

        return [
            'error' => true,
            'message' => 'Penjualan gagal dihapus'
        ];
    }
}

?>