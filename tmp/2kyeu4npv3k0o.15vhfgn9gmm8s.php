<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php echo $ENCODING; ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="description" content="" />
	<meta name="author" content="" />

	<title><?php echo $site; ?></title>
	<!-- BOOTSTRAP CORE STYLE  -->
	<link href="<?php echo $UI.'css/bootstrap.min.css'; ?>" rel="stylesheet" />
	<!-- FONT AWESOME ICONS  -->
	<link href="<?php echo $UI.'css/font-awesome.css'; ?>" rel="stylesheet" />
	<!-- CUSTOM STYLE  -->
	<link href="<?php echo $UI.'css/style.css'; ?>" rel="stylesheet" />
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<strong>Email: </strong>cucok@sekali.com
					&nbsp;&nbsp;
					<strong>Support: </strong>07 004 007 002
				</div>

			</div>
		</div>
	</header>
	<!-- HEADER END-->


	<div class="navbar navbar-inverse set-radius-zero">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">

					<!-- <img src="assets/img/logo.png" /> -->
				</a>

			</div>

			<div class="left-div">
				<div class="user-settings-wrapper">
					<ul class="nav">

						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
								<span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
							</a>
							<div class="dropdown-menu dropdown-settings">
								<div class="media">
									<a class="media-left" href="#">
										<!-- 	<img src="assets/img/64-64.jpg" alt="" class="img-rounded" /> -->
									</a>
									<div class="media-body">
										<h4 class="media-heading">Admin </h4>

									</div>
								</div>
								<hr />
								<h5><strong>Personal Bio : </strong></h5>
								Seorang Pemilik Toko
								<hr />
								<a href="#" class="btn btn-info btn-sm">Full Profile</a>&nbsp; <a href="<?php echo $BASE.'/logout'; ?>" class="btn btn-danger btn-sm">Logout</a>

							</div>
						</li>


					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- LOGO HEADER END-->

	<section class="menu-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="navbar-collapse collapse ">
						<ul id="menu-top" class="nav navbar-nav navbar-right">
							<li><a class="menu-top-active" 
								href="<?php echo $BASE; ?>">Dashboard</a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- MENU SECTION END-->

		<div class="content-wrapper">
			<div class="container">
				<?php echo $this->render($content,$this->mime,get_defined_vars()); ?>
			</div>
		</div>
		<!-- CONTENT-WRAPPER SECTION END-->

		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						&copy; 2015 Warung | By : CCP</a>
					</div>

				</div>
			</div>
		</footer>
		<!-- FOOTER SECTION END-->

		<!-- CORE JQUERY SCRIPTS -->
		<script src="<?php echo $UI.'js/jquery-2.1.4.js'; ?>"></script>
		<!-- BOOTSTRAP SCRIPTS  -->
		<script src="<?php echo $UI.'js/bootstrap.min.js'; ?>"></script>
		<!-- js handler -->
		<script src="<?php echo $UI.'js/itemsubmitinghandler.js'; ?>"></script>
	</body>
	</html>