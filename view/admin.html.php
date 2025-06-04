<?php
# view/admin.html.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>MVC Create Read C2 | Administration</title>
    <meta name="description" content="MVC Create Read C2 | Administration">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: FlexStart
    * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
    * Updated: Nov 01 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body class="blog-page">

<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="./" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="assets/img/logo.png" alt="">
            <h1 class="sitename">Classe2</h1>
        </a>

        <?php
        // menu
        include "_menu.html.php";
        ?>

    </div>
</header>

<main class="main">

    <!-- Page Title -->
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>MVC Create Read C2 | Administration</h1>
                        <p class="mb-0">Création d'un nouvel article</p>
                    </div>
                </div>
            </div>
        </div>

</main>
<div class="container">
    <div class="row">

        <div class="col-lg-12">


            <!-- Blog Posts Section -->
            <section id="blog-posts" class="blog-posts section">

                <div class="container">

                    <div class="row gy-4">
                        <div>
                            <?php if(isset($error)): ?>
                            <h3 class="alert alert-danger"><?=$error?></h3>
                                <?php
                            elseif(isset($_GET['message'])):
                                ?>
                                <h3 class="alert alert-success"><?=$_GET['message']?></h3>
                            <?php
                            endif;
                            ?>
                            <form action="" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                                <div class="row gy-4">

                                    <div class="col-md-12">
                                        <input type="text" name="article_title" class="form-control" placeholder="votre titre" required>
                                    </div>

                                    <div class="col-md-12">
                                        <textarea name="article_text" class="form-control" placeholder="votre texte" required></textarea>
                                    </div>



                                    <div class="col-md-6 ">
                                        <input type="checkbox"
                                               id="public"
                                               class="form-check-input" name="article_is_published" value="1" > Publié ?
                                    </div>
                                    <div class="col-md-6 ">
                                       Date de publication <input type="datetime-local" class="form-control" name="article_date_published" value="<?=date("Y-m-d\TH:i")?>" >

                                    </div>
<input type="hidden" name="user_iduser" value="<?=$_SESSION['iduser']?>">
                                    <div class="col-md-6 ">
                                        <input type="submit" value="Insérer">
                                    </div>

                                </div>
                            </form>
                        </div><!-- End Contact Form -->
                        <div class="col-12">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<footer id="footer" class="footer">



    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Classe2 <?=date("Y")?></strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href=“https://themewagon.com>ThemeWagon
        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>