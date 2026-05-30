<?php

include "config/Database.php";

// ambil data obat
$dataObat = mysqli_query($db, "
    SELECT * FROM obat
");

// ambil data supplier
$dataSupplier = mysqli_query($db, "
    SELECT * FROM supplier
");


// proses simpan
if (isset($_POST['submit'])) {

    $id_obat = $_POST['id_obat'];
    $id_supplier = $_POST['id_supplier'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    $query = mysqli_query($db, "
        INSERT INTO penjualan
        (id_obat, id_supplier, jumlah, tanggal)

        VALUES
        ('$id_obat', '$id_supplier', '$jumlah', '$tanggal')
    ");

    if ($query) {

        echo "
        <script>
            alert('Penjualan berhasil ditambahkan');
            window.location.href='index.php?page=penjualan';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Penjualan gagal ditambahkan');
        </script>
        ";
    }
}

?>

<div class="bg-white p-6 rounded-xl shadow max-w-2xl">

    <h1 class="text-2xl font-bold mb-6">
        Tambah Penjualan
    </h1>

    <form method="POST">

        <!-- OBAT -->
        <div class="mb-4">

            <label class="block mb-2">
                Pilih Obat
            </label>

            <select
                name="id_obat"
                required
                class="w-full border rounded-lg px-4 py-2"
            >

                <option value="">
                    -- Pilih Obat --
                </option>

                <?php while ($obat = mysqli_fetch_assoc($dataObat)) : ?>

                    <option value="<?= $obat['id']; ?>">

                        <?= $obat['nama_obat']; ?>

                    </option>

                <?php endwhile; ?>

            </select>

        </div>



        <!-- SUPPLIER -->
        <div class="mb-4">

            <label class="block mb-2">
                Pilih Supplier
            </label>

            <select
                name="id_supplier"
                required
                class="w-full border rounded-lg px-4 py-2"
            >

                <option value="">
                    -- Pilih Supplier --
                </option>

                <?php while ($supplier = mysqli_fetch_assoc($dataSupplier)) : ?>

                    <option value="<?= $supplier['id']; ?>">

                        <?= $supplier['nama_supplier']; ?>

                    </option>

                <?php endwhile; ?>

            </select>

        </div>



        <!-- JUMLAH -->
        <div class="mb-4">

            <label class="block mb-2">
                Jumlah
            </label>

            <input
                type="number"
                name="jumlah"
                required
                class="w-full border rounded-lg px-4 py-2"
            >

        </div>



        <!-- TANGGAL -->
        <div class="mb-6">

            <label class="block mb-2">
                Tanggal
            </label>

            <input
                type="date"
                name="tanggal"
                required
                class="w-full border rounded-lg px-4 py-2"
            >

        </div>



        <!-- BUTTON -->
        <button
            type="submit"
            name="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg"
        >
            Simpan
        </button>

    </form>

</div>