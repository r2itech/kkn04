 <!--================Header Menu Area =================-->

 <!--================Hero Banner Section start =================-->
 <section class="hero-banner">
     <div class="hero-wrapper">
         <div class="hero-left">
             <h1 class="hero-title">KKN 04<br> UNIKU 2020 Karangsari, Darma</h1>
             <div class="d-sm-flex flex-wrap">
                 <a class="hero-banner__video" href="https://www.youtube.com/watch?v=uuSkynyxOYk">Watch Video</a>
             </div>
         </div>
         <div class="hero-right">
             <div class="owl-carousel owl-theme hero-carousel">
                 <div class="hero-carousel-item">
                     <img class="img-fluid" src="<?= base_url('assets/img/about/') . $about['image2']; ?>" alt="">
                 </div>
                 <div class="hero-carousel-item">
                     <img class="img-fluid" src="<?php echo base_url('assets/img/about/') . $about['image1']; ?>" alt="">
                 </div>
                 <div class="hero-carousel-item">
                     <img class="img-fluid" src="<?php echo base_url() ?>assets/img/banner/baner1.jpg" alt="">
                 </div>
                 <div class="hero-carousel-item">
                     <img class="img-fluid" src="<?php echo base_url() ?>assets/img/banner/baner2.jpeg" alt="">
                 </div>
             </div>
         </div>
         <ul class="social-icons d-none d-lg-block">
             <li><a href="https://web.facebook.com/kkn.uniku.900" target="_blank"><i class="ti-facebook"></i></a></li>
             <li><a href="https://instagram.com/kkn.uniku04?igshid=gmjil0iu96zi" target="_blank"><i class="ti-instagram"></i></a></li>
         </ul>
     </div>
 </section>
 <!--================Hero Banner Section end =================-->


 <!--================About Section start =================-->
 <section class="about section-margin pb-xl-70">
     <div class="container">
         <div class="row">
             <div class="col-md-6 col-xl-6 mb-5 mb-md-0 pb-5 pb-md-0">
                 <div class="img-styleBox">
                     <div class="styleBox-border">
                         <img class="styleBox-img1 img-fluid" src="<?= base_url('assets/img/about/') . $about['image2']; ?>" alt="" width="50%">
                     </div>
                     <img class=" styleBox-img2 img-fluid" src="<?= base_url('assets/img/about/') . $about['image1']; ?>" alt="">
                 </div>
             </div>
             <div class="col-md-6 pl-md-5 pl-xl-0 offset-xl-1 col-xl-5">
                 <div class="section-intro mb-lg-4">
                     <h4 class="intro-title">Info Update</h4>
                     <h2><?= $about['title']; ?></h2>
                 </div>
                 <p><?= $about['in_content']; ?>.....</p>
                 <a class="button button-shadow mt-2 mt-lg-4" href="<?= site_url('user/infoUpdate') ?>">Learn More</a>
             </div>
         </div>
     </div>
 </section>
 <!--================About Section End =================-->


 <!--================Featured Section Start =================-->
 <section class="section-margin mb-lg-100">
     <div class="container">
         <div class="section-intro mb-75px">
             <h4 class="intro-title">Featured Food</h4>
             <h2>Quick links for shop</h2>
         </div>


         <div class="owl-carousel owl-theme featured-carousel">
             <?php foreach ($product as $p) : ?>
                 <div class="featured-item">
                     <img class="card-img rounded-0" src="<?php echo base_url('assets/img/product/') . $p['image']; ?>" alt="product.img">
                     <div class="item-body">
                         <h3><?= $p['nama']; ?></h3>
                         <a href="<?= $p['mp']; ?>" target="_blank" title="<?= $p['mp']; ?>">
                             <p>Market Place</p>
                         </a>|
                         <a href="<?= $p['s1']; ?>" target="_blank" title="<?= $p['s1']; ?>">
                             <p>Sosial Media 1</p>
                         </a>|
                         <a href="<?= $p['s2']; ?>" target="_blank" title="<?= $p['s2']; ?>">
                             <p>Sosial Media 2</p>
                         </a>
                         <div class="d-flex justify-content-between">
                             <ul class="rating-star">
                             </ul>
                             <h3 class="price-tag">IDR<?= $p['harga']; ?></h3>
                         </div>
                     </div>
                 </div>
             <?php endforeach; ?>
         </div>
     </div>
 </section>
 <!--================Featured Section End =================-->

 <!-- ================ start footer Area ================= -->