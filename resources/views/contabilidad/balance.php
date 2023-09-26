<?php
	headerAdmin($data);
?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<div class="input-group">
							<h1><i class="fa-solid fa-scale-unbalanced-flip"></i> <?= $data['page_title'] ?>
								<?php if ($_SESSION['permisosMod']['w']) { ?>
									<button class="btn btn-primary ml-2" type="button" onclick="openModal();"><i class="fa-solid fa-circle-plus"></i> Nuevo</button>
								<?php } ?>
							</h1>
						</div>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?= ROOT ?>/dashboard">Inicio</a></li>
							<li class="breadcrumb-item active">Flujo de caja</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->
		
		<!-- Main content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
				
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

<?php footerAdmin($data); ?>