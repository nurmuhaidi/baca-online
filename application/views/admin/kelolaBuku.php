  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kelola Buku
        <small>Kelola Buku</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kelola Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Alert -->
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>

        <!-- Tombol Tambah -->
        <button class="btn btn-danger" data-toggle="modal" data-target="#tambahData">
            <div class="fa fa-plus"></div> Tambah Buku
        </button>

        <!-- Box Data -->
        <div class="box box-danger" style="margin-top: 15px">
          <div class="box-header with-border">
            <h3 class="box-title">Daftar Buku</h3>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="example1">
                <thead>
                  <tr>
                    <th width="15px">No</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>Link</th>
                    <th>File</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($buku as $bk) {
                  ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $bk->namaKategori; ?></td>
                      <td><?php echo $bk->judul; ?></td>
                      <td><?php echo $bk->keterangan; ?></td>
                      <td><?php echo $bk->link; ?></td>
                      <td><?php echo $bk->file; ?></td>
                      <td>
                        <!-- Tombol Delete -->
                        <a href="" class="btn btn-danger btn-sm">
                          <div class="fa fa-trash"></div> Delete
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal Tambah Data -->
  <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><div class="fa fa-plus"></div> Tambah Data Buku</h4>
        </div>
        <form action="<?php echo base_url('index.php/admin/kelola/insert') ?>" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" class="form-control" name="judul" placeholder="Judul Buku" required>
            </div>
            <div class="form-group">
                <label>Kategori Buku</label>
                <select name="kategori" class="form-control" required>
                  <option value=""> -- Pilih Kategori -- </option>
                  <?php
                    foreach ($kategori as $ktg) {
                      echo "<option value='".$ktg->$namaKategori."'>'".$ktg->$namaKategori."'</option>";
                    }
                  ?>
                </select>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan" required></textarea>
            </div>
            <div class="form-group">
                <label>Link Buku <font color="red">*)</font></label>
                <input type="text" class="form-control" name="link" placeholder="Judul Buku" required>
            </div>
            <div class="form-group">
                <label>File <font color="red">*)</font></label>
                <input type="file" class="form-control-file" name="file">
            </div>

            <font color="red">*) Tidak wajib diisi</font>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
            <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>