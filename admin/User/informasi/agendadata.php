<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahagenda":

        if (isset($_POST['save1'])) {
          $save = mysqli_query($kon, "INSERT INTO tb_agenda (judul,tempat,tgl,waktu) VALUES ('$_POST[judul]','$_POST[tempat]','$_POST[tgl]','$_POST[waktu]')");
          if ($save) {
            echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=informasi/agenda';
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
            Agenda
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Agenda</li>
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
                        <label for="des" class="col-sm-2 control-label">Judul</label>
                        <div class="col-sm-8">
                          <input name="judul" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Tanggal</label>
                        <div class="col-sm-8">
                          <input name="tgl" type="date" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Waktu</label>
                        <div class="col-sm-8">
                          <input name="waktu" type="time" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Tempat</label>
                        <div class="col-sm-8">
                          <input name="tempat" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save1" class="btn btn-primary btn-flat">Simpan</button>
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
      case "editagenda":
        if (isset($_GET['idagenda'])) {
          $sql = mysqli_query($kon, "SELECT * FROM tb_agenda where idagenda='$_GET[idagenda]'");
          $data = mysqli_fetch_assoc($sql);
        }
        if (isset($_POST['save'])) {

          $save = mysqli_query($kon, "UPDATE tb_agenda set judul='$_POST[judul]', tgl='$_POST[tgl]', waktu='$_POST[waktu]', tempat='$_POST[tempat]' where idagenda='$_GET[idagenda]'");
          if ($save) {
            echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=informasi/agenda';
              </script>";
          } else {
            echo "<script>alert('Gagal');
              </script>";
          }
        }
      ?>
        <section class="content-header">
          <h1>
            Agenda
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Agenda</li>
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
                        <label for="des" class="col-sm-2 control-label">Judul</label>
                        <div class="col-sm-8">
                          <input name="idagenda" type="hidden" id="des" class="form-control" value="<?= $data['idagenda'] ?>">
                          <input name="judul" id="des" class="form-control" value="<?= $data['judul'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Tanggal</label>
                        <div class="col-sm-8">

                          <input name="tgl" type="tgl" id="des" class="form-control" value="<?= $data['tgl'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Waktu</label>
                        <div class="col-sm-8">

                          <input name="waktu" type="time" id="des" class="form-control" value="<?= $data['waktu'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Tempat</label>
                        <div class="col-sm-8">

                          <input name="tempat" id="des" class="form-control" value="<?= $data['tempat'] ?>">
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=informasi/agenda" class="btn btn-primary btn-flat">Kembali</a>
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
      case "hapusagenda":

        if (isset($_GET['idagenda'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM tb_agenda where idagenda='$_GET[idagenda]'"));

          $del = mysqli_query($kon, "DELETE FROM tb_agenda where idagenda='$_GET[idagenda]'");
          if ($del) {
            echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=informasi/agenda';
    				  </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=informasi/agenda';
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