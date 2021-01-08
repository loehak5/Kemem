<div class="super_container_inner">
  <div class="super_overlay"></div>

  <div style="padding-top: 80px;">
    <div class="container">
      <div class="product">
        <div class="product_content">
          <div class="product_info d-flex flex-row align-items-start justify-content-start">
            <?php echo form_open_multipart('admin/proses_tambah') ?>
            <div>
              <p style="text-align: center; font-size:20px;"><b>Tambah Data Keuangan</b> </p>
            </div>
            <div class="form-group row">
              <label style="padding-right:30px; padding-left:15px;">Keterangan</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="ket" placeholder="Catatan" size="20" required="" oninvalid="this.setCustomValidity('Keterangan harus di isi')">
              </div>
            </div>
            <div class="form-group row">
              <label style="padding-right:30px; padding-left:15px;">Tanggal</label>
              <div class="col-sm-10">
                <input class="form-control" type="text" name="tgl" placeholder="TTTT-BB-HH" required="" oninvalid="this.setCustomValidity('Tanggal harus di isi')">
              </div>
            </div>
            <div class="form-group row">
              <label style="padding-right:30px; padding-left:15px;">Nominal (Rp.)</label>
              <div class="col-sm-10" id="only-number">
                <input class="form-control" id="number" type="text" name="nominal" placeholder="Tuliskan angka disini" size="15">
              </div>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <legend style="font-size:14px;padding-right:30px; padding-left:15px;">Status</legend>
                <div class="col-sm-10">
                  <select class="form-control" name="status" required="" oninvalid="this.setCustomValidity('Mohon di isi dan tentukan pilihan')">
                    <option value="">- Pilih Status -</option>
                    <option value="pemasukan.svg">Pemasukan</option>
                    <option value="pengeluaran.svg">Pengeluaran</option>
                  </select>
                </div>
              </div>
            </fieldset>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
            <?php echo form_close() ?>
            <!-- 
                    <table class="table">
                        <thead >
                            <tr>
                                <th colspan="2">Tambah Data Keuangan</th>
                            </tr>
                        </thead>
                        <tr>
                            <th>Keterangan</th>
                            <td>
                                <input type="text" name="ket" placeholder="Catatan" size="20" required="" oninvalid="this.setCustomValidity('Keterangan harus di isi')">
                            </td>       
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>
                                <input type="text" name="tgl" placeholder="TTTT-BB-HH" required="" oninvalid="this.setCustomValidity('Tanggal harus di isi')">
                            </td>        
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <select name="status" required="" oninvalid="this.setCustomValidity('Mohon di isi dan tentukan pilihan')">
                                    <option value="">- Pilih Status -</option>
                                    <option value="pemasukan.svg">Pemasukan</option>
                                    <option value="pengeluaran.svg">Pengeluaran</option>
                                </select>
                            </td>       
                        </tr>
                        <tr>
                            <th>Nominal</th>
                            <td id="only-number">
                                Rp.<input id="number" type="text" name="nominal" placeholder="Tuliskan angka disini" size="15" >
                            </td>       
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" class="btn btn-primary col-sm-12" value="Simpan"/>
                            </td>
                        </tr>
                    </table>
                 -->
          </div>
        </div>
      </div>
    </div>
  </div>

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
      <div class="col-xl-4 col-md-6">

      </div>
      <div class="row products_row">


        <!-- Product -->
        <?php foreach ($keuangan as $value) { ?>
          <div class="col-xl-4 col-md-6">
            <div class="product">
              <div class="product_content">
                <div class="product_info d-flex flex-row align-items-start justify-content-start">
                  <div>
                    <div>
                      <div class="product_name"><a style="font-size: 15px;" href="#"><?php echo $value->ket ?></a></div>
                      <div class="product_category"><img src="<?php echo base_url() ?>assets/images/<?php echo $value->status ?>"></div>
                    </div>
                  </div>
                  <div class="ml-auto text-right">
                    <div class="rating_r rating_r_4 home_item_rating"><?php echo $value->tgl ?></div>
                    <div class="product_price text-right"><span>Rp</span><?php echo number_format($value->nominal, 0, ',', '.'); ?></div>
                  </div>
                </div>
                <div class="product_buttons" style="height:30px;">
                  <div class="text-right d-flex flex-row align-items-start justify-content-start">
                    <div class="product_button product_fav text-center d-flex flex-column align-items-center justify-content-center">
                      <a href="<?php echo base_url() ?>data/hapus_data/<?php echo $value->id ?>">
                        <span class="hyperspan"></span>
                      </a>
                      <div class="product_name"><a style="font-size: 15px; margin: 10px; font-weight: 900;" href="<?php echo base_url() ?>admin/hapus_data/<?php echo $value->id ?>"><span class="hyperspan"></span>HAPUS</a></div>
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