<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($page) {

    // ==================================================
    // HOME / DASHBOARD
    // ==================================================
    case 'home':

        include "controller/obat_controller.php";
        include "controller/supplier_controller.php";
        include "controller/penjualan_controller.php";

        $totalObat = getTotalObat();
        $totalSupplier = getTotalSupplier();

        $totalPenjualan = count(getPenjualanAll());

        echo "

        <div class='mb-8'>

            <h1 class='text-4xl font-bold text-gray-700 mb-2'>
                Dashboard Apotek
            </h1>

            <p class='text-gray-500'>
                Sistem Manajemen Apotek Berbasis PHP Native
            </p>

        </div>

        <div class='grid grid-cols-1 md:grid-cols-3 gap-6'>

            <div class='bg-blue-600 text-white p-6 rounded-2xl shadow-lg'>

                <h2 class='text-xl font-semibold mb-2'>
                    Total Obat
                </h2>

                <p class='text-4xl font-bold'>
                    $totalObat
                </p>

            </div>

            <div class='bg-green-600 text-white p-6 rounded-2xl shadow-lg'>

                <h2 class='text-xl font-semibold mb-2'>
                    Total Supplier
                </h2>

                <p class='text-4xl font-bold'>
                    $totalSupplier
                </p>

            </div>

            <div class='bg-yellow-500 text-white p-6 rounded-2xl shadow-lg'>

                <h2 class='text-xl font-semibold mb-2'>
                    Total Penjualan
                </h2>

                <p class='text-4xl font-bold'>
                    $totalPenjualan
                </p>

            </div>

        </div>

        ";

    break;



    // ==================================================
    // OBAT
    // ==================================================
    case 'obat':

        switch ($action) {

            case 'input':
                include "view/obat/obat_input_view.php";
            break;

            case 'edit':
                include "view/obat/obat_edit_view.php";
            break;

            case 'delete':

                include "controller/obat_controller.php";

                $id = $_GET['id'];

                $result = hapusObat($id);

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
                        window.location.href='index.php?page=obat';
                    </script>
                    ";
                }

            break;

            default:
                include "view/obat/obat_view.php";
            break;
        }

    break;



    // ==================================================
    // SUPPLIER
    // ==================================================
    case 'supplier':

        switch ($action) {

            case 'input':
                include "view/supplier/supplier_input_view.php";
            break;

            case 'edit':
                include "view/supplier/supplier_edit_view.php";
            break;

            case 'delete':

                include "controller/supplier_controller.php";

                $id = $_GET['id'];

                $result = hapusSupplier($id);

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
                        window.location.href='index.php?page=supplier';
                    </script>
                    ";
                }

            break;

            default:
                include "view/supplier/supplier_view.php";
            break;
        }

    break;



    // ==================================================
    // PENJUALAN
    // ==================================================
    case 'penjualan':

        switch ($action) {

            case 'input':
                include "view/penjualan/penjualan_input_view.php";
            break;

            case 'delete':

                include "controller/penjualan_controller.php";

                $id = $_GET['id'];

                $result = hapusPenjualan($id);

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
                        window.location.href='index.php?page=penjualan';
                    </script>
                    ";
                }

            break;

            default:
                include "view/penjualan/penjualan_view.php";
            break;
        }

    break;



    // ==================================================
    // 404
    // ==================================================
    default:

        echo "

        <div class='bg-white p-8 rounded-2xl shadow'>

            <h1 class='text-3xl font-bold text-red-600 mb-4'>
                404 Halaman Tidak Ditemukan
            </h1>

            <a
                href='index.php'
                class='bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg'
            >
                Kembali ke Dashboard
            </a>

        </div>

        ";

    break;
}

?>