<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahJadwal":

        if (isset($_POST['save'])) {
          $tglskrg = date('Y-m-d');
          $idpegawai = $_SESSION['id_client'];

          $save = mysqli_query($con, "INSERT INTO tbl_jadwal VALUES('', '$_POST[awal]','$_POST[akhir]','$tglskrg','$_POST[keterangan]','$idpegawai')");

          if ($save) {
            echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=informasi/jadwal';
            </script>";
            exit;
          } else {
            echo "<script>alert('Gagal');
            </script>";
          }
        }
  ?>
        <section class="content-header">
          <h1>
            Jadwal
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Jadwal</li>
          </ol>
        </section>
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header with-border">

                </div>
                <!-- form start -->
                <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="kdp" class="col-sm-2 control-label">Jam Awal</label>
                        <div class="col-sm-2">
                          <input type="time" name="awal" id="kdp" class="form-control">
                        </div>

                        <label for="des" class="col-sm-1 control-label">Akhir</label>
                        <div class="col-sm-2">
                          <input type="time" name="akhir" id="kdp" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="nohp" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-8">
                          <textarea name="keterangan" id="des" class="form-control textarea" rows="8" cols="80"></textarea>
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                        </div>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      <?php
        break;
      case "editJadwal":
        if (isset($_GET['id'])) {
          $sql = mysqli_query($con, "SELECT * FROM tbl_jadwal where idjadwal='$_GET[id]'");
          $data = mysqli_fetch_assoc($sql);
        }
        if (isset($_POST['save'])) {

          $save = mysqli_query($con, "UPDATE tbl_jadwal set jadwal_awal='$_POST[awal]', jadwal_akhir='$_POST[akhir]', keterangan='$_POST[keterangan]' where idjadwal='$_GET[id]'");
          if ($save) {
            echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=informasi/jadwal';
              </script>";
          } else {
            echo "<script>alert('Gagal');
              </script>";
          }
        }
      ?>
        <section class="content-header">
          <h1>
            Jadwal
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit jadwal</li>
          </ol>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header with-border">

                </div>

                <!-- form start -->
                <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="kdp" class="col-sm-2 control-label">Jam Awal</label>
                        <div class="col-sm-2">
                          <input type="text" name="awal" id="kdp" class="form-control" value="<?= $data['jadwal_awal'] ?>">
                        </div>

                        <label for="des" class="col-sm-1 control-label">Akhir</label>
                        <div class="col-sm-2">
                          <input type="text" name="akhir" id="kdp" class="form-control" value="<?= $data['jadwal_akhir'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="nohp" class="col-sm-2 control-label">Keterangan</label>
                        <div class="col-sm-8">
                          <textarea name="keterangan" id="des" class="form-control textarea" rows="8" cols="80"><?= $data['keterangan'] ?></textarea>
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                        </div>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      <?php
        break;
      case "hapusJadwal":

        if (isset($_GET['id'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_jadwal where idjadwal='$_GET[id]'"));

          $del = mysqli_query($con, "DELETE FROM tbl_jadwal where idjadwal='$_GET[id]'");
          if ($del) {
            echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=informasi/jadwal';
    				  </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=informasi/jadwal';
              </script>";
          }
        }
      ?>
    <?php
        break;
    }
  } else {
    ?>

    <section class="content-header">
      <h1>
        Jadwal
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jadwal</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <a href="?module=informasi/jadwal&aksi=tambahJadwal" class="btn btn-flat btn-primary">Tambah Jadwal</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th rowspan="2">No</th>
                      <th colspan="2" style="text-align: center;">Jadwal</th>
                      <th rowspan="2">Tanggal</th>
                      <th rowspan="2">Keterangan</th>
                      <th rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                      <th style="text-align: center;">Awal</th>
                      <th style="text-align: center;">Akhir</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $be = mysqli_query($con, "SELECT * FROM tbl_jadwal where idpengacara='$_SESSION[id_client]' order by idjadwal desc");
                    $no = 1;
                    while ($r = mysqli_fetch_assoc($be)) {
                    ?>

                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $r["jadwal_awal"]; ?></td>
                        <td><?= $r["jadwal_akhir"]; ?></td>
                        <td><?= tgl_indo($r["tgl_jadwal"]); ?></td>
                        <td><?= $r["keterangan"]; ?></td>

                        <td><a href="?module=informasi/jadwal&aksi=editJadwal&id=<?= $r['idjadwal']; ?>" class="btn btn-info btn-xs">Edit</a>
                          <a href="?module=informasi/jadwal&aksi=hapusJadwal&id=<?= $r['idjadwal']; ?>" class="btn btn-info btn-xs">Hapus</a>
                        </td>
                      </tr>
                    <?php $no++;
                    } ?>
                    </tfoot>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <!-- /.box -->
    </section>
  <?php } ?>

</div>