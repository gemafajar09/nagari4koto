<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahig":

        if (isset($_POST['save1'])) {
          $ig = anti_injection($_POST['ig']);
          $link = anti_injection($_POST['link']);
          $save = mysqli_query($kon, "INSERT INTO ig (idig,ig,link) VALUES ('','$ig','$link')");
          if ($save) {
            echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=kontak/igbawaslu';
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
            Instagram
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Instagram</li>
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
                        <label for="des" class="col-sm-2 control-label">Nama Instagram</label>
                        <div class="col-sm-8">
                          <input name="ig" type="text" class="form-control">
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
      case "edittwitter":
        if (isset($_GET['idtwitter'])) {
          $sql = mysqli_query($kon, "SELECT * FROM twitter where idtwitter='$_GET[idtwitter]'");
          $data = mysqli_fetch_assoc($sql);
        }
      ?>
        <section class="content-header">
          <h1>
            Twitter
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Twitter</li>
          </ol>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header with-border">

                </div>

                <!-- form start -->
                <form method="POST" class="form-horizontal" action="kontak/twedit.php" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Nama Twitter</label>
                        <div class="col-sm-8">
                          <input name="idtwitter" type="hidden" id="des" class="form-control" value="<?= $data['idtwitter'] ?>">
                          <input name="twitter" id="des" class="form-control" value="<?= $data['twitter'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Link</label>
                        <div class="col-sm-8">

                          <input name="link" id="des" class="form-control" value="<?= $data['link'] ?>">
                          <input type="hidden" name="idtwitter" value="<?= $_GET['idtwitter'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=kontak/twitter" class="btn btn-primary btn-flat">Kembali</a>
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
      case "hapusig":

        if (isset($_GET['idig'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM ig where idig='$_GET[idig]'"));

          $del = mysqli_query($kon, "DELETE FROM ig where idig='$_GET[idig]'");
          if ($del) {
            echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=kontak/igbawaslu';
    				  </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=kontak/igbawaslu';
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