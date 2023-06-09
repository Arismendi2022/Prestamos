<?php
	headerAdmin($data);
	getModal('modalPerfil', $data);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<div class="input-group">
						<h1><i class="fa-solid fa-users"></i> <?= $data['page_title'] ?>
						</h1>
					</div>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= ROOT ?>/dashboard">Inicio</a></li>
						<li class="breadcrumb-item active">Perfil del usuario</li>
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
				<div class="col-md-3">
					<!-- Profile Image -->
					<div class="card card-primary card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle" src="<?= ROOT ?>/admin/dist/img/user.jpg" alt="User profile picture">
							</div>
							<h3 class="profile-username text-center"><?= $_SESSION['userData']['nombres'] . ' ' . $_SESSION['userData']['apellidos']; ?></h3>
							<p class="text-muted text-center">Ingeniera de Software</p>
							<ul class="list-group list-group-unbordered mb-3">
								<li class="list-group-item">
									<b>Seguidores</b> <a class="float-right">1,322</a>
								</li>
								<li class="list-group-item">
									<b>Seguidos</b> <a class="float-right">543</a>
								</li>
								<li class="list-group-item">
									<b>Amigos</b> <a class="float-right">13,287</a>
								</li>
							</ul>
							<a href="#" class="btn btn-primary btn-block"><b>Seguir</b></a>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
					
					<!-- About Me Box -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Acerca de mi</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<strong><i class="fas fa-book mr-1"></i> Educacíon</strong>
							<p class="text-muted">
								BS en Ciencias de la Computación de la Universidad de Tennessee en Knoxville
							</p>
							<hr>
							<strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicación</strong>
							<p class="text-muted">Bogotá, Colombia</p>
							<hr>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
				<div class="col-md-9">
					<div class="card card-primary card-outline">
						<div class="card-header p-2">
							<ul class="nav nav-pills" id="myTab">
								<li class="nav-item"><a class="nav-link active" href="#datosPersonales" data-toggle="tab">Datos personales</a></li>
								<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
								<li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab" role="tab">Datos fiscales</a></li>
							</ul>
						
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content">
								<!-- /.tab-pane -->
								<div class="active tab-pane" id="datosPersonales">
									<div class="content">
										<h5>DATOS PERSONALES
											<button class="btn btn-sm btn-primary ml-2" type="button" onclick="openModalPerfil();"><i class="fas fa-pencil-alt"
											                                                                                          aria-hidden="true"></i></button>
										</h5>
									</div>
									<table class="table table-bordered">
										<tbody>
										<tr>
											<td style="width:150px;"><b>Identificación:</b></td>
											<td><?= $_SESSION['userData']['identificacion']; ?></td>
										</tr>
										<tr>
											<td><b>Nombres:</b></td>
											<td><?= $_SESSION['userData']['nombres']; ?></td>
										</tr>
										<tr>
											<td><b>Apellidos:</b></td>
											<td><?= $_SESSION['userData']['apellidos']; ?></td>
										</tr>
										<tr>
											<td><b>Teléfono:</b></td>
											<td><?= $_SESSION['userData']['telefono']; ?></td>
										</tr>
										<tr>
											<td><b>Email (Usuario):</b></td>
											<td><?= $_SESSION['userData']['email_user']; ?></td>
										</tr>
										</tbody>
									</table>
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane fade" id="timeline">
									<!-- The timeline -->
									<div class="timeline timeline-inverse">
										<!-- timeline time label -->
										<div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
										</div>
										<!-- /.timeline-label -->
										<!-- timeline item -->
										<div>
											<i class="fas fa-envelope bg-primary"></i>
											
											<div class="timeline-item">
												<span class="time"><i class="far fa-clock"></i> 12:05</span>
												
												<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
												
												<div class="timeline-body">
													Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
													weebly ning heekya handango imeem plugg dopplr jibjab, movity
													jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
													quora plaxo ideeli hulu weebly balihoo...
												</div>
												<div class="timeline-footer">
													<a href="#" class="btn btn-primary btn-sm">Read more</a>
													<a href="#" class="btn btn-danger btn-sm">Delete</a>
												</div>
											</div>
										</div>
										<!-- END timeline item -->
										<!-- timeline item -->
										<div>
											<i class="fas fa-user bg-info"></i>
											
											<div class="timeline-item">
												<span class="time"><i class="far fa-clock"></i> 5 mins ago</span>
												
												<h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
												</h3>
											</div>
										</div>
										<!-- END timeline item -->
										<!-- timeline item -->
										<div>
											<i class="fas fa-comments bg-warning"></i>
											
											<div class="timeline-item">
												<span class="time"><i class="far fa-clock"></i> 27 mins ago</span>
												
												<h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
												
												<div class="timeline-body">
													Take me to your leader!
													Switzerland is small and neutral!
													We are more like Germany, ambitious and misunderstood!
												</div>
												<div class="timeline-footer">
													<a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
												</div>
											</div>
										</div>
										<!-- END timeline item -->
										<!-- timeline time label -->
										<div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
										</div>
										<!-- /.timeline-label -->
										<!-- timeline item -->
										<!-- END timeline item -->
										<div>
											<i class="far fa-clock bg-gray"></i>
										</div>
									</div>
								</div>
								
								<!-- /.tab-pane -->
								<div class="tab-pane fade" id="settings">
									<form class="form-horizontal">
										<div class="form-group row">
											<label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
											<div class="col-sm-10">
												<input type="email" class="form-control" id="inputName" placeholder="Name">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
											<div class="col-sm-10">
												<input type="email" class="form-control" id="inputEmail" placeholder="Email">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputName2" class="col-sm-2 col-form-label">Nombre</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="inputName2" placeholder="Name">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputExperience" class="col-sm-2 col-form-label">Experiencia</label>
											<div class="col-sm-10">
												<textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label for="inputSkills" class="col-sm-2 col-form-label">Habilidades</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="inputSkills" placeholder="Skills">
											</div>
										</div>
										<div class="form-group row">
											<div class="offset-sm-2 col-sm-10">
												<div class="checkbox">
													<label>
														<input type="checkbox"> Estoy de acuerdo con los <a href="#">términos y condicioness</a>
													</label>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<div class="offset-sm-2 col-sm-10">
												<button type="submit" class="btn btn-danger">Guardar</button>
											</div>
										</div>
									</form>
								</div>
								<!-- /.tab-pane -->
							</div>
							<!-- /.tab-content -->
						
						</div><!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php footerAdmin($data); ?>


