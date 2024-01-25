        <?php include '../pages/headeradmin.php'; ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4 class="text-success">Ini adalah Settingan Website kamu sekarang!</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../proses/misi.php"><button type="button" class="btn btn-block btn-danger">Update</button></a></li>
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
                                <div class="card-body">
                                    <textarea id="summernote" name="inputmisi">
                                            <?= $data_rs['misi']; ?>
                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- ./row -->
                <!-- ./row -->
            </section>
            <!-- /.content -->
        </div>
        </div>