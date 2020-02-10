<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahdata":

        if (isset($_POST['save1'])) {
          $kel   = $_POST['kel'];
          $jml   = $_POST['jml'];
          $jml2   = $_POST['jml2'];
          $lk    = $_POST['lk'];
          $lk2    = $_POST['lk2'];
          $pr    = $_POST['pr'];
          $pr2    = $_POST['pr2'];

          $save = mysqli_query($kon, "INSERT INTO datapekerjaan (data_kel,
                                                                data_jml,
                                                                data_jml2,
                                                                data_lk,
                                                                data_lk2,
                                                                data_pr,
                                                                data_pr2)
                                                              VALUES
                                                              ('$kel',
                                                              '$jml',
                                                              '$jml2',
                                                              '$lk',
                                                              '$lk2',
                                                              '$pr',
                                                              '$pr2')");
          // var_dump($save);
          if ($save) {
            echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=datadesa/datapekerjaan';
            </script>";
            // exit;
          } else {
            echo "<script>alert('Gagal');
            </script>";
          }
        }
  ?>
        <section class="content-header">
          <h1>
            Data Pekerjaan
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Data</li>
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
                        <label for="des" class="col-sm-2 control-label">Kelompok</label>
                        <div class="col-sm-8">
                          <input name="kel" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah Dalam Angka</label>
                        <div class="col-sm-8">
                          <input name="jml" type="number" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah Dalam Persen</label>
                        <div class="col-sm-8">
                          <input name="jml2" type="number" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah Laki-Laki Dalam Angka</label>
                        <div class="col-sm-8">
                          <input name="lk" type="number" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah Laki-Laki Persen</label>
                        <div class="col-sm-8">
                          <input name="lk2" type="number" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah Perempuan Dalam Angka</label>
                        <div class="col-sm-8">
                          <input name="pr" type="number" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah Perempuan Persen</label>
                        <div class="col-sm-8">
                          <input name="pr2" type="number" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save1" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=datadesa/datapekerjaan" class="btn btn-primary btn-flat">Kembali</a>
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
      case "editdata":
        if (isset($_GET['data_id'])) {
          $sql = mysqli_query($kon, "SELECT * FROM datapekerjaan where data_id='$_GET[data_id]'");
          $data = mysqli_fetch_assoc($sql);
        }
        if (isset($_POST['save'])) {
          $kel   = $_POST['kel'];
          $jml   = $_POST['jml'];
          $jml2  = $_POST['jml2'];
          $lk    = $_POST['lk'];
          $lk2   = $_POST['lk2'];
          $pr    = $_POST['pr'];
          $pr2   = $_POST['pr2'];

          $save = mysqli_query($kon, "UPDATE datapekerjaan set data_kel='$kel', data_jml='$jml',data_jml2='$jml2', data_lk='$lk',data_lk2='$lk2', data_pr='$pr',data_pr2='$pr2' where data_id='$_GET[data_id]'");
          if ($save) {
            echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=datadesa/datapekerjaan';
              </script>";
          } else {
            echo "<script>alert('Gagal');
              </script>";
          }
        }
      ?>
        <section class="content-header">
          <h1>
            Data Pendidikan Ditempuh
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Data</li>
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
                        <label for="des" class="col-sm-2 control-label">Kelompok</label>
                        <div class="col-sm-8">
                          <input name="data_id" type="hidden" id="des" class="form-control" value="<?= $data['data_id'] ?>">
                          <input name="kel" type="text" id="des" class="form-control" value="<?= $data['data_kel'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah Dalam Angka</label>
                        <div class="col-sm-8">
                          <input name="jml" type="number" id="des" class="form-control" value="<?= $data['data_jml'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah Dalam Persen</label>
                        <div class="col-sm-8">
                          <input name="jml2" type="number" id="des" class="form-control" value="<?= $data['data_jml2'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah Laki Laki Dalam Angka</label>
                        <div class="col-sm-8">
                          <input name="lk" type="number" id="des" class="form-control" value="<?= $data['data_lk'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah Laki Laki Dalam Persen</label>
                        <div class="col-sm-8">
                          <input name="lk2" type="number" id="des" class="form-control" value="<?= $data['data_lk2'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah Perempuan Dalam Angka</label>
                        <div class="col-sm-8">
                          <input name="pr" type="number" id="des" class="form-control" value="<?= $data['data_pr'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah Perempuan Dalam Persen</label>
                        <div class="col-sm-8">
                          <input name="pr2" type="number" id="des" class="form-control" value="<?= $data['data_pr2'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=datadesa/datapekerjaan" class="btn btn-primary btn-flat">Kembali</a>
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
      case "hapusdata":

        if (isset($_GET['data_id'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM datapekerjaan where data_id='$_GET[data_id]'"));

          $del = mysqli_query($kon, "DELETE FROM datapekerjaan where data_id='$_GET[data_id]'");
          if ($del) {
            echo "<script>
                alert('Data Berhasil Dihapus');
    					  window.location='index.php?module=datadesa/datapekerjaan';
    				  </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=datadesa/datapekerjaan';
              </script>";
          }
        }
      ?>
  <?php
        break;
    }
  }
  ?>
</div>