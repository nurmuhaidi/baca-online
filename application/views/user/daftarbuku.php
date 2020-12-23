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
        <div class="box box-success">
          <div class="box-header with-border">
            <?php
              foreach ($daftarkategori as $dfrktg) {
                
              }
            ?>
            <h3 class="box-title">Ketegori Buku : <font color="red"><?php echo $dfrktg->namaKategori ?></font></h3>
            <a href="<?php echo base_url('index.php/user/buku') ?>" class="btn btn-danger btn-sm pull-right">
              <div class="fa fa-arrow-left"></div> Back
            </a>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered table-sm" id="example1">
                <thead>
                  <tr>
                    <th width="15px">No.</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>Link</th>
                    <th>File</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no =1;
                    foreach ($daftarkategori as $kategori) {
                      $daftar_buku = $this->db->query("SELECT * FROM tb_buku WHERE namaKategori = '".$kategori->namaKategori."' ")->result();
                      foreach ($daftar_buku as $buku) {
                ?>
                  <tr>
                    <td><?= $no++; ?>.</td>
                    <td><?= $buku->namaKategori; ?></td>
                    <td><?= $buku->judul; ?></td>
                    <td><?= $buku->keterangan; ?></td>
                    <td>
                        <?php
                          if($buku->link != ''){
                        ?>
                          <a href="<?php echo $buku->link ?>" class="btn btn-warning btn-sm" target="blank">
                            <div class="fa fa-upload"></div> Kunjungi
                          </a>
                        <?php } ?>
                    </td>
                    <td>
                      <?php
                        if($buku->file != ''){
                      ?>
                        <a href="<?= base_url('data/dokumen/'.$buku->file) ?>" class="btn btn-primary btn-sm" download>
                          <i class="fa fa-download"></i> Download
                        </a>
                        <a href="<?= base_url('index.php/user/buku/baca/'.$buku->id) ?>" class="btn btn-success btn-sm">
                          <i class="fa fa-book"></i> Baca
                        </a>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php } } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->