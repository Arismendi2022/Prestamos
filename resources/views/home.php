<?php headerAdmin($data); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<div class="input-group">
						<h1><i class="fa-solid fa-triangle-exclamation"></i> <?= $data['page_title'] ?>
						</h1>
					</div>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=ROOT?>/dashboard">Inicio</a></li>
						<li class="breadcrumb-item active">404 Página de error</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	
	<!-- Main content -->
	<section class="content">
		<div class="error-page">
			<h2 class="headline text-danger"> 404</h2>
			
			<div class="error-content">
				<h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Página no encontrada.</h3>
				
				<p>
					No pudimos encontrar la página que estabas buscando.
					Mientras tanto, puedes <a href="<?=ROOT?>/dashboard">volver al dashboard</a> o intenta usar el formulario de búsqueda.
				</p>
				
				<form class="search-form">
					<div class="input-group">
						<input type="text" name="search" class="form-control" placeholder="Search">
						
						<div class="input-group-append">
							<button type="submit" name="submit" class="btn btn-danger"><i class="fas fa-search"></i>
							</button>
						</div>
					</div>
					<!-- /.input-group -->
				</form>
			</div>
			<!-- /.error-content -->
		</div>
		<!-- /.error-page -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php footerAdmin($data); ?>
