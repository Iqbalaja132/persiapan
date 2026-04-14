<?php

include_once __DIR__ . '/m_koneksi.php';

class tiket {

    // Tampil Data
    function getAll()
    {
        $conn = new koneksi();

        $sql = "SELECT * FROM tb_tiket";
        $query = mysqli_query($conn->koneksi, $sql);

        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }

        return $data;
    }

    // Tampil Data by ID
    function getById($id)
    {
        $conn = new koneksi();

        $sql = "SELECT * FROM tb_tiket WHERE id_tiket='$id'";
        $query = mysqli_query($conn->koneksi, $sql);

        return mysqli_fetch_assoc($query);
    }

    // Tambah
    function insert($kategori, $harga)
    {
        $conn = new koneksi();

        $sql = "INSERT INTO tb_tiket 
                (kategori, harga)
                VALUES 
                ('$kategori', '$harga')";

        mysqli_query($conn->koneksi, $sql);
    }

    // Edit
    function update($id, $kategori, $harga)
    {
        $conn = new koneksi();

        $sql = "UPDATE tb_tiket 
                SET kategori='$kategori',
                    harga='$harga'
                WHERE id_tiket='$id'";

        mysqli_query($conn->koneksi, $sql);
    }

    // Delete
    function delete($id)
    {
        $conn = new koneksi();

        $sql = "DELETE FROM tb_tiket 
                WHERE id_tiket='$id'";

        mysqli_query($conn->koneksi, $sql);
    }

}