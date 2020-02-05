<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahfb":

        if (isset($_POST['save1'])) {
          $fb = anti_injection($_POST['fb']);
          $link = anti_injection($_POST['link']);
          $save = mysqli_query($kon, "INSERT INTO fb (idfb,fb,link) VALUES ('','$fb','$link')");
          if ($save) {
            echo "<script>
                alert('Tambah Data Berhasil');
                window.location='?module=kontak/fbbawaslu';
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
            Facebook
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Facebook</li>
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
                        <label for="des" class="col-sm-2 control-label">Nama Facebook</label>
                        <div class="col-sm-8">
                          <input name="fb" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Link</label>
                        <div class="col-sm-8">
                          <input name="link" type="text" class="form-control">
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
      case "editfb":
        if (isset($_GET['idfb'])) {
          $sql = mysqli_query($kon, "SELECT * FROM fb where idfb='$_GET[idfb]'");
          $data = mysqli_fetch_assoc($sql);
        }

      ?>
        <section class="content-header">
          <h1>
            Facebook
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Facebook</li>
          </ol>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header with-border">

                </div>

                <!-- form start -->
                <form method="POST" class="form-horizontal" action="kontak/fbedit.php" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Nama Facebook</label>
                        <div class="col-sm-8">
                          <input name="idfb" type="hidden" id="des" class="form-control" value="<?= $data['idfb'] ?>">
                          <input name="fb" id="des" class="form-control" value="<?= $data['fb'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Link</label>
                        <div class="col-sm-8">

                          <input name="link" id="des" class="form-control" value="<?= $data['link'] ?>">
                          <input type="hidden" name="idfb" value=" <?= $_GET['idfb'] ?> ">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=kontak/fbbawaslu" class="btn btn-primary btn-flat">Kembali</a>
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
      case "hapusfb":

        if (isset($_GET['idfb'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM fb where idfb='$_GET[idfb]'"));

          $del = mysqli_query($kon, "DELETE FROM fb where idfb='$_GET[idfb]'");
          if ($del) {
            echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=kontak/fbbawaslu';
    				  </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=kontak/fbbawaslu';
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