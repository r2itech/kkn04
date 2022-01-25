<section class="hero-banner hero-banner-sm">
    <div class="hero-wrapper">
        <div class="hero-left">
            <h1 class="hero-title">Contact Us</h1>
            <p>Please contact the contact listed to contact us <br class="d-none d-xl-block"> or send your message via the form provided</p>
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

<!-- ================ contact section start ================= -->
<section class="section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="col-12">
                <h2 class="contact-title">Contact Us</h2>
            </div>
            <div class="col-lg-8">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="content" id="content" cols="30" rows="9" placeholder="Enter Message"></textarea>
                                <?= form_error('content', '<small class="text-danger pl-5">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                                <?= form_error('name', '<small class="text-danger pl-5">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
                                <?= form_error('email', '<small class="text-danger pl-5">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                                <?= form_error('subject', '<small class="text-danger pl-5">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm" name="send message">Send Message</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-4">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3><a href="tel:<?= $about['telp'] ?>"><?= $about['telp'] ?> </a></h3>
                        <p>Mon to Fri 8am to 9pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3><a href="mailto:<?= $about['email'] ?>"><?= $about['email'] ?></a></h3>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>