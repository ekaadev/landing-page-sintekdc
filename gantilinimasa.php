<?php
include 'config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
};

if (isset($_POST['add_so'])) {
    $tglpenerimaan = $_POST['tglpenerimaan'];
    $tglpenerimaan = filter_var($tglpenerimaan, FILTER_SANITIZE_STRING);
    $batasakhir = $_POST['batasakhir'];
    $batasakhir = filter_var($batasakhir, FILTER_SANITIZE_STRING);
    $pengumuman = $_POST['pengumuman'];
    $pengumuman = filter_var($pengumuman, FILTER_SANITIZE_STRING);
    $revisiterakhir = $_POST['revisiterakhir'];
    $revisiterakhir = filter_var($revisiterakhir, FILTER_SANITIZE_STRING);
    $pembayaranakhir = $_POST['pembayaranakhir'];
    $pembayaranakhir = filter_var($pembayaranakhir, FILTER_SANITIZE_STRING);
    $tanggalseminar = $_POST['tanggalseminar'];
    $tanggalseminar = filter_var($tanggalseminar, FILTER_SANITIZE_STRING);
    $id = 1;

    mysqli_query($conn, "UPDATE `linimasa` SET 
        `penerimaan`='$tglpenerimaan', 
        `batasakahir`='$batasakhir', 
        `pengumuman`='$pengumuman', 
        `revisi`='$revisiterakhir', 
        `pembayaranakhir`='$pembayaranakhir', 
        `tanggalseminar`='$tanggalseminar' 
        WHERE `id`=$id") or die(mysqli_error($conn));
};



if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_product_image = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
    $delete_product_image->execute([$delete_id]);
    $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
    unlink('../uploaded_img/' . $fetch_delete_image['image_01']);
    unlink('../uploaded_img/' . $fetch_delete_image['image_02']);
    unlink('../uploaded_img/' . $fetch_delete_image['image_03']);
    $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
    $delete_product->execute([$delete_id]);
    $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
    $delete_cart->execute([$delete_id]);
    $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE pid = ?");
    $delete_wishlist->execute([$delete_id]);
    header('location:products.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS FILES -->
    <link rel="shortcut icon" type="image/x-icon" href="./images/gallery/logoss2.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
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
            <h1 class="heading">Ganti isi Atas</h1>
            <div class="flex">
                <div class="inputBox">
                    <span>Tanggal Penerimaan</span>
                    <input type="text" class="box" required maxlength="100" placeholder="Masukan Tanggal Penerimaan" name="tglpenerimaan">
                </div>
            </div>
            <div class="flex">
                <div class="inputBox">
                    <span>Batas Akhir Pengumpulan</span>
                    <input type="text" class="box" required maxlength="100" placeholder="Masukkan Tanggal Batas Akhir" name="batasakhir">
                </div>
            </div>
            <div class="flex">
                <div class="inputBox">
                    <span>Pengumuman</span>
                    <input type="text" class="box" required maxlength="100" placeholder="Masukkan Tanggal Pengumuman" name="pengumuman">
                </div>
            </div>

            <div class="flex">
                <div class="inputBox">
                    <span>Revisi Terakhir</span>
                    <input type="text" class="box" required maxlength="100" placeholder="Masukkan Tanggal Revisi Terakhir" name="revisiterakhir">
                </div>
            </div>
            <div class="flex">
                <div class="inputBox">
                    <span>Pembayaran Akhir</span>
                    <input type="text" class="box" required maxlength="100" placeholder="Masukkan Tanggal Pembayaran Akhir" name="pembayaranakhir">
                </div>
            </div>
            <div class="flex">
                <div class="inputBox">
                    <span>Tanggal Seminar</span>
                    <input type="text" class="box" required maxlength="100" placeholder="Masukkan Tanggal Seminar" name="tanggalseminar">
                </div>
            </div>
            <input type="submit" value="Ubah Data" class="btn" name="add_so">
        </form>
        <div class="isi">
            <div class="flex">
                <div class="inputBox">
                    <span>Baca Data:</span>
                    <?php
                    $select_orders = $conn1->prepare("SELECT * FROM `linimasa`");
                    $select_orders->execute();
                    if ($select_orders->rowCount() > 0) {
                        while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            </br>
                            <span>Penerimaan</span>
                            <p><?= $fetch_orders['penerimaan']; ?></p>
                            <span>Batas Akhir</span>
                            <p><?= $fetch_orders['batasakahir']; ?></p>
                            <span>Pengumuman</span>
                            <p><?= $fetch_orders['pengumuman']; ?></p>
                            <span>Revisi</span>
                            <p><?= $fetch_orders['revisi']; ?></p>
                            <span>Pembayaran Akhir</span>
                            <p><?= $fetch_orders['pembayaranakhir']; ?></p>
                            <span>Tanggal Seminar</span>
                            <p><?= $fetch_orders['tanggalseminar']; ?></p>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </section>
    <script src="../js/admin_script.js"></script>
</body>

</html>