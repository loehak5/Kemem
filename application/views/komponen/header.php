<!DOCTYPE html>
<html lang="en">

<head>
	<title>UKM Musik Blitar Raya</title>
	<link rel="icon" sizes="192x192" href="<?php echo base_url() ?>assets/home/img/logo.png">
	<meta charset="utf-8">

	<meta content="origin" name="referrer">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Layanan Jasa dan Penjualan Properti">
	<meta name="author" content="DjengART">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/styles/bootstrap-4.1.2/bootstrap.min.css">
	<link href="<?php echo base_url() ?>assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/styles/responsive.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">



</head>
<style>
	.thtable {
		display: block;
		overflow: scroll;
	}
</style>

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
			num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
		return ("Rp. " + num + "," + cents);
	}
</script>


<body>

	<!-- Menu -->

	<div class="menu">



		<!-- Navigation -->
		<div class="menu_nav">
			<?php
			$role_id = $this->session->userdata('role_id');
			$queryMenu = "	SELECT `user_menu`.`id`, `menu`
							FROM `user_menu` JOIN `user_access_menu`
							ON `user_menu`.`id` = `user_access_menu`.`menu_id`
							WHERE `user_access_menu`.`role_id` = '$role_id'
							ORDER BY `user_access_menu`.`menu_id` ASC
								";
			$menu = $this->db->query($queryMenu)->result_array();
			?>
			<ul>
				<li><a href="<?php echo base_url() ?>home">Home</a></li>
				<li><a data-toggle="dropdown" aria-expanded="false" href="#">Menu</a>
					<div class="dropdown-menu" role="menu">
						<a class="dropdown-item" role="presentation" href="<?php echo base_url() ?>home/keuangan">Data</a>
						<a class="dropdown-item" role="presentation" href="<?php echo base_url() ?>home/upah">Upah</a>
						<?php if ($user['role_id'] == 0) { ?>
							<a class="dropdown-item" role="presentation" href="<?php echo base_url() ?>auth">Masuk</a>
						<?php } ?>
						<?php foreach ($menu as $m) : ?>
							<?php
							$menuId = $m['id'];
							$SubMenu = $this->db->query("SELECT * FROM `user_sub_menu` JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id` WHERE `user_sub_menu`. `menu_id` = '$menuId' AND `user_sub_menu`.`is_active` = 1")->result_array();

							?>
							<?php foreach ($SubMenu as $sm) : ?>
								<a class="dropdown-item" role="presentation" href="<?php echo base_url($sm['url']); ?>"><?= $sm['n_menu']; ?></a>
							<?php endforeach; ?>
						<?php endforeach; ?>
					</div>
				</li>
			</ul>
		</div>
		<!-- Contact Info -->
		<div class="menu_contact">
			<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
				<span style="font-size: 20px;"><b><?= $user['nama']; ?></b></span>
				<div>
					<ul>
						<li>
							<?php if ($user['image'] != null) { ?>
								<a data-toggle="dropdown" aria-expanded="false" href="#"><img src="<?= base_url('assets/images/profile/') . $user['image']; ?>" style="height: 40px; border-radius: 50px;"></a>
							<?php } ?>
							<div class="dropdown-menu" role="menu">
								<a class="dropdown-item" href="<?php echo base_url() ?>auth/logout">Log Out</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="super_container">

		<!-- Header -->

		<header class="header">
			<div class="header_overlay"></div>
			<div class="header_content d-flex flex-row align-items-center justify-content-start">
				<div class="logo">
					<a href="#">
						<div class="d-flex flex-row align-items-center justify-content-start">
							<div>
								<!-- <img src="images/logo_1.png" alt=""> -->
							</div>
							<div><span>UKM Musik Blitar Raya</span></div>
						</div>
					</a>
				</div>
				<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
				<nav class="main_nav">
					<?php
					$role_id = $this->session->userdata('role_id');
					$queryMenu = "	SELECT `user_menu`.`id`, `menu`
									FROM `user_menu` JOIN `user_access_menu`
									ON `user_menu`.`id` = `user_access_menu`.`menu_id`
									WHERE `user_access_menu`.`role_id` = '$role_id'
									ORDER BY `user_access_menu`.`menu_id` ASC
								";
					$menu = $this->db->query($queryMenu)->result_array();
					?>
					<ul class="d-flex flex-row align-items-start justify-content-start">
						<li><a href="<?php echo base_url() ?>home">Home</a></li>
						<li><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Menu</a>
							<div class="dropdown-menu" role="menu">
								<a class="dropdown-item" role="presentation" href="<?php echo base_url() ?>home/keuangan">Data</a>
								<a class="dropdown-item" role="presentation" href="<?php echo base_url() ?>home/upah">Upah</a>

								<?php if ($user['role_id'] == 0) { ?>
									<a class="dropdown-item" role="presentation" href="<?php echo base_url() ?>auth">Masuk</a>
								<?php } ?>
								<?php foreach ($menu as $m) : ?>
									<?php
									$menuId = $m['id'];
									$SubMenu = $this->db->query("SELECT * FROM `user_sub_menu` JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id` WHERE `user_sub_menu`. `menu_id` = '$menuId' AND `user_sub_menu`.`is_active` = 1")->result_array();

									?>
									<?php foreach ($SubMenu as $sm) : ?>
										<a class="dropdown-item" role="presentation" href="<?php echo base_url($sm['url']); ?>"><?= $sm['n_menu']; ?></a>
									<?php endforeach; ?>
								<?php endforeach; ?>
							</div>
						</li>
					</ul>
				</nav>
				<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
					<div class="header_phone d-flex flex-row align-items-center justify-content-start">
						<span style="font-size: 20px;"><b><?= $user['nama']; ?></b></span>
						<div>
							<ul>
								<li>
									<?php if ($user['image'] != null) { ?>
										<a data-toggle="dropdown" aria-expanded="false" href="#"><img src="<?= base_url('assets/images/profile/') . $user['image']; ?>" style="height: 40px; border-radius: 50px;"></a>
									<?php } ?>
									<div class="dropdown-menu" role="menu">
										<a class="dropdown-item" href="<?php echo base_url() ?>auth/logout">Log Out</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</header>