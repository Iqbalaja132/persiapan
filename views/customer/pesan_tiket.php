<?php

session_start();

if (!isset($_SESSION['data']) || $_SESSION['data']['role'] !== 'customer') {
    header("Location: ../auth/login.php");
    exit;
}

include_once '../../controllers/c_transaksi.php';

$data['title'] = "Pesan Tiket";

include '../layout/header.php';
include '../layout/navbar.php';

// Ambil semua tiket yang tersedia
$semua_tiket = $tiket->getAll();

?>

<h1 class="text-3xl font-bold mb-6">
    Pesan Tiket
</h1>

<div class="bg-white p-6 rounded shadow max-w-lg">

    <form action="../../controllers/c_transaksi.php?aksi=insert" method="POST">

        <!-- Pilih Tiket -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">
                Kategori Tiket
            </label>
            <select name="id_tiket" id="id_tiket" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                onchange="updateHarga()">
                <option value="">-- Pilih Tiket --</option>
                <?php foreach ($semua_tiket as $t) : ?>
                    <option value="<?= $t['id_tiket']; ?>" data-harga="<?= $t['harga']; ?>">
                        <?= $t['kategori']; ?> - Rp<?= number_format($t['harga'], 0, ',', '.'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Jumlah Orang -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">
                Jumlah Orang
            </label>
            <input type="number" name="jumlah_orang" id="jumlah_orang" min="1" value="1" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                oninput="updateHarga()">
        </div>

        <!-- Total Harga (readonly, kalkulasi otomatis) -->
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">
                Total Harga
            </label>
            <input type="text" id="total_harga_display" readonly value="Rp0"
                class="w-full border border-gray-200 bg-gray-100 rounded px-3 py-2 text-gray-600">
        </div>

        <button type="submit"
            class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Pesan Sekarang
        </button>

    </form>

</div>

<script>
    function updateHarga() {
        const select       = document.getElementById('id_tiket');
        const jumlah       = parseInt(document.getElementById('jumlah_orang').value) || 0;
        const selectedOpt  = select.options[select.selectedIndex];
        const harga        = parseInt(selectedOpt.dataset.harga) || 0;
        const total        = harga * jumlah;

        document.getElementById('total_harga_display').value =
            'Rp' + total.toLocaleString('id-ID');
    }
</script>

<?php include '../layout/footer.php'; ?>