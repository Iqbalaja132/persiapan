<?php
session_start();

if (!isset($_SESSION['data']) || $_SESSION['data']['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$data['title'] = "Tambah Tiket";

include '../layout/header.php';
include '../layout/navbar.php';
?>

<div class="max-w-lg mx-auto mt-10">

    <h1 class="text-2xl font-bold mb-6 text-center">
        Tambah Tiket
    </h1>

    <div class="bg-white p-6 rounded-lg shadow">

        <form action="../../controllers/c_tiket.php?aksi=insert" method="post" class="space-y-4">

            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">
                    Kategori
                </label>

                <select
                    name="kategori"
                    id="kategori"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option value="">-- Pilih Kategori --</option>
                    <option value="Umum">Umum</option>
                    <option value="Membership">Membership</option>

                </select>
            </div>

            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">
                    Harga
                </label>

                <input
                    type="number"
                    name="harga"
                    id="harga"
                    required
                    placeholder="Masukkan harga tiket"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex justify-between mt-6">

                <a href="tiket.php"
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

<?php
include '../layout/footer.php';
?>