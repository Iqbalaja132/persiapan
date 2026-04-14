<div class="w-64 bg-blue-600 text-white p-5">

    <h2 class="text-2xl font-bold mb-6">
        🎫 Tiket App
    </h2>

    <p class="mb-6">
        Halo, <b>
            <?= ucfirst($_SESSION['data']['nama']); ?>
        </b>
    </p>

    <ul class="space-y-3">

        <li>
            <a href="../<?= $_SESSION['data']['role']; ?>/dashboard.php"
                class="block hover:bg-blue-500 p-2 rounded">
                Dashboard
            </a>
        </li>

        <?php if ($_SESSION['data']['role'] == 'admin') : ?>

            <li>
                <a href="user.php"
                    class="block hover:bg-blue-500 p-2 rounded">
                    Kelola User
                </a>
            </li>

            <li>
                <a href="tiket.php"
                    class="block hover:bg-blue-500 p-2 rounded">
                    Kelola Tiket
                </a>
            </li>

            <li>
                <a href="transaksi.php"
                    class="block hover:bg-blue-500 p-2 rounded">
                    Kelola Transaksi
                </a>
            </li>

        <?php else : ?>

            <li>
                <a href="pesan_tiket.php"
                    class="block hover:bg-blue-500 p-2 rounded">
                    Pesan Tiket
                </a>
            </li>

            <li>
                <a href="riwayat_transaksi.php"
                    class="block hover:bg-blue-500 p-2 rounded">
                    Riwayat Transaksi
                </a>
            </li>

        <?php endif; ?>

        <li>
            <a href="../../controllers/c_login.php?aksi=logout" onclick="return confirm('Apakah anda yakin akan logout?')"
                class="block bg-red-500 hover:bg-red-600 p-2 rounded text-center">
                Logout
            </a>
        </li>

    </ul>

</div>

<div class="flex-1 p-6">