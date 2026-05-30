<?php

require_once "controller/penjualan_controller.php";

$dataPenjualan = getPenjualanAll();

?>

<div class="bg-white p-6 rounded-xl shadow">

    <div class="flex justify-between mb-6">

        <h1 class="text-2xl font-bold">
            Data Penjualan
        </h1>

        <a href="<?= url('penjualan', 'input'); ?>"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            + Tambah Penjualan
        </a>

    </div>

    <table class="w-full border">

        <thead class="bg-blue-600 text-white">

            <tr>
                <th class="border p-3">No</th>
                <th class="border p-3">Obat</th>
                <th class="border p-3">Supplier</th>
                <th class="border p-3">Jumlah</th>
                <th class="border p-3">Tanggal</th>
                <th class="border p-3">Aksi</th>
            </tr>

        </thead>

        <tbody>

            <?php
            $no = 1;

            foreach ($dataPenjualan as $row) :
            ?>

            <tr>

                <td class="border p-3"><?= $no++; ?></td>

                <td class="border p-3">
                    <?= $row['nama_obat']; ?>
                </td>

                <td class="border p-3">
                    <?= $row['nama_supplier']; ?>
                </td>

                <td class="border p-3">
                    <?= $row['jumlah']; ?>
                </td>

                <td class="border p-3">
                    <?= $row['tanggal']; ?>
                </td>

                <td class="border p-3">

                    <a href="<?= url('penjualan', 'delete', $row['id']); ?>"
                       onclick="return confirm('Yakin hapus data?')"
                       class="bg-red-600 text-white px-3 py-1 rounded">
                        Hapus
                    </a>

                </td>

            </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>