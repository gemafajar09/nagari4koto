<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahgaleri":

        if (isset($_POST['save1'])) {

          $lokasi_file = $_FILES['fupload']['tmp_name'];
          $nama_file = $_FILES['fupload']['name'];
          if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, "../../asset/images/" . $nama_file);
          }


          $save = mysqli_query($kon, "INSERT INTO tb_galeri(idalbum,foto) VALUES ('$_POST[idalbum]','$nama_file')");
          if ($save) {
            echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=galeri/galeribawaslu';
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
            Galeri
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Galeri</li>
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
                        <label for="des" class="col-sm-2 control-label">Album</label>
                        <div class="col-sm-8">
                          <select name="idalbum" class="form-control">
                            <option value="">--Pilih--</option>
                            <?php
                            include 'koneksi.php';
                            $kp = mysqli_query($kon, "SELECT * FROM tb_album");
                            while ($data2 = mysqli_fetch_array($kp)) {
                              echo "<option value='$data2[idalbum]'>$data2[judulalbum]</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Foto</label>
                        <div class="col-sm-8">
                          <input name="fupload" id="fupload" type="file" class="form-control">
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
      case "editgaleri":
        if (isset($_GET['idgaleri'])) {
          $sql = mysqli_query($kon, "SELECT * FROM tb_galeri where idgaleri='$_GET[idgaleri]'");
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

          $save = mysqli_query($kon, "UPDATE tb_galeri set idalbum='$_POST[idalbum]',foto='$nama_file' where idgaleri='$_GET[idgaleri]'");
          if ($save) {
            echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=galeri/galeribawaslu';
              </script>";
          } else {
            echo "<script>alert('Gagal');
              </script>";
          }
        }
      ?>
        <section class="content-header">
          <h1>
            Album
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Album</li>
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
                        <label for="des" class="col-sm-2 control-label">Album</label>
                        <div class="col-sm-8">
                          <select name="idalbum" class="form-control">
                            <option value="">--Pilih--</option>
                            <?php
                            $kp = mysqli_query($kon, "SELECT * FROM tb_album");
                            while ($ee = mysqli_fetch_array($kp)) {
                              if ($ee["idalbum"] == $data["idalbum"]) {
                                $cek = "selected";
                              } else {
                                $cek = "";
                              }
                              echo "<option value='$ee[idalbum]' $cek>$ee[judulalbum]</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Foto</label>
                        <div class="col-sm-8">
                          <input name="fupload" id="fupload" type="file" class="form-control">
                          <input name="fuploadlama" id="fupload" type="hidden" class="form-control" value="<?= $data['foto'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=galeri/galeribawaslu" class="btn btn-primary btn-flat">Kembali</a>
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
      case "hapusgaleri":

        if (isset($_GET['idgaleri'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM tb_galeri where idgaleri='$_GET[idgaleri]'"));

          $del = mysqli_query($kon, "DELETE FROM tb_galeri where idgaleri='$_GET[idgaleri]'");
          if ($del) {
            echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=galeri/galeribawaslu';
    				  </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=galeri/galeribawaslu';
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