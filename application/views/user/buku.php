  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Buku
        <small>Daftar Buku</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Daftar Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Sweet Alert -->
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>

        <!-- Daftar Buku -->
        <div class="row" style="margin-top:10px">
            <?php
                foreach ($daftarbuku as $buku) {
            ?>
                <div class="col-md-3 col-xs-6">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets') ?>/dist/img/avatar4.png" alt="User profile picture">

                            <h3 class="profile-username text-center"><?php echo $buku->namaKategori ?></h3>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                <b>Keterangan</b> <a class="pull-right"><?php echo $buku->keterangan ?></a>
                                </li>
                                <li class="list-group-item">
                                <b>Dibuat Pada</b> <a class="pull-right"><?php echo date('d-M-Y H:i:s', strtotime($buku->createDate)) ?></a>
                                </li>
                            </ul>

                            <div class="pull-right">
                                <?php if($buku->id == $this->session->userdata('id')){ ?>
                                  <a href="<?php echo base_url('index.php/admin/profile') ?>" class="btn btn-primary btn-sm">
                                    <div class="fa fa-user"></div> Profile
                                  </a>
                                <?php } else { ?>
                                  <a href="<?php echo base_url('index.php/admin/manajemen_user/delete/').$buku->id ?>" class="btn btn-primary btn-sm">
                                    <div class="fa fa-arrow-right"></div> Selengkapnya
                                  </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->