<?php

session_start();

if (!isset($_SESSION['data']) || $_SESSION['data']['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

include_once '../../controllers/c_tiket.php';

$data['title'] = "Dashboard Admin";

include '../layout/header.php';
include '../layout/navbar.php';

?>

<h1 class="text-3xl font-bold mb-6">
    Manajemen Tiket
</h1>

<div class="bg-white p-6 rounded shadow">

    <!-- Tombol Tambah -->
    <div class="mb-4">
        <a href="tambah_tiket.php"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Tiket
        </a>
    </div>

    <!-- Wrapper agar responsive -->
    <div class="overflow-x-auto">

        <table class="w-full table-auto bg-white border border-gray-200">

            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b text-left">
                        No
                    </th>

                    <th class="py-2 px-4 border-b text-left">
                        Kategori
                    </th>

                    <th class="py-2 px-4 border-b text-left">
                        Harga
                    </th>

                    <th class="py-2 px-4 border-b text-center">
                        Aksi
                    </th>
                </tr>
            </thead>

            <tbody>

                <?php
                $data_tiket = $tiket->getAll();

                if (!empty($data_tiket)) {

                    foreach ($data_tiket as $key => $value) {
                ?>

                        <tr class="hover:bg-gray-50">

                            <td class="py-2 px-4 border-b">
                                <?php echo $key + 1; ?>
                            </td>

                            <td class="py-2 px-4 border-b">
                                <?php echo $value['kategori']; ?>
                            </td>

                            <td class="py-2 px-4 border-b">
                                Rp<?php echo number_format($value['harga'], 0, ',', '.'); ?>
                            </td>

                            <td class="py-2 px-4 border-b text-center space-x-2">

                                <a href="edit_tiket.php?id=<?php echo $value['id_tiket']; ?>"
                                    class="text-blue-500 hover:text-blue-700 font-semibold">
                                    Edit
                                </a>

                                <a href="../../controllers/c_tiket.php?aksi=delete&id=<?php echo $value['id_tiket']; ?>"
                                    class="text-red-500 hover:text-red-700 font-semibold"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus tiket ini?')">
                                    Delete
                                </a>

                            </td>

                        </tr>

                <?php
                    }

                } else {
                ?>

                    <tr>
                        <td colspan="4" class="py-4 text-center text-gray-500">
                            Data tiket belum tersedia
                        </td>
                    </tr>

                <?php
                }
                ?>

            </tbody>

        </table>

    </div>

</div>

<?php

include '../layout/footer.php';

?>