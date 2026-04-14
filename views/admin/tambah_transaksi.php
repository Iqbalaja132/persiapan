<?php
session_start();

if (!isset($_SESSION['data']) || $_SESSION['data']['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$data['title'] = "Tambah Transaksi";

include '../layout/header.php';
include '../layout/navbar.php';
?>

<div class="max-w-lg mx-auto mt-10">

    <h1 class="text-2xl font-bold mb-6 text-center">
        Tambah Transaksi
    </h1>

    <div class="bg-white p-6 rounded-lg shadow">

        <form action="../../controllers/c_transaksi.php?aksi=insert_admin" method="post" class="space-y-4">

            <div>
                <label for="id_user" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Customer
                </label>

                <select
                    name="id_user"
                    id="id_user"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option value="">-- Pilih Customer --</option>

                    <?php
                    include_once '../../controllers/c_user.php';

                    $data_user = $user->getAll();

                    if (!empty($data_user)) {
                        foreach ($data_user as $key => $value) {
                            if ($value['role'] === 'customer') {
                    ?>

                            <option value="<?= $value['id_user']; ?>">
                                <?= $value['nama']; ?>
                            </option>

                    <?php
                            }
                        }
                    }
                    ?>

                </select>

            </div>
            <div>
                <label for="id_tiket" class="block text-sm font-medium text-gray-700 mb-1">
                    Kategori Tiket
                </label>

                <select
                    name="id_tiket"
                    id="id_tiket"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option value="">-- Pilih Tiket --</option>

                    <?php
                    include_once '../../controllers/c_tiket.php';

                    $data_tiket = $tiket->getAll();

                    if (!empty($data_tiket)) {
                        foreach ($data_tiket as $key => $value) {
                    ?>

                       <option 
    value="<?= $value['id_tiket']; ?>"
    data-harga="<?= $value['harga']; ?>">
    <?= $value['kategori']; ?> - Rp<?= number_format($value['harga'], 0, ',', '.'); ?>
</option>

                    <?php
                        }
                    }
                    ?>

                </select>  
            </div>

            <div>
                <label for="jumlah_orang" class="block text-sm font-medium text-gray-700 mb-1">
                    Jumlah Orang
                </label>
                <input
                    type="number"
                    name="jumlah_orang"
                    id="jumlah_orang"
                    min="1"
                    value="1"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">
                Total Harga
            </label>
            <input type="text" id="total_harga_display" readonly value="Rp0"
                class="w-full border border-gray-200 bg-gray-100 rounded px-3 py-2 text-gray-600">
        </div>

            <div class="flex justify-between mt-6">

                <a href="transaksi.php"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded font-semibold">
                    Kembali
                </a>

                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded font-semibold">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

<script>
    function updateHarga() {
        const select      = document.getElementById('id_tiket');
        const jumlah      = parseInt(document.getElementById('jumlah_orang').value) || 0;

        const selectedOpt = select.options[select.selectedIndex];

        const harga = parseInt(selectedOpt.dataset.harga) || 0;

        const total = harga * jumlah;

        document.getElementById('total_harga_display').value =
            'Rp' + total.toLocaleString('id-ID');
    }

    // EVENT LISTENER
    document.getElementById('id_tiket').addEventListener('change', updateHarga);
    document.getElementById('jumlah_orang').addEventListener('input', updateHarga);
</script>

<?php
include '../layout/footer.php';
?>