<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahadmin":

        if (isset($_POST['save1'])) {
          $dusun   = $_POST['dusun'];
          $kepdus  = $_POST['kepdus'];
          $rt      = $_POST['rt'];
          $kk      = $_POST['kk'];
          $jiwa    = $_POST['jiwa'];
          $lk      = $_POST['lk'];
          $pr      = $_POST['pr'];

          $save = mysqli_query($kon, "INSERT INTO dataadmin (admin_nama,
                                                              admin_kepdus,
                                                              admin_rt,
                                                              admin_kk,
                                                              admin_jiwa,
                                                              admin_jekel1,
                                                              admin_jekel2)
                                                              VALUES
                                                              ('$dusun',
                                                              '$kepdus',
                                                              '$rt',
                                                              '$kk',
                                                              '$jiwa',
                                                              '$lk',
                                                              '$pr')");
          // var_dump($save);
          if ($save) {
            echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=datadesa/dataadmin';
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
            Data Wilayah Administratif
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
                        <label for="des" class="col-sm-2 control-label">Nama Dusun</label>
                        <div class="col-sm-8">
                          <input name="dusun" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Nama Kepala Dusun</label>
                        <div class="col-sm-8">
                          <input name="kepdus" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah RT</label>
                        <div class="col-sm-8">
                          <input name="rt" type="number" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah KK</label>
                        <div class="col-sm-8">
                          <input name="kk" type="number" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah Jiwa</label>
                        <div class="col-sm-8">
                          <input name="jiwa" type="number" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Laki-Laki</label>
                        <div class="col-sm-8">
                          <input name="lk" type="number" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Perempuan</label>
                        <div class="col-sm-8">
                          <input name="pr" type="number" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save1" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=datadesa/dataadmin" class="btn btn-primary btn-flat">Kembali</a>
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
        if (isset($_GET['admin_id'])) {
          $sql = mysqli_query($kon, "SELECT * FROM dataadmin where admin_id='$_GET[admin_id]'");
          $data = mysqli_fetch_assoc($sql);
        }
        if (isset($_POST['save'])) {
          $dusun   = $_POST['dusun'];
          $kepdus  = $_POST['kepdus'];
          $rt      = $_POST['rt'];
          $kk      = $_POST['kk'];
          $jiwa    = $_POST['jiwa'];
          $lk      = $_POST['lk'];
          $pr      = $_POST['pr'];


          $save = mysqli_query($kon, "UPDATE dataadmin set admin_nama='$dusun', admin_kepdus='$kepdus', admin_rt='$rt', admin_kk='$kk', admin_jiwa='$jiwa',admin_jekel1='$lk',admin_jekel2='$pr' where admin_id='$_GET[admin_id]'");
          if ($save) {
            echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=datadesa/dataadmin';
              </script>";
          } else {
            echo "<script>alert('Gagal');
              </script>";
          }
        }
      ?>
        <section class="content-header">
          <h1>
            Data Wilayah Administratif
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
                        <label for="des" class="col-sm-2 control-label">Nama Dusun</label>
                        <div class="col-sm-8">
                          <input name="admin_id" type="hidden" id="des" class="form-control" value="<?= $data['admin_id'] ?>">
                          <input name="dusun" type="text" id="des" class="form-control" value="<?= $data['admin_nama'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Nama Kepala Dusun</label>
                        <div class="col-sm-8">
                          <input name="kepdus" type="text" id="des" class="form-control" value="<?= $data['admin_kepdus'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah RT</label>
                        <div class="col-sm-8">
                          <input name="rt" type="number" id="des" class="form-control" value="<?= $data['admin_rt'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah KK</label>
                        <div class="col-sm-8">
                          <input name="kk" type="number" id="des" class="form-control" value="<?= $data['admin_kk'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Jumlah Jiwa</label>
                        <div class="col-sm-8">
                          <input name="jiwa" type="number" id="des" class="form-control" value="<?= $data['admin_jiwa'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Laki-Laki</label>
                        <div class="col-sm-8">
                          <input name="lk" type="number" id="des" class="form-control" value="<?= $data['admin_jekel1'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Perempuan</label>
                        <div class="col-sm-8">
                          <input name="pr" type="number" id="des" class="form-control" value="<?= $data['admin_jekel2'] ?>">
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=datadesa/dataadmin" class="btn btn-primary btn-flat">Kembali</a>
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

        if (isset($_GET['admin_id'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM dataadmin where admin_id='$_GET[admin_id]'"));

          $del = mysqli_query($kon, "DELETE FROM dataadmin where admin_id='$_GET[admin_id]'");
          if ($del) {
            echo "<script>
                alert('Data Berhasil Dihapus');
    					  window.location='index.php?module=datadesa/dataadmin';
    				  </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=datadesa/dataadmin';
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