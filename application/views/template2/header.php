<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KKN04 - <?= $title ?></title>
    <link rel="icon" href="<?php echo base_url() ?>assets/img/about/icon.png" type="image/png">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendors/Magnific-Popup/magnific-popup.css">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>

<body>

    <!--================ Header Menu Area start =================-->
    <header class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <a class="navbar-brand logo_h" href="index.html"><img src="<?php echo base_url() ?>assets/img/logo04.png" alt="logo.alt"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav justify-content-end">
                            <?php if ($title == 'home')
                                echo '<li class="nav-item active">';
                            else
                                echo '<li class="nav-item">';
                            ?><a class="nav-link" href="<?= site_url('user') ?>">Home</a></li>
                            <?php if ($title == 'profil desa' || $title == 'profil wirausaha')
                                echo '<li class="nav-item active submenu dropdown">';
                            else
                                echo '<li class="nav-item submenu dropdown">';
                            ?><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="<?= site_url('user/profileDesaSejarah') ?>">Desa</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?= site_url('user/profileUsahaSejarah') ?>">Wirausaha</a></li>
                            </ul>
                            </li>
                            <?php if ($title == 'product' || $title == 'product detail')
                                echo '<li class="nav-item active">';
                            else
                                echo '<li class="nav-item">';
                            ?><a class="nav-link" href="<?= site_url('user/product') ?>">Product</a>
                            <?php if ($title == 'contact')
                                echo '<li class="nav-item active">';
                            else
                                echo '<li class="nav-item">';
                            ?><a class="nav-link" href="<?= site_url('user/contact') ?>">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>