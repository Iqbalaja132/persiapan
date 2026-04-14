<?php

include_once __DIR__ . '/../models/m_tiket.php';

$tiket = new tiket();

if (isset($_GET['aksi'])) {

    // Tambah
    if ($_GET['aksi'] == 'insert') {

        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];

        $tiket->insert($kategori, $harga);

        header("Location: ../views/admin/tiket.php");
        exit;
    }

    // Edit
    elseif ($_GET['aksi'] == 'update') {

        $id = $_POST['id'];
        $kategori = $_POST['kategori'];
        $harga = $_POST['harga'];

        $tiket->update($id, $kategori, $harga);

        header("Location: ../views/admin/tiket.php");
        exit;
    }

    // Hapus
    elseif ($_GET['aksi'] == 'delete') {

        $id = $_GET['id'];

        $tiket->delete($id);

        header("Location: ../views/admin/tiket.php");
        exit;
    }

}