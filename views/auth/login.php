<?php
session_start();

if (isset($_SESSION['data'])) {
  $role = $_SESSION['data']['role'];

  header("Location: ../$role/dashboard.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-xl shadow-lg w-96">

    <h2 class="text-2xl font-bold text-center mb-6">
        Login
    </h2>

    <form action="../../controllers/c_login.php?aksi=login" method="POST">

        <div class="mb-4">
            <label>Username</label>

            <input
                type="text"
                name="username"
                class="w-full border px-3 py-2 rounded-lg"
                required>
        </div>

        <div class="mb-4">
            <label>Password</label>

            <input
                type="password"
                name="password"
                class="w-full border px-3 py-2 rounded-lg"
                required>
        </div>

        <button
            type="submit"
            class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">

            Login

        </button>

    </form>

    <p class="text-center mt-4">
        Belum punya akun?
        <a href="registrasi.php" class="text-blue-500">
            Daftar
        </a>
    </p>

</div>

</body>
</html>