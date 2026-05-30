<?php

include "controller/supplier_controller.php";

$id = $_GET['id'];

$supplier = getSupplierId($id);

if (isset($_POST['submit'])) {

    $data = [
        'nama_supplier' => $_POST['nama_supplier'],
        'alamat' => $_POST['alamat'],
        'telepon' => $_POST['telepon']
    ];

    $result = ubahSupplier($id, $data);

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
            window.location.href='" . url('supplier') . "';
        </script>
        ";
    }
}

?>

<div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow">

    <h1 class="text-2xl font-bold mb-6">
        Edit Supplier
    </h1>

    <form method="POST">

        <div class="mb-4">

            <label class="block mb-2">
                Nama Supplier
            </label>

            <input type="text"
                   name="nama_supplier"
                   value="<?= $supplier['nama_supplier']; ?>"
                   required
                   class="w-full border rounded-lg px-4 py-2">

        </div>

        <div class="mb-4">

            <label class="block mb-2">
                Alamat
            </label>

            <textarea name="alamat"
                      required
                      class="w-full border rounded-lg px-4 py-2"><?= $supplier['alamat']; ?></textarea>

        </div>

        <div class="mb-6">

            <label class="block mb-2">
                Telepon
            </label>

            <input type="text"
                   name="telepon"
                   value="<?= $supplier['telepon']; ?>"
                   required
                   class="w-full border rounded-lg px-4 py-2">

        </div>

        <div class="flex gap-3">

            <button type="submit"
                    name="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg">
                Update
            </button>

            <a href="<?= url('supplier'); ?>"
               class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg">
                Kembali
            </a>

        </div>

    </form>

</div>