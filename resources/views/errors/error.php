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
            <h1><i class="fa-solid fa-circle-exclamation"></i> <?= $data['page_title'] ?>
            </h1>
          </div>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= ROOT ?>/dashboard">Inicio</a></li>
            <li class="breadcrumb-item active">Error 404</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  
  <!-- Main content -->
  <div class="content">
    <div class="container text-center">
      <main class="app-content">
        <div class="page-error tile">
          <h1><i class="fa fa-exclamation-circle"></i> Error 404: Página no encontrada.</h1>
          <p>No se encuentra la página que ha solicitado.</p>
          <p><a class="btn btn-primary" href="javascript:window.history.back();">Regresar</a></p>
        </div>
      </main>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php footerAdmin($data); ?>
