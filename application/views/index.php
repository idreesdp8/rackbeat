<?php $this->load->view('layout/meta_tags'); ?>
<title>Dashboard</title>
</head>

<body>
	<?php $this->load->view('layout/header'); ?>
	<!-- Page content -->
	<div class="page-content">
		<?php $this->load->view('layout/sidebar'); ?>
		<!-- Main content -->
		<div class="content-wrapper">
			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="<?php echo base_url(); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">Dashboard</span>
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->
			<!-- Content area -->
			<div class="content">

			</div>
			<!-- /content area -->

			<?php $this->load->view('layout/footer'); ?>