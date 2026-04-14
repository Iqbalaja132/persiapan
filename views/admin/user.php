<?php

session_start();

if (!isset($_SESSION['data']) || $_SESSION['data']['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

include_once '../../controllers/c_user.php';

$data['title'] = "Dashboard Admin";

include '../layout/header.php';
include '../layout/navbar.php';

?>

<h1 class="text-3xl font-bold mb-6">
    Manajemen User
</h1>

<div class="bg-white p-6 rounded shadow">

    <div class="mb-4">
        <a href="tambah_user.php"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah User
        </a>
    </div>

    <div class="overflow-x-auto">

        <table class="w-full table-auto bg-white border border-gray-200">

            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b text-left">
                        No
                    </th>

                    <th class="py-2 px-4 border-b text-left">
                        Nama
                    </th>

                    <th class="py-2 px-4 border-b text-left">
                        Username
                    </th>
                    
                    <th class="py-2 px-4 border-b text-left">
                        Role
                    </th>

                    <th class="py-2 px-4 border-b text-center">
                        Aksi
                    </th>
                </tr>
            </thead>

            <tbody>

                <?php
                $data_user = $user->getAll();

                if (!empty($data_user)) {

                    foreach ($data_user as $key => $value) {
                ?>

                        <tr class="hover:bg-gray-50">

                            <td class="py-2 px-4 border-b">
                                <?php echo $key + 1; ?>
                            </td>

                            <td class="py-2 px-4 border-b">
                                <?php echo ucfirst($value['nama']); ?>
                            </td>

                            <td class="py-2 px-4 border-b">
                                <?php echo $value['username']; ?>
                            </td>

                            <td class="py-2 px-4 border-b">
                                <?php echo ucfirst($value['role']); ?>
                            </td>

                            <td class="py-2 px-4 border-b text-center space-x-2">

                                <a href="edit_user.php?id=<?php echo $value['id_user']; ?>"
                                    class="text-blue-500 hover:text-blue-700 font-semibold">
                                    Edit
                                </a>

                                <a href="../../controllers/c_user.php?aksi=delete&id=<?php echo $value['id_user']; ?>"
                                    class="text-red-500 hover:text-red-700 font-semibold"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                    Delete
                                </a>

                            </td>

                        </tr>

                <?php
                    }

                } else {
                ?>

                    <tr>
                        <td colspan="5" class="py-4 text-center text-gray-500">
                            Data user belum tersedia
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