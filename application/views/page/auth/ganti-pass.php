<!DOCTYPE html>
<html lang="en">

<head>
    <title> <?php echo $titel ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" sizes="192x192" href="<?php echo base_url() ?>assets/home/img/logo.png">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="container">
                    <?= $this->session->flashdata('pesan2'); ?>
                </div>
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?php echo base_url() ?>/assets/login/images/logo.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="<?php echo base_url('auth/changePassword') ?>" method="post">
                    <span class="login100-form-title">
                        <small>Rubah sandi dari</small><br />
                        <p style="font-size: 14px; color: black;">( <?php echo $this->session->userdata('reset_email'); ?> )</p>
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password1" placeholder="New Password">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password2" placeholder="Repeat">
                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                    <div class="flex-col-c p-t-50">
                        <span class="txt1 p-b-17">
                            &copy;2019
                        </span>
                        <span class="txt1 p-b-17" style="margin-top: -23px;">
                            <b>UKM <font class="small">Musik Blitar Raya</font></b>
                        </span>

                        <a href="https://virtualdata.me/lKWnQeCFQ" class="txt2">
                            <font class="small" style="size: 5px;">Design By <b>Lukman Hakim</b></font>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>/assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>/assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url() ?>/assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>/assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>/assets/login/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url() ?>/assets/login/js/main.js"></script>

</body>

</html>