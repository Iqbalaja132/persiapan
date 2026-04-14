<?php

include_once __DIR__ . '/m_koneksi.php';

class transaksi {

    // Tampil semua transaksi (untuk admin) dengan join ke tb_user dan tb_tiket
    function getAll()
    {
        $conn = new koneksi();

        $sql = "SELECT t.*, u.nama, u.username, tk.kategori, tk.harga 
                FROM tb_transaksi t
                JOIN tb_user u ON t.id_user = u.id_user
                JOIN tb_tiket tk ON t.id_tiket = tk.id_tiket
                ORDER BY t.id_transaksi DESC";
        $query = mysqli_query($conn->koneksi, $sql);

        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }

        return $data;
    }

    // Tampil transaksi by user (untuk customer)
    function getByUser($id_user)
    {
        $conn = new koneksi();

        $sql = "SELECT t.*, tk.kategori, tk.harga 
                FROM tb_transaksi t
                JOIN tb_tiket tk ON t.id_tiket = tk.id_tiket
                WHERE t.id_user = '$id_user'
                ORDER BY t.id_transaksi DESC";
        $query = mysqli_query($conn->koneksi, $sql);

        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }

        return $data;
    }

    // Tambah transaksi
    function insert($id_user, $id_tiket, $jumlah_orang, $total_harga)
    {
        $conn = new koneksi();

        $sql = "INSERT INTO tb_transaksi 
                (id_user, id_tiket, jumlah_orang, total_harga)
                VALUES 
                ('$id_user', '$id_tiket', '$jumlah_orang', '$total_harga')";

        mysqli_query($conn->koneksi, $sql);
    }

    // Hapus transaksi
    function delete($id)
    {
        $conn = new koneksi();

        $sql = "DELETE FROM tb_transaksi 
                WHERE id_transaksi='$id'";

        mysqli_query($conn->koneksi, $sql);
    }

}