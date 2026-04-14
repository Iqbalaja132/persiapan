<?php
session_start();

if (!isset($_SESSION['data']) || $_SESSION['data']['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$data['title'] = "Tambah User";

include '../layout/header.php';
include '../layout/navbar.php';
?>

<div class="max-w-lg mx-auto mt-10">

    <h1 class="text-2xl font-bold mb-6 text-center">
        Tambah User
    </h1>

    <div class="bg-white p-6 rounded-lg shadow">

        <form action="../../controllers/c_user.php?aksi=insert" method="post" class="space-y-4">

            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama
                </label>

                <input
                    type="text"
                    name="nama"
                    id="nama"
                    required
                    placeholder="Masukkan nama user"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">
                    Username
                </label>

                <input
                    type="text"
                    name="username"
                    id="username"
                    required
                    placeholder="Masukkan username"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    placeholder="Masukkan password"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">
                    Role
                </label>

                <select
                    name="role"
                    id="role"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <option value="">-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>

                </select>
            </div>

            <div class="flex justify-between mt-6">

                <a href="user.php"
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