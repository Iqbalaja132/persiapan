<?php

include_once __DIR__ . '/../models/m_user.php';

$user = new user();

if (isset($_GET['aksi'])) {

    // Tambah
    if ($_GET['aksi'] == 'insert') {

        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $role = $_POST['role'];
        $nama = $_POST['nama'];
        $user->insert($username, $password, $role, $nama);

        header("Location: ../views/admin/user.php");
        exit;
    }

    // Edit
    elseif ($_GET['aksi'] == 'update') {

        $id = $_POST['id'];
        $username = $_POST['username'];
        $role = $_POST['role'];
        $nama = $_POST['nama'];

        if (!empty($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        } else {
            $data = $user->getById($id);
            $password = $data['password'];
        }

        $user->update($id, $username, $password, $role, $nama);

        header("Location: ../views/admin/user.php");
        exit;
    }

    // Hapus
    elseif ($_GET['aksi'] == 'delete') {

        $id = $_GET['id'];

        $user->delete($id);

        header("Location: ../views/admin/user.php");
        exit;
    }
}
