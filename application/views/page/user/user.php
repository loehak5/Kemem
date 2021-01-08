<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->


    <!-- Products -->

    <div style="padding-top: 80px;">
        <div class="container">
            <div class="row">
                <?= $this->session->flashdata('pesan'); ?>
            </div>
            <div class="product">
                <div class="product_content">
                    <div class="d-flex flex-row align-items-start justify-content-start">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/images/profile/') . $user['image']; ?>" class="card-img" style="width: 330em; height: auto;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title"><?= $user['nama']; ?></h2>
                                    <table>
                                        <tr>
                                            <td width="80px">Alamat :</td>
                                            <td><span class="card-text"><?= $user['alamat']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Email :</td>
                                            <td><span class="card-text"><?= $user['email']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Kampus :</td>
                                            <td><span class="card-text"><?= $user['kampus']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Telphone :</td>
                                            <td><span class="card-text"><small class="text-muted"><?= $user['hp']; ?></small></span></td>
                                        </tr>
                                    </table>
                                    <div style="margin-top: 30px; font-size: 16px;">
                                        <div>
                                            <a href="<?php echo base_url() ?>user/edit"><i class="fa fa-fw fa-pencil-square" aria-hidden="true"></i> EDIT</a>
                                        </div>
                                        <div>
                                            <a href="<?php echo base_url() ?>auth/logout"><i class="fa fa-fw fa-sign-out" aria-hidden="true"></i> LOG OUT</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="produk" class="products">
        <div class="container">
            <div class="row products_row">
                <!-- Product -->
                <div class="col-xl-4 col-md-6">
                    <div class="product">
                        <div class="product_content">
                            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div>
                                        <div class="product_name"><a style="font-size: 20px;" href="#">Anggota Terdaftar</a></div>
                                    </div>
                                </div>
                                <div class="ml-auto text-right">
                                    <div class="rating_r rating_r_4 home_item_rating"><?= date('d m Y'); ?></div>
                                </div>
                            </div>
                            <div class="product_price text-center" style="padding: 20px; color: green; font-size: 18px; background: #E0E0E0; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;">
                                <span>
                                    <?php foreach ($agtAll->result_array() as $key => $value) { ?>
                                        <?php echo $value['total']; ?>
                                    <?php } ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="product">
                        <div class="product_content">
                            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div>
                                        <div class="product_name"><a style="font-size: 20px;" href="#">Keuangan Hari ini</a></div>
                                    </div>
                                </div>
                                <div class="ml-auto text-right">
                                    <div class="rating_r rating_r_4 home_item_rating"><?= date('d m Y'); ?></div>
                                </div>
                            </div>
                            <div class="product_price bege text-center" style="padding: 20px; color: green; font-size: 18px; background: #E0E0E0; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;"><span>Rp</span>
                                <?php foreach ($pemasukan->result_array() as $key => $value) { ?>
                                    <?php echo number_format($value['jml_pemasukan'], 0, ',', '.'); ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="product">
                        <div class="product_content">
                            <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                <div>
                                    <div>
                                        <div class="product_name"><a style="font-size: 20px;" href="#">Total Karya</a></div>
                                    </div>
                                </div>
                                <div class="ml-auto text-right">
                                    <div class="rating_r rating_r_4 home_item_rating"><?= date('d m Y'); ?></div>
                                </div>
                            </div>
                            <div class="product_price text-center" style="padding: 20px; color: green; font-size: 18px; background: #E0E0E0; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;">
                                <span>
                                    2
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row page_nav_row">
                <div class="col">
                    <div class="page_nav">
                        <!-- <html>

                        <head>
                            <title>Verification Code</title>
                        </head>

                        <body>
                            <h2>Thank you for Registering.</h2>
                            <h3>Hi <b style="color: orange;">' . $this->input->post('nama') . '</b>.</h3>
                            <p>Kami berikan waktu untuk aktivasi / verifikasi akun anda kurang dari 24Jam, untuk melakukan aktivasi / verifikasi klik link ini untuk verifikasi akun anda </p>
                            <h4><a style="color: white; background-color: #000!important; border: none; display: inline-block; padding: 8px 16px; vertical-align: middle; overflow: hidden; text-decoration: none;color: inherit; background-color: inherit; text-align: center; cursor: pointer; white-space: nowrap;" href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate My Account</a></h4>
                            <br />
                            <p>atau aktivasi melalui link ini. Jika tombol tidak bisa (copy link ini lalu paste ke tab / address)</p><br />
                            ' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '<br />
                            <p>Salam hormat "Team Developer UKM Musik BLitar Raya"</p>
                        </body>

                        </html> -->
                    </div>
                </div>
            </div>
            <div class="row load_more_row">

            </div>
        </div>
    </div>

    <!--  -->
</div>