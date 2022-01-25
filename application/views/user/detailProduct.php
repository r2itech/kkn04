<section class="hero-banner hero-banner-sm">
    <div class="hero-wrapper">
        <div class="hero-left">
            <h1 class="hero-title">Detail Produk</h1>
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

<!--================Blog Area =================-->
<section class="blog_area single-post-area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="<?= base_url('assets/img/product/') . $product['image']; ?>" width="50%" alt="product.img">
                    </div>
                    <div class="blog_details">
                        <h2><?= $product['nama'] ?></h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="ti-user"></i>Administrator</a></li>
                        </ul>
                        <p class="excert">
                            <?= $product['deskripsi']; ?>
                        </p>
                        <p class="excert">
                            Untuk membeli produk ini silahkan kunjungi toko pada link di bawah:
                            <a class="nav-link" href="<?= $product['mp']; ?>" target="_blank" title="<?= $product['mp']; ?>">Market Place</a>
                            <a class="nav-link" href="<?= $product['s1']; ?>" target="_blank" title="<?= $product['s1']; ?>">Sosial Media 1</a>
                            <a class="nav-link" href="<?= $product['s2']; ?>" target="_blank" title="<?= $product['s2']; ?>">Sosial Media 2</a>
                        </p>
                    </div>
                </div>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                        </div>
                        <ul class="social-icons">
                            <li><a href="https://web.facebook.com/kkn.uniku.900" target="_blank"><i class="ti-facebook"></i></a></li>
                            <li><a href="https://instagram.com/kkn.uniku04?igshid=gmjil0iu96zi" target="_blank"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="comments-area">
                </div>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form class="form-contact comment_form" action="#" id="commentForm">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button button-contactForm">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Quick Links</h4>
                        <ul class="list cat-list">
                            <li>
                                <a href="<?= site_url('user/profileDesaSejarah') ?>" class="d-flex">
                                    <p>Profil Desa</p>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('user/profileUsahaSejarah') ?>" class="d-flex">
                                    <p>Profil Wirausaha</p>
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->