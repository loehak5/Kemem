<div class="super_container_inner">
  <div class="super_overlay"></div>

  <div style="padding-top: 80px;">
    <div class="container">
      <div class="product">
        <div class="product_content">
          <div class="product_info d-flex flex-row align-items-start justify-content-start">
            <?php foreach ($editdata as $value) { ?>
              <form action="<?php echo base_url() ?>data/update_data" method="post">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2">Edit Data Keuangan</th>
                    </tr>
                  </thead>
                  <tr>
                    <th>Keterangan</th>
                    <td>
                      <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                      <input type="text" name="ket" size="20" value="<?php echo $value['ket']; ?>" required="" oninvalid="this.setCustomValidity('Keterangan harus di isi')">
                    </td>
                  </tr>
                  <tr>
                    <th>Tanggal</th>
                    <td>
                      <input type="text" name="tgl" placeholder="TTTT-BB-HH" value="<?php echo $value['tgl']; ?>" required="" oninvalid="this.setCustomValidity('Tanggal harus di isi')">
                    </td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td>
                      <?php
                      $a = "pemasukan.svg";
                      $b = "pengeluaran.svg";
                      $masuk = ($value['status'] == $a) ? "selected" : "";
                      $keluar = ($value['status'] == $b) ? "selected" : "";
                      ?>
                      <select name="status" id="STATUS">
                        <option value="<?php echo $a; ?>" <?php echo $masuk; ?>> Pemasukan </option>
                        <option value="<?php echo $b; ?>" <?php echo $keluar; ?>> Pengeluaran </option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <th>Nominal</th>
                    <td id="only-number">
                      Rp.<input id="number" type="text" name="nominal" placeholder="Tuliskan angka disini" value="<?php echo $value['nominal']; ?>" size="15">
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>
                      <input type="submit" name="submit" class="btn btn-primary col-sm-12" value="Simpan" />
                    </td>
                  </tr>
                </table>
              </form>
            <?php } ?>
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


  <div class="products">
    <div class="container">
      <div class="row load_more_row">
        <div class="col">
          <div class="button load_more ml-auto mr-auto"><a href="<?php echo base_url() ?>admin">Back</a></div>
        </div>
      </div>
    </div>
  </div>