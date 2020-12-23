  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori Buku
        <small>Kategori Buku</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kategori Buku</li>
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
                <div class="col-md-3">
                    <div class="box box-success">
                        <div class="box-body box-profile">
                            <?php
                              if ($buku->gambar == '') {
                                echo '<img class="profile-user-img img-responsive" src="'.base_url().'/data/gambar/no-image.jpg" alt="User profile picture">';
                              } else {
                                echo '<img class="profile-user-img img-responsive" src="'.base_url().'/data/gambar/'.$buku->gambar.'" alt="User profile picture">';
                              }
                            ?>

                            <h3 class="profile-username text-center"><?php echo $buku->namaKategori ?></h3>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                <b>Keterangan</b> <a class="pull-right"><?php echo $buku->keterangan ?></a>
                                </li>
                                <li class="list-group-item">
                                <b>Jumlah Buku</b> <a class="pull-right">
                                  <?php
                                    $jumlah = $this->db->query('SELECT id FROM tb_buku WHERE namaKategori="'.$buku->namaKategori.'"')->num_rows();
                                    echo $jumlah . " Buku";
                                  ?>
                                </a>
                                </li>
                                <li class="list-group-item">
                                <b>Dibuat Pada</b> <a class="pull-right"><?php echo date('d-M-Y H:i:s', strtotime($buku->createDate)) ?></a>
                                </li>
                            </ul>

                            <div class="pull-right">
                                  <a href="<?php echo base_url('index.php/user/buku/daftarbuku/').$buku->id ?>" class="btn btn-primary btn-sm">
                                    Selengkapnya <div class="fa fa-arrow-right"></div>
                                  </a>
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