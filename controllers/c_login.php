<?php

session_start();

include_once '../models/m_login.php';

$login = new login();

if (isset($_GET['aksi'])) {

    //Login
    if ($_GET['aksi'] == 'login') {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $login->login($username, $password);
    }

    //Registrasi
    elseif ($_GET['aksi'] == 'register') {

        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $login->register($nama, $username, $password);
    }

    //Logout
    elseif ($_GET['aksi'] == 'logout') {

        session_unset();
        session_destroy();

        header("Location: ../views/auth/login.php");
        exit;
    }
}
