<?php

include "controller/obat_controller.php";

// pagination
$page = isset($_GET['hal']) ? (int) $_GET['hal'] : 1;

$limit = 5;

$offset = ($page - 1) * $limit;

// ambil data obat
$dataObat = getObatAll($limit, $offset);

$totalObat = getTotalObat();

$totalPages = ceil($totalObat / $limit);

?>

<div class="bg-white p-6 rounded-xl shadow">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold text-gray-700">
            Data Obat
        </h1>

        <a href="<?= url('obat', 'input'); ?>"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
            + Tambah Obat
        </a>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full border border-gray-200">

            <thead class="bg-blue-600 text-white">

                <tr>
                    <th class="py-3 px-4 border">No</th>
                    <th class="py-3 px-4 border">Kode Obat</th>
                    <th class="py-3 px-4 border">Nama Obat</th>
                    <th class="py-3 px-4 border">Harga</th>
                    <th class="py-3 px-4 border">Stok</th>
                    <th class="py-3 px-4 border">Aksi</th>
                </tr>

            </thead>

            <tbody>

                <?php
                $no = $offset + 1;

                foreach ($dataObat as $row) :
                ?>

                <tr class="hover:bg-gray-100">

                    <td class="py-3 px-4 border">
                        <?= $no; ?>
                    </td>

                    <td class="py-3 px-4 border">
                        <?= $row['kode_obat']; ?>
                    </td>

                    <td class="py-3 px-4 border">
                        <?= $row['nama_obat']; ?>
                    </td>

                    <td class="py-3 px-4 border">
                        Rp <?= number_format($row['harga']); ?>
                    </td>

                    <td class="py-3 px-4 border">
                        <?= $row['stok']; ?>
                    </td>

                    <td class="py-3 px-4 border">

                        <a href="<?= url('obat', 'edit', $row['id']); ?>"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                            Edit
                        </a>

                        <a href="<?= url('obat', 'delete', $row['id']); ?>"
                           onclick="return confirm('Yakin hapus data?')"
                           class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                            Hapus
                        </a>

                    </td>

                </tr>

                <?php
                $no++;
                endforeach;
                ?>

            </tbody>

        </table>

    </div>

    <!-- PAGINATION -->
    <div class="mt-6 flex justify-center gap-2">

        <?php if ($page > 1) : ?>

            <a href="index.php?page=obat&hal=<?= $page - 1; ?>"
               class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
                Sebelumnya
            </a>

        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>

            <a href="index.php?page=obat&hal=<?= $i; ?>"
               class="px-4 py-2 rounded
               <?= $i == $page
                    ? 'bg-blue-600 text-white'
                    : 'bg-gray-200 hover:bg-gray-300'; ?>">
                <?= $i; ?>
            </a>

        <?php endfor; ?>

        <?php if ($page < $totalPages) : ?>

            <a href="index.php?page=obat&hal=<?= $page + 1; ?>"
               class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
                Selanjutnya
            </a>

        <?php endif; ?>

    </div>

</div>