  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori Buku
        <small>Kategori Buku</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-Kategori Buku"></i> Home</a></li>
        <li class="active">Kategori Buku</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Alert -->
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>

        <button class="btn btn-danger" data-toggle="modal" data-target="#tambahData">
            <div class="fa fa-plus"></div> Tambah Kategori
        </button>

        <!-- Box -->
        <div class="box box-danger" style="margin-top: 15px">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Kategori Buku</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="example1">
                        <thead>
                            <tr>
                                <th width="5px">No</th>
                                <th>Nama Kategori</th>
                                <th>Keterangan</th>
                                <th>Gambar</th>
                                <th>Jumlah Buku</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            $no = 1;
                            foreach ($kategori as $ktg) {
                          ?>
                            <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?php echo $ktg->namaKategori ?></td>
                              <td><?php echo $ktg->keterangan ?></td>
                              <td>
                                <?php
                                  if($ktg->gambar == ''){
                                    echo '<img src="'.base_url('data/gambar/no-image.jpg').'" height="100px">';
                                  } else {
                                    echo '<img src="'.base_url('data/gambar/').$ktg->gambar.'" height="100px">';
                                  }
                                ?>
                              </td>
                              <td>
                                  <?php
                                    $jumlah = $this->db->query('SELECT id FROM tb_buku WHERE namaKategori="'.$ktg->namaKategori.'"')->num_rows();
                                    echo $jumlah . " Buku";
                                  ?>
                              </td>
                              <td>
                                <!-- Tombol Delete -->
                                <a href="<?php echo base_url('index.php/admin/kategori/delete/').$ktg->id ?>" class="btn btn-danger btn-sm tombol-yakin" data-isiData="Ingin menghapus kategori ini!">
                                  <div class="fa fa-trash"></div> Delete
                                </a>
                                <!-- Tombol Edit -->
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editData<?php echo $ktg->id; ?>">
                                  <div class="fa fa-edit"></div> Edit
                                </button>
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
          <h4 class="modal-title" id="myModalLabel"><div class="fa fa-plus"></div> Tambah Data Kategori</h4>
        </div>
        <form action="<?php echo base_url('index.php/admin/kategori/insert') ?>" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Kategori" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan" required></textarea>
            </div>
            <div class="form-group">
                <label>Gambar <font color="red">*)</font></label>
                <input type="file" class="form-control-file" name="gambar">
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

  <!-- Modal Edit Data -->
  <?php foreach ($kategori as $ktg) { ?>
    <div class="modal fade" id="editData<?php echo $ktg->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><div class="fa fa-edit"></div> Edit Data Kategori</h4>
          </div>
          <form action="<?php echo base_url('index.php/admin/kategori/update') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="hidden" name="id" value="<?php echo $ktg->id; ?>">
                  <input type="text" class="form-control" name="nama" placeholder="Nama Kategori" value="<?php echo $ktg->namaKategori; ?>" required>
              </div>
              <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" name="keterangan" required><?php echo $ktg->namaKategori; ?></textarea>
              </div>
              <div class="form-group">
                  <label>Gambar <font color="red">*)</font></label>
                  <input type="file" class="form-control-file" name="gambar" style="margin-bottom: 15px">
                  <?php
                    if($ktg->gambar == ''){
                      echo '<img src="'.base_url('data/gambar/no-image.jpg').'" height="100px">';
                    } else {
                      echo '<img src="'.base_url('data/gambar/').$ktg->gambar.'" height="100px">';
                    }
                  ?>
              </div>

              <font color="red">*) Kosongkan jika tidak ingin diubah!</font>
            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-danger"><div class="fa fa-trash"></div> Reset</button>
              <button type="submit" class="btn btn-primary"><div class="fa fa-save"></div> Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>