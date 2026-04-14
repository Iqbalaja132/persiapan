<?php

session_start();

if (!isset($_SESSION['data']) || $_SESSION['data']['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$data['title'] = "Dashboard Admin";

include '../layout/header.php';
include '../layout/navbar.php';

?>

<h1 class="text-3xl font-bold mb-6">
    Dashboard Admin
</h1>

<div class="bg-white p-6 rounded shadow">

    <h2 class="text-xl font-semibold mb-2">
        Selamat Datang
    </h2>

    <p>
        Halo,
        <b>
            <?= ucfirst($_SESSION['data']['nama']); ?>
        </b>

        Anda login sebagai
        <b>
            <?= ucfirst($_SESSION['data']['role']); ?>
        </b>
    </p>

</div>

<?php

include '../layout/footer.php';

?>