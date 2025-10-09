<!--NAVBAR-->
<nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
    <div class="container">
        <a class="navbar-brand mx-auto d-lg-none" href="index.html">SINTEK DC<strong class="d-block">UNIKA DARMA CENDIKA SURABAYA</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <a class="navbar-brand d-none d-lg-block" href="index.html"><img src="./images/gallery/logo.png" alt="" class="logo"> SINTEK-DC <img src="./images/gallery/logoss2.png" alt="" class="logo"><strong class="d-block">UNIKA DARMA CENDIKA SURABAYA</strong></a>

                <?php if (isset($_SESSION['admin_id'])) { ?>
                    <li class="nav-item active"><a class="nav-link" href="logout.php">Logout</a></li>
                    <li class="nav-item active"><a class="nav-link" href="dashboard.php">Tambah Topik</a></li>
                    <li class="nav-item active"><a class="nav-link" href="gantiposter.php">Ganti Poster</a></li>
                    <li class="nav-item active"><a class="nav-link" href="gantipublish.php">Ganti Publish</a></li>
                    <li class="nav-item active"><a class="nav-link" href="gantijstimer.php">Ganti JsTimer</a></li>
                    <li class="nav-item active"><a class="nav-link" href="gantilinimasa.php">Ganti linimasa</a></li>
                    <li class="nav-item active"><a class="nav-link" href="gantireviewer.php">Ganti Reviewer</a></li>
                    <li class="nav-item active"><a class="nav-link" href="whatsapp://send?text=Hai DCInformatics&phone=+6282328834886">Hubungi</a></li>
                <?php } else { ?>
                    <li class="nav-item active"><a class="nav-link" href="index.php">Kembali</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>