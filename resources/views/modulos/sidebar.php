<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="" class="brand-link">
		<img src="<?=ROOT?>/admin/dist/img/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-dark">Mi-Banco</span>
	</a>
	
	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?=ROOT?>/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="" class="d-block">Arismendi Güiza</a>
				<a href="" class="d-block"><small>Administrador</small></a>
			</div>
		</div>
		
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?=ROOT?>/dashboard" class="nav-link active">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=ROOT?>/clientes" class="nav-link">
						<i class="nav-icon fa-solid fa-users"></i>
						<p>
							Clientes
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-sack-dollar"></i>
						<p>
							Préstamos
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=ROOT?>/pagos" class="nav-link">
						<i class="nav-icon fas fa-hand-holding-usd"></i>
						<p>
							Pagos
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fa-solid fa-user-gear"></i>
						<p>
							Configuración
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?=ROOT?>/usuarios" class="nav-link active">
								<i class="far fa-circle nav-icon"></i>
								<p>Usuarios</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?=ROOT?>/roles" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Roles</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fa-solid fa-chart-line"></i>
						<p>
							Reportes
							<span class="right badge badge-primary">New</span>
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fa-solid fa-scale-balanced"></i>
						<p>
							Contabilidad
							<span class="right badge badge-danger">New</span>
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							Cerrar Sesión
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
