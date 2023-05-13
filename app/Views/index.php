<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> 
<![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> 
<![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="id">
<!--<![endif]-->

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi sederhana pembantu pemutakhiran Data SDGs di Desa Pasirlangu Kecamatan Pakenjeng Kabupaten Garut Provinsi Jawa Barat.">
    <meta name="twitter:description" content="Aplikasi sederhana pembantu pemutakhiran Data SDGs di Desa Pasirlangu Kecamatan Pakenjeng Kabupaten Garut Provinsi Jawa Barat.">
    <meta name="author" content="templatemo">
    <title><?= $title; ?></title>
    <!-- 
    Compass Template
    http://www.templatemo.com/tm-454-compass
    -->
    <meta charset="UTF-8">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

    <!-- CSS Bootstrap & Custom -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link href="<?= base_url('compass/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?= base_url('compass/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('compass/css/templatemo-misc.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('compass/css/animate.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('compass/css/templatemo-main.css'); ?>">

    <!-- Favicons -->
    <link rel="icon" href="<?= base_url('/sdgs-garut.png'); ?>">

    <!-- JavaScripts -->
    <script src="<?= base_url('compass/js/jquery-1.10.2.min.js'); ?>"></script>
    <script src="<?= base_url('compass/js/modernizr.js'); ?>"></script>
    <!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
            <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
        </div>
    <![endif]-->
</head>

<body>

    <div id="home">
        <div class="site-header">
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 mt-2">
                            <div class="right-header text-right">
                                <ul class="social-icons">
                                    <li><a href="https://facebook.com/sutarsarian" target="blank" class="fa fa-facebook"></a></li>
                                    <li><a href="https://www.instagram.com/sutarsarian/" target="blank" class="fa fa-instagram"></a></li>
                                    <li><a href="https://twitter.com/riansutarsa" target="blank" class="fa fa-twitter"></a></li>
                                    <li><a href="#" target="blank" class="fa fa-google-plus"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="logo">
                                <h1><a href="<?= base_url(); ?>" title="<?= $title; ?>"><?= $title; ?></a></h1>
                            </div> <!-- /.logo -->
                        </div> <!-- /.col-md-4 -->
                        <div class="col-md-8 col-sm-8 col-xs-6">
                            <div class="menu text-right hidden-sm hidden-xs">
                                <ul>
                                    <li><a href="#home">Home</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                    <li><a href="#login">Login</a></li>
                                </ul>
                            </div> <!-- /.menu -->
                        </div> <!-- /.col-md-8 -->
                    </div> <!-- /.row -->
                    <div class="responsive-menu text-right visible-xs visible-sm">
                        <a href="#" class="toggle-menu fa fa-bars"></a>
                        <div class="menu">
                            <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#contact">Contact</a></li>
                                <li><a href="#login">Login</a></li>
                            </ul>
                        </div> <!-- /.menu -->
                    </div> <!-- /.responsive-menu -->
                </div> <!-- /.container -->
            </div> <!-- /.header -->
        </div> <!-- /.site-header -->
    </div> <!-- /#home -->

    <div class="flexslider">
        <ul class="slides">
            <li>
                <img src="<?= base_url('compass/images/global-map-digital-free-vector.webp'); ?>" alt="">
                <div class="flex-caption">
                    <h2>Compass Template</h2>
                    <span></span>
                    <p>Praesent tincidunt neque semper elementum gravida. Donec id euismod magna.<br>Ut erat ligula, malesuada eu quam a, fringilla auctor augue.</p>
                </div>
            </li>
            <li>
                <img src="<?= base_url('compass/images/148668529-indonesia-digital-map-binary-rays-radiating-around-glowing-country-internet-connections-and-data-exc.png'); ?>" alt="">
                <div class="flex-caption">
                    <h2>Responsive Mobile</h2>
                    <span></span>
                    <p>Ea, similique, odit id consectetur est beatae quia dicta officiis ipsam itaque in<br>facilis aliquid quas officia voluptatem repellendus repellat!</p>
                </div>
            </li>
        </ul>
    </div>

    <div id="about" class="section-cotent">
        <div class="container">
            <div class="title-section text-center">
                <h2>About Us</h2>
                <span></span>
            </div> <!-- /.title-section -->
            <div class="row">
                <div class="col-md-8">
                    <h4 class="widget-title">Latar Belakang</h4>
                    <blockquote class="blockquote">
                        <p>Pemutakhiran IDM 2021 juga berbasis SDGs Desa. Pemutakhiran data berbasis SDGs Desa adalah pemutakhiran data IDM yang lebih detil lagi, lebih mikro, sehingga bisa memberikan informasi lebih banyak. Sebagai proses perbaikan, ada pendalaman data-data pada level RT, keluarga, dan warga.
                            <br><br>
                            Pihak yang terlibat dalam proses pemutakhiran data SDGs Desa ialah Kelompok Kerja Relawan Pendataan Desa, pemerintah daerah kabupaten/kota, pemerintah daerah provinsi, dan Kementerian Desa, PDT, dan Transmigrasi. Dengan merujuk pada Permendesa PDTT No 21/2020.
                            <br><br>
                            Selengkapnya terkait panduan pengisian dapat dilihat di menu input SDGs Desa pada halaman
                        <footer class="blockquote-footer"><a href="https://sid.kemendesa.go.id/profile" target="blank">https://sid.kemendesa.go.id/profile.</a></footer>
                        </p>
                    </blockquote>
                </div> <!-- /.col-md-3 -->
                <div class="col-md-4 our-skills">
                    <h4 class="widget-title">Pendata dan Capaian Data Individu</h4>
                    <ul class="progess-bars">
                        <?php foreach ($individu_log as $row) { ?>
                            <?php $persentase = ($row['jumlah'] / $row['Jml_LP']) * 100 ?>
                            <li>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $row['jumlah']; ?>" aria-valuemin="0" aria-valuemax="<?php echo $row['Jml_LP']; ?>" style="width: <?php echo number_format($persentase, 2) ?>%;">
                                        <?= $row['NamaPendata']; ?> <?= number_format($persentase, 2); ?>%
                                    </div>
                                </div>
                            </li>
                        <?php  } ?>
                    </ul>
                </div> <!-- /.col-md-3 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#about -->

    <div id="contact" class="section-cotent">
        <div class="container">
            <div class="title-section text-center">
                <h2>Contact Us</h2>
                <span></span>
            </div> <!-- /.title-section -->
            <div class="row">
                <div class="col-md-5 col-sm-6">
                    <div class="contact-info">
                        <p>Aplikasi sederhana pembantu pemutakhiran Data SDGs di <a href="https://pemdespsl.site/">Desa Pasirlangu</a> Kecamatan Pakenjeng Kabupaten Garut Provinsi Jawa Barat.</p>
                        <span><i class="fa fa-home"></i>Jl. Desa Km. 200 Kp. Rahayu Desa Pasirlangu Kec. Pakenjeng Kab. Garut - 44164 Kode Pos: 44164</span>
                        <span><i class="fa fa-globe"></i><a href="https://pemdespsl.site/" target="blank">Website Desa Pasirlangu</a></span>
                        <span><i class="fa fa-envelope"></i>info@pemdespsl.site</span>
                        <span id="login"><a href="/login"><i class="fa fa-sign-in"></i>Login</a></span>
                    </div>
                </div> <!-- /.col-md-3 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /#contact -->

    <div class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-12">
                    <p>Copyright &copy; 2021 - <?= date('Y'); ?> SDGs Desa Pasirlangu</p>
                </div> <!-- /.col-md-6 -->
                <div class="col-md-4 col-sm-4 col-12">
                    <div class="go-top">
                        <a href="#" id="go-top">
                            <i class="fa fa-angle-up"></i>
                            Back to Top
                        </a>
                    </div>
                </div> <!-- /.col-md-6 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <script src="<?= base_url('compass/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('compass/js/plugins.js'); ?>"></script>
    <script src="<?= base_url('compass/js/jquery.lightbox.js'); ?>"></script>
    <script src="<?= base_url('compass/js/custom.js'); ?>"></script>

</body>

</html>