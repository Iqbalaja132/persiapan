<?php

include_once __DIR__ . '/../models/m_transaksi.php';
include_once __DIR__ . '/../models/m_tiket.php';

$transaksi = new transaksi();
$tiket     = new tiket();

if (isset($_GET['aksi'])) {

    // Tambah / Pesan Tiket
    if ($_GET['aksi'] == 'insert') {

        session_start();

        $id_user      = $_SESSION['data']['id_user'];
        $id_tiket     = $_POST['id_tiket'];
        $jumlah_orang = $_POST['jumlah_orang'];

        // Ambil harga tiket
        $data_tiket   = $tiket->getById($id_tiket);
        $total_harga  = $data_tiket['harga'] * $jumlah_orang;

        $transaksi->insert($id_user, $id_tiket, $jumlah_orang, $total_harga);

        header("Location: ../views/customer/riwayat_transaksi.php");
        exit;
    } elseif ($_GET['aksi'] == 'insert_admin') {

        $id_user      = $_POST['id_user'];
        $id_tiket     = $_POST['id_tiket'];
        $jumlah_orang = $_POST['jumlah_orang'];

        // Ambil harga tiket
        $data_tiket   = $tiket->getById($id_tiket);
        $total_harga  = $data_tiket['harga'] * $jumlah_orang;

        $transaksi->insert($id_user, $id_tiket, $jumlah_orang, $total_harga);

        header("Location: ../views/admin/transaksi.php");
        exit;
    }

    // Hapus (admin)
    elseif ($_GET['aksi'] == 'delete') {

        $id = $_GET['id'];

        $transaksi->delete($id);

        header("Location: ../views/admin/transaksi.php");
        exit;
    }

}