<?php
include 'config.php';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT judulso, isiso, judulpublish, isipublish FROM data";
$sqli = "SELECT penerimaan, batasakahir, pengumuman, revisi, pembayaranakhir, tanggalseminar  FROM linimasa";
$sqlr = "SELECT nama  FROM reviewer";
$sqlisi = "SELECT id, idtopik, isitopik  FROM isitopikseminar";
$sqlposter = "SELECT * FROM gambarseminar ORDER BY id DESC LIMIT 1";
$resulposter = mysqli_query($conn, $sqlposter);
if (!$resulposter) {
    die("Query failed: " . $conn->error);
}
$data = mysqli_fetch_assoc($resulposter);

$sqljs = "SELECT * FROM js ORDER BY id DESC LIMIT 1";
$resuljs = mysqli_query($conn, $sqljs);
if (!$resuljs) {
    die("Query failed: " . $conn->error);
}
$data2 = mysqli_fetch_assoc($resuljs);

$result = $conn->query($sql);
if (!$result) {
    die("Query failed: " . $conn->error);
}
$resulti = $conn->query($sqli);
if (!$resulti) {
    die("Query failed: " . $conn->error);
}
$resultr = $conn->query($sqlr);
if (!$resultr) {
    die("Query failed: " . $conn->error);
}
$resultisi = $conn->query($sqlisi);
if (!$resultisi) {
    die("Query failed: " . $conn->error);
}
$seminarRow = $result->fetch_assoc();
$result = $conn->query($sql);
$publishRow = $result->fetch_assoc();
$linimasaRow = $resulti->fetch_assoc();
$reviewerRow = $resultr->fetch_assoc();
$isiRow = $resultisi->fetch_assoc();
$conn->close();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Basic Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO Meta Tags -->
    <title>SINTEK-DC - Seminar Nasional Inovasi Teknologi | Universitas Katolik Darma Cendika</title>
    <meta name="description" content="Seminar Nasional dengan tema Digital for Good: Peran Inovasi Teknologi dalam Pembangunan Berkelanjutan. Bergabunglah dengan kami untuk membahas inovasi digital yang mendukung pembangunan berkelanjutan.">
    <meta name="keywords" content="seminar nasional, inovasi teknologi, SINTEK-DC, digital for good, pembangunan berkelanjutan, teknologi informasi, Darma Cendika, seminar IT, teknologi digital">
    <meta name="author" content="Universitas Katolik Darma Cendika">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Indonesian">

    <!-- Open Graph Meta Tags (Facebook, LinkedIn) -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="SINTEK-DC">
    <meta property="og:title" content="SINTEK-DC - Seminar Nasional Inovasi Teknologi">
    <meta property="og:description" content="Digital for Good: Peran Inovasi Teknologi dalam Pembangunan Berkelanjutan. Daftar sekarang sebagai pemakalah atau pendengar!">
    <meta property="og:image" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/seminar/images/gallery/' . ($data['gambarposter'] ?? 'poster.png'); ?>">
    <meta property="og:url" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SINTEK-DC - Seminar Nasional Inovasi Teknologi">
    <meta name="twitter:description" content="Digital for Good: Peran Inovasi Teknologi dalam Pembangunan Berkelanjutan">
    <meta name="twitter:image" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/seminar/images/gallery/' . ($data['gambarposter'] ?? 'poster.png'); ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="./images/gallery/logoss2.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./images/gallery/logoss2.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/gallery/logoss2.png">
    <link rel="apple-touch-icon" href="./images/gallery/logoss2.png">

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">

    <!-- External Resources -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">
    <link href="css/templatemo-medic-care.css" rel="stylesheet">
</head>

<body id="top">

    <main>
        <?php include 'navbaruser.php'; ?>
        <!--NAVBAR-->

        <section class="hero" id="hero">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active"><img src="images/slider/gedung1.jpg" class="img-fluid" alt=""> </div>
                                <div class="carousel-item"><img src="images/slider/gedung2.jpg" class="img-fluid" alt=""> </div>
                                <div class="carousel-item"><img src="images/slider/gedung3.jpg" class="img-fluid" alt=""> </div>
                            </div>
                        </div>

                        <div class="heroText d-flex flex-column justify-content-center">
                            <h1 class="mt-auto mb-2">Seminar <div class="animated-info"> <span class="animated-item"> Nasional</span><span class="animated-item"> Inovasi</span><span class="animated-item"> Teknologi</span> </div>
                            </h1>
                            <p class="mb-4">Selamat datang di Seminar Nasional dengan tema <span class="fw-bold">"Digital for Good: Peran Inovasi Teknologi dalam Pembangunan Berkelanjutan." </span> Seminar ini membahas bagaimana inovasi digital dapat dimanfaatkan untuk mendukung pembangunan yang berkelanjutan di berbagai sektor kehidupan.</p>
                            <div class="heroLinks d-flex flex-wrap align-items-center">
                                <a class="custom-link me-4" href="templatejurnal/TEMPLATESINTEK.docx" data-hover="Unduh Template">Unduh Template</a>
                                <a class="custom-link me-4" href="https://forms.gle/pNLadLJzurGL3zfd8" data-hover="Daftar Pendengar" target="_blank">Daftar Pendengar</a>
                                <a class="custom-link me-4" href="https://forms.gle/pNLadLJzurGL3zfd8" data-hover="Daftar Pendengar" target="_blank">Daftar Pemakalah</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--ABOUT-->
        <section class="section-padding" id="about">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php
                        if ($result->num_rows > 0) {
                            $result->data_seek(0);

                            while ($row = $result->fetch_assoc()) {
                                echo "<h2 class='mb-lg-3 mb-3' id='seminar'>" . $row["judulso"] . "</h2>";
                                echo "<p>" . $row["isiso"] . "</p>";
                            }
                        } else {
                            echo "Tidak ada data yang dapat ditampilkan.";
                        }
                        ?>
                    </div>
                    <div class="row">
                        <div class="col mx-auto d-flex">
                            <div class="featured-circle bg-white shadow-lg d-flex justify-content-center align-items-center">
                                <p class="featured-text"><span class="featured-number" id="timer">00</span> Hari</p>
                            </div>
                            <div class="featured-circle bg-white shadow-lg d-flex justify-content-center align-items-center">
                                <p class="featured-text"><span class="featured-number" id="timer2">00</span> Jam</p>
                            </div>
                            <div class="featured-circle bg-white shadow-lg d-flex justify-content-center align-items-center">
                                <p class="featured-text"><span class="featured-number" id="timer3">00</span> Menit</p>
                            </div>
                            <div class="featured-circle bg-white shadow-lg d-flex justify-content-center align-items-center">
                                <p class="featured-text"><span class="featured-number" id="timer4">00</span> Detik</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php
                        if ($result->num_rows > 0) {
                            $result->data_seek(0);
                            while ($row = $result->fetch_assoc()) {
                                echo "<h2 class='mb-lg-3 mb-3' id='publish'>" . $row["judulpublish"] . "</h2>";
                                echo "<p>" . $row["isipublish"] . "</p>";
                            }
                        } else {
                            echo "No data found.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <!--POSTER-->
        <section class="gallery" id="poster">
            <div class="container">
                <div class="row">
                    <center>
                        <div class="col"><img src="images/gallery/<?php echo $data['gambarposter']; ?>" class="img-fluid galleryImage" alt="<?php echo $data['gambarposter']; ?>" width="1000"></div>
                    </center>
                </div>
            </div>
        </section>
        <!--LINIMASA-->
        <section class="section-padding pb-0" id="linimasa">
            <div class="container">
                <div class="row">
                    <h2 class="text-center mb-lg-5 mb-4">Linimasa</h2>
                    <div class="timeline">
                        <?php
                        if ($resulti->num_rows > 0) {
                            $resulti->data_seek(0);
                            while ($row = $resulti->fetch_assoc()) {
                        ?>
                                <div class="row g-0 justify-content-end justify-content-md-around align-items-start timeline-nodes">
                                    <div class="col-9 col-md-5 me-md-4 me-lg-0 order-3 order-md-1 timeline-content bg-white shadow-lg">
                                        <h3 class="text-light"><?php echo $row["penerimaan"]; ?></h3>
                                        <p>Penerimaan Paper</p>
                                    </div>
                                    <div class="col-3 col-sm-1 order-2 timeline-icons text-md-center"><i class="bi-journal-plus timeline-icon"></i></div>
                                    <div class="col-9 col-md-5 ps-md-3 ps-lg-0 order-1 order-md-3 py-4 timeline-date">
                                        <time></time>
                                    </div>
                                </div>
                                <div class="row g-0 justify-content-end justify-content-md-around align-items-start timeline-nodes">
                                    <div class="col-9 col-md-5 me-md-4 me-lg-0 order-3 order-md-1 timeline-content bg-white shadow-lg">
                                        <h3 class=" text-light"><?php echo $row["batasakahir"]; ?> </h3>
                                        <p>Batas Akhir Pengiriman Paper</p>
                                    </div>
                                    <div class="col-3 col-sm-1 order-2 timeline-icons text-md-center"><i class="bi-journal-x timeline-icon"></i></div>
                                    <div class="col-9 col-md-5 ps-md-3 ps-lg-0 order-1 order-md-3 py-4 timeline-date">
                                        <time></time>
                                    </div>
                                </div>
                                <div class="row g-0 justify-content-end justify-content-md-around align-items-start timeline-nodes">
                                    <div class="col-9 col-md-5 me-md-4 me-lg-0 order-3 order-md-1 timeline-content bg-white shadow-lg">
                                        <h3 class=" text-light"> <?php echo $row["pembayaranakhir"]; ?></h3>
                                        <p>Pembayaran Terakhir Presenter </p>
                                    </div>
                                    <div class="col-3 col-sm-1 order-2 timeline-icons text-md-center"><i class="bi-cash timeline-icon"></i></div>
                                    <div class="col-9 col-md-5 ps-md-3 ps-lg-0 order-1 order-md-3 py-4 timeline-date">
                                        <time></time>
                                    </div>
                                </div>
                                <div class="row g-0 justify-content-end justify-content-md-around align-items-start timeline-nodes">
                                    <div class="col-9 col-md-5 me-md-4 me-lg-0 order-3 order-md-1 timeline-content bg-white shadow-lg">
                                        <h3 class=" text-light"> <?php echo $row["pengumuman"]; ?></h3>
                                        <p>Pengumuman Paper Diterima Untuk Revisi</p>
                                    </div>
                                    <div class="col-3 col-sm-1 order-2 timeline-icons text-md-center"><i class="bi bi-journal-check timeline-icon"></i></div>
                                    <div class="col-9 col-md-5 ps-md-3 ps-lg-0 order-1 order-md-3 py-4 timeline-date">
                                        <time></time>
                                    </div>
                                </div>
                                <div class="row g-0 justify-content-end justify-content-md-around align-items-start timeline-nodes my-lg-5 my-4">
                                    <div class="col-9 col-md-5 ms-md-4 ms-lg-0 order-3 order-md-1 timeline-content bg-white shadow-lg">
                                        <h3 class=" text-light"> <?php echo $row["tanggalseminar"]; ?></h3>
                                        <p>Seminar SINTEK-DC</p>
                                    </div>
                                    <div class="col-3 col-sm-1 order-2 timeline-icons text-md-center"> <i class="bi-mic timeline-icon"></i></div>
                                    <div class="col-9 col-md-5 pe-md-3 pe-lg-0 order-1 order-md-3 py-4 timeline-date"></div>
                                </div>
                                <div class="row g-0 justify-content-end justify-content-md-around align-items-start timeline-nodes my-lg-5 my-4">
                                    <div class="col-9 col-md-5 ms-md-4 ms-lg-0 order-3 order-md-1 timeline-content bg-white shadow-lg">
                                        <h3 class=" text-light"> <?php echo $row["revisi"]; ?> </h3>
                                        <p>Batas Akhir Revisi</p>
                                    </div>
                                    <div class="col-3 col-sm-1 order-2 timeline-icons text-md-center"><i class="bi-arrow-clockwise timeline-icon"></i> </div>
                                    <div class="col-9 col-md-5 pe-md-3 pe-lg-0 order-1 order-md-3 py-4 timeline-date"></div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "Tidak ada data yang ditemukan.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <!--REVIEWER-->
        <section id="gtco-practice-areas" data-section="practice-areas">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="mb-lg-3 mb-3" id="reviewer">Reviewer</h2>
                    </div>
                    <div class="row">
                        <div class="col">
                            <ul> <?php
                                    if ($resultr->num_rows > 0) {
                                        $resultr->data_seek(0);
                                        while ($row = $resultr->fetch_assoc()) {
                                    ?>
                                        <li>
                                            <h6><?php echo $row["nama"]; ?></h6>
                                        </li>
                                <?php
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
        </section></br>
        <!--topik-->
        <section id="gtco-practice-areas" data-section="practice-areas">
            <div class="container">
                <div class="col">
                    <center>
                        <h2 class="mb-lg-3 mb-3" id="topik">Topik Seminar</h2>
                    </center>
                </div>
                <section class="gallery" id="poster">
                    <div class="container">
                        <div class="row">
                            <center>
                                <div class="col"><img src="images/gallery/tujuan.png" class="img-fluid galleryImage" alt="topik"></div>
                            </center>
                        </div>
                    </div>
                </section>
                </br>
                <div class="row">
                    <?php
                    $select_orders = $conn1->prepare("SELECT * FROM `idtopikseminar`");
                    $select_orders->execute();
                    if ($select_orders->rowCount() > 0) {
                        while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <div class="col-md-6">
                                <ul>
                                    <li>
                                        <p><strong><?php echo $fetch_orders["topik"]; ?></strong></p>
                                        <ul>
                                            <?php
                                            $select = $conn1->prepare("SELECT * FROM `isitopikseminar` WHERE idtopik='" . $fetch_orders["id"] . "'");
                                            $select->execute();
                                            if ($select->rowCount() > 0) {
                                                while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                    <li>
                                                        <p><?php echo $row["isitopik"]; ?></p>
                                                    </li>
                                                <?php } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        <?php
                                            }
                                        }
                                    }
                                    if ($resultisi->num_rows > 0) {
                                        $resultisi->data_seek(0);
                                        while ($row = $resultisi->fetch_assoc()) {
                        ?>
                <?php
                                        }
                                    } else {
                                        echo "Tidak ada data yang ditemukan.";
                                    } ?>
                </div>
            </div>
            </div>
        </section>
    </main>

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


    <script src="js/<?= $data2['namajs']; ?>"></script>
    <script src="js/custom.js"></script>
</body>

</html>