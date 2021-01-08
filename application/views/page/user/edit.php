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
                                <img src="<?= base_url('assets/images/profile/') . $user['image']; ?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title"><?= $user['nama']; ?></h2>
                                    <table style="font-size: 16px;">
                                        <tr>
                                            <td width="80px">Alamat </td>
                                            <td width="10px">:</td>
                                            <td><span class="card-text"><?= $user['alamat']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Email </td>
                                            <td>:</td>
                                            <td><span class="card-text"><?= $user['email']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Kampus </td>
                                            <td>:</td>
                                            <td><span class="card-text"><?= $user['kampus']; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td>Telphone </td>
                                            <td>:</td>
                                            <td><span class="card-text"><small class="text-muted"><?= $user['hp']; ?></small></span></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $satu = ($user['role_id'] == 1) ? "Admin" : "";
                                            $dua = ($user['role_id'] == 2) ? "Anggota" : "";
                                            ?>
                                            <td>Sebagai </td>
                                            <td>:</td>
                                            <td>
                                                <span class="card-text"><?= $satu ?></span>
                                                <span class="card-text"><?= $dua ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Join</td>
                                            <td>:</td>
                                            <td><span class="card-text"><small class="text-muted"><?= $user['masuk']; ?></small></span></td>
                                        </tr>
                                    </table>
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
            <div class="product_content">
                <div style="padding: 20px;">
                    <form action="<?= base_url('user/updates') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="nama" value="<?= $user['nama'] ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">' . '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="email" value="<?= $user['email'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Julukan</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="julukan" value="<?= $user['julukan'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Kampus</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="kampus" value="<?= $user['kampus'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="nim" value="<?= $user['nim'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="alamat" value="<?= $user['alamat'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="hp" value="<?= $user['hp'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">foto</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <small>
                                            <span style="color: red;">* </span> Foto tidak boleh berukuran lebih dari <b style="color: red;"> 5 MB</b>,
                                        </small><br />
                                        <small>
                                            <span style="color: red;">* </span> Jika memaksakan melebihi <b style="color: red;"> 5 MB</b> maka foto tidak akan tampil.
                                        </small><br />
                                        <small>
                                            <span style="color: red;">* </span> Usahakan dalam bentuk persegi.
                                        </small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img id="output" class="img-thumbnail" />
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleFormControlFile1" name="userfile" accept="image/*" onchange="loadFile(event)">
                                            <label class="custom-file-label" for="exampleFormControlFile1">Pilih gambar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>