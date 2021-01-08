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
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/datepicker/css/datepicker.css">
</head>

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

		<!-- Search -->
		<div class="menu_search">
			<form action="#" id="menu_search_form" class="menu_search_form">
				<input type="text" class="search_input" placeholder="Search Item" required="required">
				<button class="menu_search_button"><img src="<?php echo base_url() ?>assets/images/search.png" alt=""></button>
			</form>
		</div>
		<!-- Navigation -->
		<div class="menu_nav">
			<ul>
				<li><a href="<?php echo base_url() ?>home">Home</a></li>
				<!-- <li><a href="#">Men</a></li>
			<li><a href="#">Kids</a></li>
			<li><a href="#">Home Deco</a></li>
			<li><a href="#">Contact</a></li> -->
			</ul>
		</div>
		<!-- Contact Info -->
		<div class="menu_contact">
			<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
				<div>
					<div><img src="<?php echo base_url() ?>assets/images/phone.svg" alt="#"></div>
				</div>
				<div>+62 8570 6772 538</div>
			</div>
			<div class="menu_social">
				<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				</ul>
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
					// $role_id = $this->session->userdata('role_id');
					$menu = $this->nimda->menu();
					?>
					<ul class="d-flex flex-row align-items-start justify-content-start">
						<li class="active"><a href="<?php echo base_url() ?>home">Home</a></li>
						<li><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Menu</a>
							<div class="dropdown-menu" role="menu">
								<a class="dropdown-item" role="presentation" href="<?php echo base_url() ?>home/keuangan">Data</a>
								<a class="dropdown-item" role="presentation" href="<?php echo base_url() ?>home/upah">Upah</a>
								<?php foreach ($menu as $m) : ?>
									<?php
									$menuId = $m['id'];
									$SubMenu = $this->db->query("SELECT * FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id WHERE user_sub_menu. menu_id = $menuId AND user_sub_menu.is_active = 1")->result_array();

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
					<!-- Search -->
					<div class="header_search">
						<form action="#" id="header_search_form">
							<input type="text" class="search_input" placeholder="Search Item" required="required">
							<button class="header_search_button"><img src="<?php echo base_url() ?>assets/images/search.png" alt=""></button>
						</form>
					</div>
					<!-- User -->
					<!-- <div class="user"><a href="#"><div><img src="images/user.svg" alt="https://www.flaticon.com/authors/freepik"><div>1</div></div></a></div> -->
					<!-- Cart -->
					<!-- <div class="cart"><a href="cart.html"><div><img class="svg" src="images/cart.svg" alt="https://www.flaticon.com/authors/freepik"></div></a></div> -->
					<!-- Phone -->
					<div class="header_phone d-flex flex-row align-items-center justify-content-start">
						<div>
							<div><img src="<?php echo base_url() ?>assets/images/phone.svg" alt="#"></div>
						</div>
						<div>+62 8570 6772 538</div>
					</div>
				</div>
			</div>
		</header>