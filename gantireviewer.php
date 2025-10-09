<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
};

if (isset($_POST['add_so'])) {

    $namareviewer = $_POST['namareviewer'];
    mysqli_query($conn, "INSERT INTO `reviewer`(`nama`) VALUES ('$namareviewer')") or die(mysqli_error($conn));
};


if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM `reviewer` WHERE id='$id'") or die(mysqli_error($conn));
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SINTEK-DC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS FILES -->
    <link rel="shortcut icon" type="image/x-icon" href="./images/gallery/logoss2.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">
    <link href="css/templatemo-medic-care.css" rel="stylesheet">

    <link rel="stylesheet" href="css/2admin_style.css">
</head>

<body>

    <?php include 'navbaradmin.php'; ?></br></br></br></br>

    <section class="add-products">
        <form action="" method="post" enctype="multipart/form-data">
            <h1 class="heading">Tambah Reviewer</h1>
            <div class="flex">
                <div class="inputBox">
                    <span>Nama Reviewer</span>
                    <input type="text" class="box" required maxlength="100" placeholder="Masukan Nama Reviewer Lengkap" name="namareviewer">
                </div>
            </div>
            <input type="submit" value="Tambah Data" class="btn" name="add_so">
        </form>
    </section>
    <section class="playlist-videos">
        <div class="row">
            <div class="column">
                <table border="1">
                    <thead>
                        <tr class="table">
                            <th class="mini" scope="col" style="vertical-align: middle;text-align:center">ID</th>
                            <th class="kecil" scope="col" style="vertical-align: middle;text-align:center">Nama</th>
                            <th class="kecil" scope="col" colspan="1" style="vertical-align: middle;text-align:center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_orders = $conn1->prepare("SELECT * FROM reviewer");
                        $select_orders->execute();
                        if ($select_orders->rowCount() > 0) {
                            while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <tr>
                                        <input type="hidden" name="id" value="<?= $fetch_orders['id']; ?>">
                                        <td style="vertical-align: middle;text-align:center"><?= $fetch_orders['id']; ?></td>
                                        <td style="vertical-align: middle;text-align:center"><?= $fetch_orders['nama']; ?></td>
                                        <td><button data-target="#modalhapusabdimas" type="submit" value="<?= $fetch_orders['id']; ?>" name="delete"><i class="fa-solid fa-trash" title="Hapus"></i></button></td>
                                    </tr>
                                </form>
                                <!-- <tr><span><?= $fetch_orders['id']; ?></span></tr>
                                <p><?= $fetch_orders['nama']; ?></p> -->
                        <?php }
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </section>






    <!-- <script src="js/script.js"></script> -->

</body>

</html>