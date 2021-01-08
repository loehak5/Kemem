<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="google-site-verification" content="wp2zTG96cNgNkARKlIfFrFPfTstLXCgxxsBO12sQdGs" />
    <meta name="google-site-verification" content="a9ZPvurw253V766l_w0ynrGvOqE2PA2PHiu59h4aAtQ" />
    <meta name="google-site-verification" content="Dwp3SSwOVkBv-n6TfWAiwsiTkINlYKM_DchZUfD7zCE" />
    <meta content='UKM Musik Blitar Raya, Komunitas Musik Blitar Raya terbentuk pada tahun 2018, Sebuah Organisasi musik seluruh Kampus Blitar Raya. Label Blitar, Record Musik' name='description' />
    <meta content='UKM Musik Blitar Raya, ukm musik blitar, blitar, ukm musik, blitar raya, ukm musik blitar raya,' name='keywords' />
    <meta content='http://www.ukmmusikblitarraya.my.id/' property='og:url' />
    <meta content='ukm musik blitar raya' property='og:title' />
    <meta content='UKM musik blitar raya' property='og:description' />
    <meta content='UKM Musik Blitar Raya' name='author' />
    <link rel="icon" sizes="192x192" href="<?php echo base_url() ?>assets/home/img/logo.png">
    <title>UKM Musik Blitar Raya</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/css/Footer-Clean.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/css/Header-Blue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/home/css/styles.css">

</head>

<body>
    <div>
        <div class="header-blue" style="padding-bottom: 180px;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand text-white" href="#" data-aos="fade-up">UKM <b>Musik</b></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" data-aos="fade-up" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Home</a></li>
                            <li class="dropdown nav-item"><a class="dropdown-toggle nav-link active" data-toggle="dropdown" aria-expanded="false" href="#">Galery&nbsp;</a>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="<?php echo base_url() ?>home/keuangan">Data</a><a class="dropdown-item" role="presentation" href="<?php echo base_url() ?>home/foto">Foto</a><a class="dropdown-item" role="presentation" href="<?php echo base_url() ?>home/video">Video</a></div>
                            </li>
                            <!-- <li class="nav-item" role="presentation"><a class="nav-link active" href="<?php echo base_url() ?>home/about">About</a></li> -->
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                            <div class="form-group d-xl-flex justify-content-xl-center"><label for="search-field"><i class="fa fa-search"></i></label><input class="form-control search-field" type="search" name="search" id="search-field"></div>
                        </form>
                        <ul class="nav navbar-nav"></ul>
                        <?php if ($user['role_id'] == 0) { ?>
                            <span class="navbar-text"> <a href="<?php echo base_url() ?>auth" class="login">Masuk</a></span><button type="button" style="border-radius: 40px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Daftar</button>
                        <?php } ?>
                    </div>

                </div>
            </nav>
            <div class="container hero">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                        <h1>UKM Musik Blitar Raya</h1>
                        <p>Kami adalah organisasi mahasiswa seni musik se-Blitar Raya yang berdiri di tahun 2018. UKM Musik Blitar Raya sendiri bisa diesebut juga pemersatu dari beberapa Unit Kegiatan Mahasiswa Univ, ST, Institut di seluruh Kota Blitar. </p>
                        <button class="btn btn-light btn-lg action-button" type="button">Learn More</button>
                    </div>
                    <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder"><img class="img-fluid" src="<?php echo base_url() ?>assets/home/img/undraw_compose_music_ovo2.svg" width="600" style="margin: 113px;margin-left: 41px;margin-top: 142px;width: 499px;height: 319px;">
                        <div class="iphone-mockup">
                            <div class="screen"></div>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding-top: 30px !important;">
                        <iframe width="100%" height="240" src="https://open.spotify.com/embed/album/4qBe5tIvn5Mk5I9Ojn0jJ1" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" method="post" action="<?= base_url('auth/up_user') ?>">



                        <div class="form-group">
                            <label>Nama lengkap</label>
                            <input type="text" name="nama" class="form-control" require oninvalid="this.setCustomValidity('Nama harus diisi')" value="<?= set_value('name') ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="pswd" type="password" class="form-control" require oninvalid="this.setCustomValidity('Password harus diisi')">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= set_value('email') ?>">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Julukan</label>
                            <input type="text" name="julukan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Kampus Asal</label>
                            <input type="text" name="kampus" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>NIM</label>
                            <input type="text" name="nim" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Whatsapp</label>
                            <input type="text" name="hp" class="form-control">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your phone with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label>Alasan masuk UKM Msuik Blitar Raya</label>
                            <input type="text" name="alasan" class="form-control">
                            <small id="emailHelp" class="form-text text-muted">Tuliskan alasan anda maksimal 300 karakter.</small>
                        </div>
                        <div class="form-group">
                            <label>Instrumen</label>
                            <input type="text" name="instrumen" class="form-control">
                            <small id="emailHelp" class="form-text text-muted">Alat / bentuk musik apa yang anda tekuni?</small>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role_id" id="exampleFormControlSelect1">
                                <option value="2">Anggota</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-clean" style="padding-top: 20px;
    padding-bottom: 20px;">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4 d-block float-left mr-auto item">
                        <h2>Contact</h2>
                        <ul>
                            <li></li>
                            <li><i class="fa fa-envelope-open" style="padding-right: 43px;height: 17px;"></i><a href="#"><strong>official</strong>@ukmmusikblitarraya.my.id</a></li>
                            <li><i class="fa fa-phone" style="padding-right: 43px;height: 17px;"></i><a href="#"><strong>+(62)</strong> 83706772538</a></li>
                            <li><i class="fa fa-location-arrow" style="padding-right: 43px;height: 17px;"></i><a href="#"><strong>Papungan</strong>, Blitar - Jatim</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="d-table float-right item social" style="padding-top: 17px;">
                            <a href="https://www.youtube.com/c/UKMMusikBlitarRaya"><i class="icon ion-social-youtube"></i></a>
                            <a href="https://www.instagram.com/ukmmusik_blitar/"><i class="icon ion-social-instagram"></i></a>
                            <p class="copyright"><b>UKM Musik</b> Blitar Raya &copy; <script>
                                    document.write(new Date().getFullYear());
                                </script> | Design by <a href="https://www.instagram.com/m.lukhak/" target="_blank">LuqmanHakim</a></p>
                        </div>
                    </div>
                    <img src="<?php echo base_url() ?>assets/home/img/logo.png" width="112" height="100%">
                </div>
            </div>
        </footer>
    </div>
    <script src="<?php echo base_url() ?>assets/home/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/home/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/home/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</Body>

</html>