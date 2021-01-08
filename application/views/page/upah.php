
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
					<?php foreach ($pemasukan->result_array() as $key => $value){ ?>
						<?php echo number_format($value['jml_pemasukan'], 0, ',', '.'); ?>
					<?php } ?>
				</div>
                <div class="text-right uangku"><span>Rp</span>
					<?php foreach ($pengeluaran->result_array() as $key => $value){ ?>
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
                      $arto = number_format($dwet,0,",",".");
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
      <div style="text-align: center;">
          <h1 class="mb-3" style="align: center;">Pendapatan Pemain</h1>
          <p class="mb-5">Pendapatan akan dihitung perhari dihitung perjam dan juga tenaga bantu-bantu perispan alat dari awal dan juga akhir.</p>
      </div>
				<div class="row products_row">
					<!-- Product -->
					<?php foreach ($pendapatan as $value){ ?>
					<div class="col-xl-4 col-md-6">
						<div class="product">
							<div class="product_content">
								<div class="product_info d-flex flex-row align-items-start justify-content-start">
									<div>
										<div>
											<div class="product_name"><a style="font-size: 15px;" href="#"><?php echo $value->nama ?></a></div>
                      <div class="product_category"><a style="font-size: 15px;" href="#"><?php echo $value->catatan ?></a></div>
											<div class="product_category"><img src="<?php echo base_url()?>assets/images/<?php echo $value->status ?>"></div>
										</div>
									</div>
									<div class="ml-auto text-right">
										<div class="rating_r rating_r_4 home_item_rating"><?php echo $value->tgl ?></div>
										<div class="product_price text-right" style="font-size 18px"><span>Rp</span><?php echo number_format($value->jumlah, 0, ',', '.'); ?></div>
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
				<div class="row load_more_row">
          
				</div>
		   </div>
		</div>

        

            

            
		

