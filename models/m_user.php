<?php

include_once __DIR__ . '/m_koneksi.php';

class user {

    // Tampil Data
    function getAll()
    {
        $conn = new koneksi();

        $sql = "SELECT * FROM tb_user";
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

        $sql = "SELECT * FROM tb_user WHERE id_user='$id'";
        $query = mysqli_query($conn->koneksi, $sql);

        return mysqli_fetch_assoc($query);
    }

    // Tambah
    function insert($username, $password, $role, $nama)
    {
        $conn = new koneksi();

        $sql = "INSERT INTO tb_user 
                (username, password, role, nama)
                VALUES 
                ('$username', '$password', '$role', '$nama')";

        mysqli_query($conn->koneksi, $sql);
    }

    // Edit
    function update($id, $username, $password, $role, $nama)
    {
        $conn = new koneksi();

        $sql = "UPDATE tb_user 
                SET username='$username',
                    password='$password',
                    role='$role',
                    nama='$nama'
                WHERE id_user='$id'";

        mysqli_query($conn->koneksi, $sql);
    }

    // Delete
    function delete($id)
    {
        $conn = new koneksi();

        $sql = "DELETE FROM tb_user 
                WHERE id_user='$id'";

        mysqli_query($conn->koneksi, $sql);
    }

}