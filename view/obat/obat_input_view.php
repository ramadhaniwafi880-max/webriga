<?php

include "controller/obat_controller.php";

// cek submit
if (isset($_POST['submit'])) {

    $data = [
        'kode_obat' => $_POST['kode_obat'],
        'nama_obat' => $_POST['nama_obat'],
        'harga' => $_POST['harga'],
        'stok' => $_POST['stok']
    ];

    $result = tambahObat($data);

    if ($result['error']) {

        echo "
        <script>
            alert('{$result['message']}');
        </script>
        ";

    } else {

        echo "
        <script>
            alert('{$result['message']}');
            window.location.href='" . url('obat') . "';
        </script>
        ";
    }
}

?>

<div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow">

    <h1 class="text-2xl font-bold text-gray-700 mb-6">
        Tambah Obat
    </h1>

    <form method="POST">

        <div class="mb-4">

            <label class="block mb-2 text-gray-600">
                Kode Obat
            </label>

            <input type="text"
                   name="kode_obat"
                   required
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">

        </div>

        <div class="mb-4">

            <label class="block mb-2 text-gray-600">
                Nama Obat
            </label>

            <input type="text"
                   name="nama_obat"
                   required
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">

        </div>

        <div class="mb-4">

            <label class="block mb-2 text-gray-600">
                Harga
            </label>

            <input type="number"
                   name="harga"
                   required
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">

        </div>

        <div class="mb-6">

            <label class="block mb-2 text-gray-600">
                Stok
            </label>

            <input type="number"
                   name="stok"
                   required
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">

        </div>

        <div class="flex gap-3">

            <button type="submit"
                    name="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg transition">
                Simpan
            </button>

            <a href="<?= url('obat'); ?>"
               class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg transition">
                Kembali
            </a>

        </div>

    </form>

</div>