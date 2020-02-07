<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahtautan":

        if (isset($_POST['save1'])) {

          $lokasi_file = $_FILES['fupload']['tmp_name'];
          $nama_file = $_FILES['fupload']['name'];
          if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, "../../asset/images" . $nama_file);
          }

          $save = mysqli_query($kon, "INSERT INTO tb_tautan (judul,link,gambar) VALUES ('$_POST[judul]','$_POST[link]','$nama_file')");
          if ($save) {
            echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=tautan/tautan';
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
            Tautan
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Tautan</li>
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
                        <label for="des" class="col-sm-2 control-label">Tautan</label>
                        <div class="col-sm-8">
                          <input name="judul" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Link</label>
                        <div class="col-sm-8">
                          <input name="link" type="text" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Logo</label>
                        <div class="col-sm-8">
                          <input name="fupload" id="fupload" type="file" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save1" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=tautan/tautan" class="btn btn-primary btn-flat">Kembali</a>
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
      case "edittautan":
        if (isset($_GET['idtautan'])) {
          $sql = mysqli_query($kon, "SELECT * FROM tb_tautan where idtautan='$_GET[idtautan]'");
          $data = mysqli_fetch_assoc($sql);
        }
        if (isset($_POST['save'])) {

          $lokasi_file = $_FILES['fupload']['tmp_name'];
          $nama_file = $_FILES['fupload']['name'];
          if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, "../../asset/images" . $nama_file);
          } else {
            $nama_file = $_POST["fuploadlama"];
          }

          $save = mysqli_query($kon, "UPDATE tb_tautan set judul='$_POST[judul]', link='$_POST[link]', gambar='$nama_file' where idtautan='$_GET[idtautan]'");
          if ($save) {
            echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=tautan/tautan';
              </script>";
          } else {
            echo "<script>alert('Gagal');
              </script>";
          }
        }
      ?>
        <section class="content-header">
          <h1>
            Tautan
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Tautan</li>
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
                        <label for="des" class="col-sm-2 control-label">Tautan</label>
                        <div class="col-sm-8">
                          <input name="idtautan" type="hidden" id="des" class="form-control" value="<?= $data['idtautan'] ?>">
                          <input name="judul" id="des" class="form-control" value="<?= $data['judul'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Link</label>
                        <div class="col-sm-8">

                          <input name="link" id="des" class="form-control" value="<?= $data['link'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Logo</label>
                        <div class="col-sm-8">
                          <input name="fupload" id="fupload" type="file" class="form-control">
                          <input name="fuploadlama" id="fupload" type="hidden" class="form-control" value="<?= $data['gambar'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=tautan/tautan" class="btn btn-primary btn-flat">Kembali</a>
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
      case "hapustautan":

        if (isset($_GET['idtautan'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM tb_tautan where idtautan='$_GET[idtautan]'"));

          $del = mysqli_query($kon, "DELETE FROM tb_tautan where idtautan='$_GET[idtautan]'");
          if ($del) {
            echo "<script>
                  alert('Data Berhasil Dihapus');
                  window.location='index.php?module=tautan/tautan';
                  </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=tautan/tautan';
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