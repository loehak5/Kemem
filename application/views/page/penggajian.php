<script language="JavaScript">
    function checkChoice(whichbox) {
        with(whichbox.form) {
            if (whichbox.checked == false)
                hiddentotal.value = eval(hiddentotal.value) - eval(whichbox.value);
            else
                hiddentotal.value = eval(hiddentotal.value) + eval(whichbox.value);
            return (formatCurrency(hiddentotal.value));
        }
    }

    function formatCurrency(num) {
        num = num.toString().replace(/\$|\,/g, '');
        if (isNaN(num)) num = "0";
        cents = Math.floor((num * 100 + 0.5) % 100);
        num = Math.floor((num * 100 + 0.5) / 100).toString();
        if (cents < 10) cents = "0" + cents;
        for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
            num = num.substring(0, num.length - (4 * i + 3)) + '' + num.substring(num.length - (4 * i + 3));
        return (num + "," + cents);
    }
</script>

<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('number1').value;
        var txtSecondNumberValue = document.getElementById('number').value;
        var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('number2').value = result;
        }
    }
</script>

<div class="super_container_inner">
    <div class="super_overlay"></div>

    <!-- Home -->


    <!-- Products -->

    <div style="padding-top: 80px;">
        <div class="container">
            <div class="product">
                <div class="product_content">
                    <div class="product_info d-flex flex-row align-items-start justify-content-start">
                        <div>
                            <div>
                                <div class="product_nameku">Pemasukan</div>
                            </div>
                            <div>

                                <div class="product_nameku">Pengeluaran</div>
                            </div>
                        </div>
                        <div class="ml-auto text-right">
                            <div class="text-right uangku"><span>Rp</span>
                                <?php foreach ($pemasukan->result_array() as $key => $value) { ?>
                                    <?php echo number_format($value['jml_pemasukan'], 0, ',', '.'); ?>
                                <?php } ?>
                            </div>
                            <div class="text-right uangku"><span>Rp</span>
                                <?php foreach ($pengeluaran->result_array() as $key => $value) { ?>
                                    <?php echo number_format($value['jml_pengeluaran'], 0, ',', '.'); ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="product_buttons">
                        <div class="text-right d-flex flex-row align-items-start justify-content-start">
                            <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                <div class="product_name" style="font-size: 25px; margin: 10px; font-weight: 900; color:#4A4A4A;">Total</div>
                            </div>
                            <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                <div class="product_price text-right" style="font-weight: 900;">
                                    <?php
                                    $query = $this->db->query("SELECT ROUND ( SUM(IF(status = 'pemasukan.svg', nominal, 0))-(SUM(IF( status = 'pengeluaran.svg', nominal, 0))) ) AS subtotal FROM keuangan");

                                    foreach ($query->result_array() as $rows) {
                                        $dwet = $rows['subtotal'];
                                        $arto = number_format($dwet, 0, ",", ".");
                                        echo "<span>Rp</span> $arto";
                                    }
                                    ?>
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
                    <?php echo form_open_multipart('admin/proses_gajih') ?>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nama" placeholder="Isikan nama" size="20" required="" oninvalid="this.setCustomValidity('Keterangan harus di isi')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Catatan</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="catatan" placeholder="Maksimal 50 karakter" size="25">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" required="" oninvalid="this.setCustomValidity('Mohon di isi dan tentukan pilihan')">
                                <option value="">- Pilih Status -</option>
                                <option value="terima.svg">Menerima</option>
                                <option value="belum.svg">Belum Menerima</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Awal</div>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="persiapan" value="2500" onClick="this.form.total.value=checkChoice(this);">
                                <label class="form-check-label" for="gridCheck1">&nbsp;
                                    RP. 2.500
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Akhir</div>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="selesai" value="2500" onClick="this.form.total.value=checkChoice(this);">
                                <label class="form-check-label" for="gridCheck1">&nbsp;
                                    RP. 2.500
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Sub Total</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="number1" type="text" name="total" value="" readonly onkeyup="sum();">
                            <input type=hidden name=hiddentotal value=0>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Perolehan</label>
                        <div class="col-sm-10" id="only-number">
                            <input class="form-control" id="number" type="text" name="perolehan" placeholder="Tuliskan angka disini" size="18" onkeyup="sum();">
                        </div>
                    </div>
                    </br>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">JUMLAH</label>
                        <div class="col-sm-10" id="only-number">
                            <input class="form-control" id="number2" type="text" name="jumlah" size="18" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                    <!-- <form>
                            <table class="table">
                                <tr>
                                    <th>Nama</th>
                                    <td colspan="4">
                                        <input type="text" name="nama" placeholder="Isikan nama" size="20" required="" oninvalid="this.setCustomValidity('Keterangan harus di isi')">
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>       
                                </tr>
                                <tr>
                                    <th>Catatan</th>
                                    <td colspan="5">
                                        <input type="text" name="catatan" placeholder="Maksimal 50 karakter" size="25">
                                    </td>        
                                </tr>
                                <tr>
                                <th>Status</th>
                                <td colspan="2">
                                    <select name="status" required="" oninvalid="this.setCustomValidity('Mohon di isi dan tentukan pilihan')">
                                        <option value="">- Pilih Status -</option>
                                        <option value="terima.svg">Menerima</option>
                                        <option value="belum.svg">Belum Menerima</option>
                                    </select>
                                </td>       
                                </tr>
                                <tr>
                                    <th>Awal</th>
                                    <td width="29">Rp. </td>
                                    <td width="99" align="right">2,500</td>
                                    <td width="33" align="center"><input type="checkbox" name="persiapan" value="2500" onClick="this.form.total.value=checkChoice(this);"></td> 
                                </tr>
                                <tr>
                                    <th>Selesai</th>
                                    <td width="29">Rp. </td>
                                    <td width="99" align="right">2,500</td>
                                    <td width="33" align="center"><input type="checkbox" name="selesai" value="2500" onClick="this.form.total.value=checkChoice(this);"></td>   
                                </tr>
                                <tr>
                                    <td colspan="4" align="right">SUB Total : Rp
                                    <input id="number1" type="text" name="total" value="" readonly onkeyup="sum();">
                                    <input type=hidden name=hiddentotal value=0></td>
                                </tr>
                                <tr>
                                    <th>Perolehan</th>
                                    <td id="only-number" colspan="4">
                                        Rp.<input id="number" type="text" name="perolehan" placeholder="Tuliskan angka disini" size="18" onkeyup="sum();">
                                    </td>       
                                </tr>
                                <tr>
                                    <th>JUMLAH</th>
                                    <td id="only-number" colspan="4">
                                        Rp.<input id="number2" type="text" name="jumlah" size="18" readonly>
                                    </td>       
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <input type="submit" name="submit" class="btn btn-primary col-sm-12" value="Simpan"/>
                                    </td>
                                </tr>
                            </table>
                        </form> -->
                </div>
            </div>
        </div>
    </div>
    <div id="produk" class="products">
        <div class="container">
            <div style="text-align: center;">
                <h1 class="mb-3" style="text-align: center;">Pendapatan Pemain</h1>
                <p class="mb-5">Pendapatan akan dihitung perhari dihitung perjam dan juga tenaga bantu-bantu perispan alat dari awal dan juga akhir.</p>
            </div>
            <div class="row products_row">
                <?php foreach ($pendapatan as $value) { ?>
                    <div class="col-xl-4 col-md-6">
                        <div class="product">
                            <div class="product_content">
                                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                                    <div>
                                        <div>
                                            <div class="product_name"><a style="font-size: 15px;" href="#"><?php echo $value->nama ?></a></div>
                                            <div class="product_category"><?php echo $value->catatan ?></div>
                                            <div class="product_category"><img src="<?php echo base_url() ?>assets/images/<?php echo $value->status ?>"></div>
                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <div class="rating_r rating_r_4 home_item_rating"><?php echo $value->tgl ?></div>
                                        <div class="product_price text-right"><span>Rp</span><?php echo number_format($value->jumlah, 0, ',', '.'); ?></div>
                                    </div>
                                </div>
                                <div class="product_buttons" style="height:30px;">
                                    <div class="text-right d-flex flex-row align-items-start justify-content-start">
                                        <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                                            <a href="<?php echo base_url() ?>admin/hapus_data2/<?php echo $value->id ?>">
                                                <span class="hyperspan"></span>
                                            </a>
                                            <div class="product_name"><a style="font-size: 15px; margin: 10px; font-weight: 900;" href="<?php echo base_url() ?>admin/hapus_data2/<?php echo $value->id ?>"><span class="hyperspan"></span>HAPUS</a></div>
                                        </div>
                                        <div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
                                            <a href="<?php echo base_url() ?>admin/edit_data/<?php echo $value->id ?>">
                                                <span class="hyperspan"></span>
                                            </a>
                                            <div class="product_name"><a style="font-size: 15px; margin: 10px; font-weight: 900;" href="<?php echo base_url() ?>admin/edit_data/<?php echo $value->id ?>"><span class="hyperspan"></span>EDIT</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row page_nav_row">
                <div class="col">
                    <div class="page_nav">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>