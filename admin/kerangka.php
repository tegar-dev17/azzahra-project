    <?php include '../pages/headeradmin.php'; ?>
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h4 class="text-success">Ini adalah Settingan Website kamu sekarang!</h4>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../proses/kerangka.php"><button type="button" class="btn btn-block btn-danger">Update</button></a></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <div class="form-group">
                  <label>Title Website</label>
                  <input type="text" class="form-control" placeholder="<?= $data_rs['title']; ?>" disabled>
                </div>
                <div class="form-group">
                  <label>Jenis Departemen</label>
                  <input type="text" class="form-control" placeholder="<?= $data_rs['judul']; ?>" disabled>
                </div>
                <div class="form-group">
                  <label>Nama Departemen</label>
                  <input type="text" class="form-control" placeholder="<?= $data_rs['judul1']; ?>" disabled>
                </div>
                <div class="form-group">
                  <label>Copyright</label>
                  <input type="text" class="form-control" placeholder="<?= $data_rs['copright']; ?>" disabled>
                </div>
                <div class="card-body">
                  <textarea id="summernote" name="inputtentang">
                                            <?= $data_rs['tentang']; ?>
                    </textarea>
                </div>
                <!-- <div class="form-group">
                    <label>Tentang Departemen</label>
                    <input type="text" class="form-control" placeholder="<?= $data_rs['tentang']; ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label>Visi</label>
                    <input type="text" class="form-control" placeholder="<?= $data_rs['visi']; ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label>Misi</label>
                    <input type="text" class="form-control" placeholder="<?= $data_rs['misi']; ?>" disabled>
                  </div> -->
              </div>
              <!-- /.card-header -->
              <!-- <label>Tentang Departemen</label>
                <div class="card-body">
                  <textarea id="summernote">
                  <?= $data_rs['tentang']; ?>
              </textarea> -->

            </div>
          </div>
        </div>
      </section>
      <!-- /.col-->
    </div>
    <!-- ./row -->
    <!-- ./row -->

    <!-- /.content -->
    </div>