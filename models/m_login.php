<?php

include_once 'm_koneksi.php';

class login {

    //Login
    function login($username, $password)
    {
        $conn = new koneksi();

        $sql = "SELECT * FROM tb_user WHERE username='$username'";
        $query = mysqli_query($conn->koneksi, $sql);

        $data = mysqli_fetch_assoc($query);

        if ($data) {

            if (password_verify($password, $data['password']) 
                || $password == $data['password']) {

                $_SESSION['data'] = $data;

                if ($data['role'] == 'admin') {

                    header("Location: ../views/admin/dashboard.php");

                } else {

                    header("Location: ../views/customer/dashboard.php");

                }

                exit;

            } else {

                echo "<script>
                        alert('Password salah');
                        window.location='../views/auth/login.php';
                      </script>";

            }

        } else {

            echo "<script>
                    alert('Username tidak ditemukan');
                    window.location='../views/auth/login.php';
                  </script>";

        }

    }

    //Registrasi
    function register($nama, $username, $password_hash)
    {
        $conn = new koneksi();

        $cek = "SELECT * FROM tb_user WHERE username='$username'";
        $query = mysqli_query($conn->koneksi, $cek);

        if (mysqli_num_rows($query) > 0) {

            echo "<script>
                    alert('Username sudah digunakan');
                    window.location='../views/auth/registrasi.php';
                  </script>";

            return;
        }

        $sql = "INSERT INTO tb_user
                VALUES (NULL, '$username', '$password_hash', 'customer', '$nama')";

        $simpan = mysqli_query($conn->koneksi, $sql);

        if ($simpan) {

            echo "<script>
                    alert('Registrasi berhasil');
                    window.location='../views/auth/login.php';
                  </script>";

        } else {

            echo "<script>
                    alert('Registrasi gagal');
                    window.location='../views/auth/registrasi.php';
                  </script>";

        }

    }

}