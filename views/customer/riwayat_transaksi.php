<?php

session_start();

if (!isset($_SESSION['data']) || $_SESSION['data']['role'] !== 'customer') {
    header("Location: ../auth/login.php");
    exit;
}

include_once '../../controllers/c_transaksi.php';

$data['title'] = "Riwayat Transaksi";

include '../layout/header.php';
include '../layout/navbar.php';

$id_user = $_SESSION['data']['id_user'];

?>

<h1 class="text-3xl font-bold mb-6">
    Riwayat Transaksi
</h1>

<div class="bg-white p-6 rounded shadow">

    <div class="overflow-x-auto">

        <table class="w-full table-auto bg-white border border-gray-200">

            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b text-left">No</th>
                    <th class="py-2 px-4 border-b text-left">Kategori Tiket</th>
                    <th class="py-2 px-4 border-b text-left">Jumlah Orang</th>
                    <th class="py-2 px-4 border-b text-left">Total Harga</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $data_transaksi = $transaksi->getByUser($id_user);

                if (!empty($data_transaksi)) {
                    foreach ($data_transaksi as $key => $value) {
                ?>

                    <tr class="hover:bg-gray-50">

                        <td class="py-2 px-4 border-b">
                            <?= $key + 1; ?>
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

                    </tr>

                <?php
                    }
                } else {
                ?>

                    <tr>
                        <td colspan="4" class="py-4 text-center text-gray-500">
                            Belum ada riwayat transaksi
                        </td>
                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

</div>

<?php include '../layout/footer.php'; ?>