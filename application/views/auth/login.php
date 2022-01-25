<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/login/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/login/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?php echo base_url() ?>assets/login/bgDesa.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="content-header">
                    <img src="<?= base_url('assets/img/about/logoKKN04.png') ?>" class="card-img-top" alt="dev.img">
                    <div class="box-body">
                </span>
                <span class="login100-form-title p-t-41 p-b-31">
                    <h1 style="color: yellow; font-family:tahoma; font-size : 28px; font-style:bold; text-align:center;"> Login Page </h1>
                </span>
                <?= $this->session->flashdata('message'); ?>
                <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="<?= base_url('auth'); ?>">
                    <div class="wrap-input100">
                        <input class="input100" type="text" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                        <?= form_error('username', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                    <div class="wrap-input100">
                        <input class="input100" type="password" id="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        <?= form_error('password', '<small class="text-danger pl-5">', '</small>'); ?>
                    </div>
                    <div class="container-login100-form-btn m-t-20">
                        <button class="login100-form-btn" type="submit" name="login">
                            <h1 style="color: greenyellow; font-family:arial; font-size : 14px; font-style:bold; text-align:center;"> Login </h1>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/js/popper.js"></script>
    <script src="<?php echo base_url() ?>assets/login/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/login/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>assets/login/main.js"></script>

</body>

</html>