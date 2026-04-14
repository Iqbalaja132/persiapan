<?php
session_start();

if (!isset($_SESSION['data']) || $_SESSION['data']['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

include_once '../../controllers/c_user.php';

$id = $_GET['id'];

$data_user = $user->getById($id);

$data['title'] = "Edit User";

include '../layout/header.php';
include '../layout/navbar.php';
?>

<div class="max-w-lg mx-auto mt-10">

    <h1 class="text-2xl font-bold mb-6 text-center">
        Edit User
    </h1>

    <div class="bg-white p-6 rounded-lg shadow">

        <form action="../../controllers/c_user.php?aksi=update" method="post" class="space-y-4">

            <input
                type="hidden"
                name="id"
                value="<?php echo $data_user['id_user']; ?>">

            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">
                    Nama
                </label>

                <input
                    type="text"
                    name="nama"
                    id="nama"
                    required
                    value="<?php echo $data_user['nama']; ?>"
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
                    value="<?php echo $data_user['username']; ?>"
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
                    placeholder="Biarkan kosong jika tidak ingin mengubah"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">
                    Role
                </label>

                <select name="role" id="role" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="admin"
                        <?php
                        if ($data_user['role'] == 'admin') {
                            echo "selected";
                        }
                        ?>>
                        Admin
                    </option>

                    <option value="customer"
                        <?php
                        if ($data_user['role'] == 'customer') {
                            echo "selected";
                        }
                        ?>>
                        Customer
                    </option>

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
                    Update
                </button>

            </div>

        </form>

    </div>

</div>

<?php
include '../layout/footer.php';
?>