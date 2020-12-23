  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Dashboard</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $jumlahkategori; ?></h3>

               <p>Jumlah Kategori</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
             </div>
            <a href="<?php echo base_url('index.php/admin/kategori') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->