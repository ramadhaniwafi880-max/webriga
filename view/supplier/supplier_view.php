<?php

include "controller/supplier_controller.php";

$dataSupplier = getSupplierAll();

?>

<div class="bg-white p-6 rounded-xl shadow">

    <div class="flex justify-between mb-6">

        <h1 class="text-2xl font-bold">
            Data Supplier
        </h1>

        <a href="<?= url('supplier', 'input'); ?>"
           class="bg-blue-600 text-white px-4 py-2 rounded-lg">
            + Tambah Supplier
        </a>

    </div>

    <table class="w-full border">

        <thead class="bg-blue-600 text-white">

            <tr>
                <th class="border p-3">No</th>
                <th class="border p-3">Nama Supplier</th>
                <th class="border p-3">Alamat</th>
                <th class="border p-3">Telepon</th>
                <th class="border p-3">Aksi</th>
            </tr>

        </thead>

        <tbody>

            <?php
            $no = 1;

            foreach ($dataSupplier as $row) :
            ?>

            <tr>

                <td class="border p-3"><?= $no++; ?></td>

                <td class="border p-3">
                    <?= $row['nama_supplier']; ?>
                </td>

                <td class="border p-3">
                    <?= $row['alamat']; ?>
                </td>

                <td class="border p-3">
                    <?= $row['telepon']; ?>
                </td>

                <td class="border p-3">

                    <a href="<?= url('supplier', 'edit', $row['id']); ?>"
                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <a href="<?= url('supplier', 'delete', $row['id']); ?>"
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