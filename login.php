<?php

include 'config.php';

session_start();


if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    //    $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));
    $pass = $_POST['pass'];

    $select_admin = mysqli_query($conn, "SELECT * FROM `user` WHERE user = '$name' AND pass = '$pass'") or die($conn);

    if (mysqli_num_rows($select_admin) > 0) {

        $row = mysqli_fetch_assoc($select_admin);
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_email'] = $row['email'];
        $_SESSION['admin_id'] = $row['id'];
        header('location:dashboard.php');
    } else {
        $message[] = 'incorrect email or password!';
    }
}

?>

<!doctype html>
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
    <?php include 'navbaradmin.php'; ?>
    <section class="form-container">

        <form action="" method="POST">
            <h3>login now</h3>
            <input type="text" name="name" required placeholder="enter your username" maxlength="100" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="password" name="pass" required placeholder="enter your password" maxlength="200" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
            <input type="submit" value="login now" class="btn" name="submit">
        </form>

    </section>
    <main>


        <!-- footer -->
        <footer class="site-footer section-padding" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 me-auto col-12">
                        <h5 class="mb-lg-4 mb-3">Hubungi Kami</h5>
                        <p>Jl. Dr. Ir. H. Soekarno No.201, Klampis Ngasem, Kec. Sukolilo, Kota SBY, Jawa Timur 60117</p>
                        <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5536792652774!2d112.77862187348512!3d-7.291511971666503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa48d8531e99%3A0x88be2742d63894e1!2sUniversitas%20Katolik%20Darma%20Cendika!5e0!3m2!1sen!2sid!4v1698571848757!5m2!1sen!2sid" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> </p>
                        <a href="tel:+62315914157" class="footer-link">Telp : (031) 5914157, 5946482</a> <a href="tel:+62315939625" class="footer-link">Fax : (031) 5939625</a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-12 my-4 my-lg-0">
                        <h5 class="mb-lg-4 mb-3">Kerja Sama</h5>
                        <ul class="footer-menu">
                            <li><a href="https://www.microsoft.com/id-id/" target="_blank">Microsoft</a></li>
                            <li><a href="https://sevima.com/" target="_blank">Sevima</a></li>
                            <li><a href="https://gdsc.community.dev/universitas-katolik-darma-cendika/" target="_blank">Google Developer Student Club</a></li>
                            <li><a href="https://aptikom.org/" target="_blank">Aptikom</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 ms-auto">
                        <h5 class="mb-lg-4 mb-2">Media Sosial</h5>
                        <ul class="social-icon">
                            <li> <a href="https://www.facebook.com/Prodi-Teknik-Informatika-UKDC-295323257794884/" target="_blank"><span class="social-icon-link bi-facebook"></span></a></li>
                            <li><a href="https://www.instagram.com/ifdarmacendika/" target="_blank"><span class="social-icon-link bi-instagram"></span></a> </li>
                            <li> <a href="https://www.youtube.com/@DCInformatics" target="_blank"><span class="social-icon-link bi-youtube"></span></a></li>
                            <li> <a href="whatsapp://send?text=Hai DCInformatics&phone=+6282328834886"><span class="social-icon-link bi-whatsapp"></span></a></li>
                        </ul>
                    </div>
                </div>
                </section>
        </footer>
        <!-- js -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <script src="js/timer.js"></script>
        <script src="js/custom.js"></script>
</body>

</html>