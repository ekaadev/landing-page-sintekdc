<?php

include 'config.php';
session_start();
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
};


if (isset($_POST['submit'])) {
    // Generate a new image name using the product ID
    $cek_id = "SELECT max(id) as kode FROM gambarseminar";
    $hasil = mysqli_query($conn, $cek_id);
    $test = mysqli_fetch_assoc($hasil);
    $id = $test['kode'];
    $id++;

    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'js/';
    $new_image_name = $id . $image_name;
    $image_destination = $image_folder . $new_image_name;

    if ($image_size > 2000000) {
        $message[] = 'Ukuran gambar terlalu besar';
    } else {
        move_uploaded_file($image_tmp_name, $image_destination);
        // Update the image field in the database with the new image name
        mysqli_query($conn, "INSERT INTO `js`(`namajs`) VALUES ('$new_image_name')") or die('query failed');
    }
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
   <link rel="stylesheet" href="css/modal.css">
</head>

<body>
<?php include 'navbaradmin.php'; ?>
    <section class="form-container">
        <div id="myModal" class="modal1">
            <div class="modal-content1">
                <span class="close-btn1" onclick="closeModal()">&times;</span>
                <div id="messages">
                    <?php
                    if (!empty($message)) {
                        foreach ($message as $msg) {
                            echo '<p>' . $msg . '</p>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <h1 class="heading">Tambah Timer js</h1>
            <!-- <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required> -->
            <input type="file" name="image" accept="media_type" class="box" required>
            <input type="submit" value="Submit" class="btn" name="submit">
        </form>

    </section>

    <script src="js/modal.js"></script>
</body>

</html>