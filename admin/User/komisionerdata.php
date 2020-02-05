<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahkom":

        if (isset($_POST['save1'])) {

          $lokasi_file = $_FILES['fupload']['tmp_name'];
          $nama_file = $_FILES['fupload']['name'];
          if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, "../../asset/images/" . $nama_file);
          }


          $save = mysqli_query($kon, "INSERT INTO tb_komisioner(foto,dll) VALUES ('$nama_file',
	'$_POST[dll]')");
          if ($save) {
            echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=komisioner';
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
            Komisioner
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Komisioner</li>
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
                        <label for="des" class="col-sm-2 control-label">Foto</label>
                        <div class="col-sm-8">
                          <input name="fupload" id="fupload" type="file" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Deskripsi</label>
                        <div class="col-sm-8">
                          <textarea name="dll" type="text" id="editor" class="form-control"></textarea>
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
      case "editkom":
        if (isset($_GET['idkomisioner'])) {
          $sql = mysqli_query($kon, "SELECT * FROM tb_komisioner where idkomisioner='$_GET[idkomisioner]'");
          $data = mysqli_fetch_assoc($sql);
        }
        if (isset($_POST['save'])) {

          $lokasi_file = $_FILES['fupload']['tmp_name'];
          $nama_file = $_FILES['fupload']['name'];
          if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, "../../asset/images/" . $nama_file);
          } else {
            $nama_file = $_POST["fuploadlama"];
          }

          $save = mysqli_query($kon, "UPDATE tb_komisioner set 
      foto='$nama_file',
      dll='$_POST[dll]'
      where idkomisioner='$_GET[idkomisioner]'");
          if ($save) {
            echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=komisioner';
              </script>";
          } else {
            echo "<script>alert('Gagal');
              </script>";
          }
        }
      ?>
        <section class="content-header">
          <h1>
            Komisioner
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Komisioner</li>
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
                        <label for="des" class="col-sm-2 control-label">Foto</label>
                        <div class="col-sm-8">
                          <input name="fupload" id="fupload" type="file" class="form-control">
                          <input name="fuploadlama" id="fupload" type="hidden" class="form-control" value="<?= $data['foto'] ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Deskripsi</label>
                        <div class="col-sm-8">
                          <textarea name="dll" type="text" id="editor" class="form-control"><?= $data['dll'] ?></textarea>
                        </div>
                      </div>


                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=komisioner" class="btn btn-primary btn-flat">Kembali</a>
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
      case "hapuskom":

        if (isset($_GET['idkomisioner'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM tb_komisioner where idkomisioner='$_GET[idkomisioner]'"));

          $del = mysqli_query($kon, "DELETE FROM tb_komisioner where idkomisioner='$_GET[idkomisioner]'");
          if ($del) {
            echo "<script>
                  alert('Data Berhasil Dihapus');
                  window.location='index.php?module=komisioner';
                </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=komisioner';
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