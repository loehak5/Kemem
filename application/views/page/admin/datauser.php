<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->


    <!-- Products -->

    <div style="padding-top: 80px;">

    </div>
    <div id="produk" class="products">
        <div class="row" style="padding: 50px;">
            <!-- Product -->
            <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered thtable" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat Email</th>
                            <th scope="col">Julukan</th>
                            <th scope="col">Kampus</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">HP</th>
                            <th scope="col">Alasan</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aktivasi</th>
                            <th scope="col">Pendaftaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($datauser->result_array() as $key => $value) { ?>
                            <?php
                            $satu = ($value['role_id'] == 1) ? "Admin" : "";
                            $dua = ($value['role_id'] == 2) ? "Anggota" : "";
                            ?>

                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['email']; ?></td>
                                <td><?= $value['julukan']; ?></td>
                                <td><?= $value['kampus']; ?></td>
                                <td><?= $value['nim']; ?></td>
                                <td><?= $value['alamat']; ?></td>
                                <td><?= $value['hp']; ?></td>
                                <td><?= $value['alasan']; ?></td>
                                <td><?= $satu ?><?= $dua ?></td>
                                <td><?= $value['is_active']; ?></td>
                                <td><?= $value['masuk']; ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--  -->
</div>