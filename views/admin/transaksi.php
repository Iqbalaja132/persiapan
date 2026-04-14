<?php

session_start();

if (!isset($_SESSION['data']) || $_SESSION['data']['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

include_once '../../controllers/c_transaksi.php';

$data['title'] = "Kelola Transaksi";

include '../layout/header.php';
include '../layout/navbar.php';

?>

<h1 class="text-3xl font-bold mb-6">
    Kelola Transaksi
</h1>

<div class="bg-white p-6 rounded shadow">

    <div class="mb-4">
        <a href="tambah_transaksi.php"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Transaksi
        </a>
    </div>

    <div class="overflow-x-auto">

        <table class="w-full table-auto bg-white border border-gray-200">

            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b text-left">No</th>
                    <th class="py-2 px-4 border-b text-left">Nama Customer</th>
                    <th class="py-2 px-4 border-b text-left">Kategori Tiket</th>
                    <th class="py-2 px-4 border-b text-left">Jumlah Orang</th>
                    <th class="py-2 px-4 border-b text-left">Total Harga</th>
                    <th class="py-2 px-4 border-b text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $data_transaksi = $transaksi->getAll();

                if (!empty($data_transaksi)) {
                    foreach ($data_transaksi as $key => $value) {
                ?>

                    <tr class="hover:bg-gray-50">

                        <td class="py-2 px-4 border-b">
                            <?= $key + 1; ?>
                        </td>

                        <td class="py-2 px-4 border-b">
                            <?= $value['nama']; ?><br>
                            <span class="text-gray-400 text-sm"><?= $value['username']; ?></span>
                        </td>

                        <td class="py-2 px-4 border-b">
                            <?= $value['kategori']; ?>
                        </td>

                        <td class="py-2 px-4 border-b">
                            <?= $value['jumlah_orang']; ?> orang
                        </td>

                        <td class="py-2 px-4 border-b">
                            Rp<?= number_format($value['total_harga'], 0, ',', '.'); ?>
                        </td>

                        <td class="py-2 px-4 border-b text-center">
                            <a href="../../controllers/c_transaksi.php?aksi=delete&id=<?= $value['id_transaksi']; ?>"
                                class="text-red-500 hover:text-red-700 font-semibold"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">
                                Delete
                            </a>
                        </td>

                    </tr>

                <?php
                    }
                } else {
                ?>

                    <tr>
                        <td colspan="6" class="py-4 text-center text-gray-500">
                            Belum ada data transaksi
                        </td>
                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>

<?php include '../layout/footer.php'; ?>