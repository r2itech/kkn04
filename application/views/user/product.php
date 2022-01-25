<section class="hero-banner hero-banner-sm">
    <div class="hero-wrapper">
        <div class="hero-left">
            <h1 class="hero-title">Product</h1>
            <p>Produk unggulan <br class="d-none d-xl-block"> Desa Karangsari, Darma</p>
        </div>
        <div class="hero-right">
            <div class="owl-carousel owl-theme w-100 hero-carousel">
                <div class="hero-carousel-item">
                    <img class="img-fluid" src="<?= base_url('assets/img/about/') . $about['image1']; ?>" alt="img.jpg">
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

<!--================Food menu section start =================-->
<section class="section-margin">
    <div class="container">
        <div class="section-intro mb-75px">
            <h4 class="intro-title">Product of Karangsari</h4>
            <h2>List Product</h2>
        </div>
        <div class="row">
            <?php foreach ($product as $p) : ?>
                <div class="col-lg-6">
                    <div class="media align-items-center food-card">
                        <img class="mr-3 mr-sm-4" src="<?php echo base_url('assets/img/product/') . $p['image']; ?>" width="10%" alt="product.img">
                        <div class="media-body">
                            <div class="d-flex justify-content-between food-card-title">
                                <h4><?= $p['nama']; ?></h4>
                                <h3 class="price-tag">IDR<?= $p['harga']; ?></h3>
                            </div>
                            <p><a class="nav-link" href="<?= site_url('user/detailProduct/') . $p['id']; ?>">Lihat Detail </a></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!--================Food menu section end =================-->

<!-- ================ start footer Area ================= -->