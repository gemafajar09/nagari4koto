<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "editlogo":

        if (isset($_GET['id'])) {
          $sql = mysqli_query($kon, "SELECT * FROM logo where id_logo='$_GET[id]'");
          $data = mysqli_fetch_assoc($sql);
        }
        if (isset($_POST['save'])) {
          $nmberkas  = $_FILES['foto']["name"];
          $lokberkas = $_FILES["foto"]["tmp_name"];
          $nmfoto = date("YmdHis") . $nmberkas;
          $valid    = array('jpg', 'png', 'gif', 'jpeg');



          if (!empty($lokberkas)) {
            list($txt, $ext) = explode(".", $nmfoto);
            if (in_array($ext, $valid)) {
              move_uploaded_file($lokberkas, "../../asset/images/" . $nmfoto);
              $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM logo where id_logo='$_GET[id]'"));

              unlink("../../asset/images/" . $lihat['img_logo']);


              $save = mysqli_query($kon, "UPDATE logo set kategori='$_POST[kategori]', img_logo='$nmfoto' where id_logo='$_GET[id]'");

              // echo $lokberkas;
              // exit;
              if ($save) {
                echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=logo';
              </script>";
              } else {
                echo "<script>alert('Gagal');
              </script>";
              }
            } else {
              echo "<script>
                alert('Format Foto Tidak Mendukung, Upload Foto Dengan Format png/jpg/gif/jpeg');
                  </script>";
            }
          }
        }

  ?>
        <section class="content-header">
          <h1>
            Logo
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Logo</li>
          </ol>
        </section>

        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-info">
                <div class="box-header with-border">

                </div>

                <!-- form start -->
                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  <div class="box-body ">
                    <div class="form-group">
                      <label for="foto" class="col-sm-2 control-label">Kategori</label>
                      <div class="col-sm-4	">
                        <select name="kategori" class="form-control">
                          <?php if ($data['kategori'] == 'HITAM') { ?>
                            <option value="HITAM" selected>HITAM</option>
                            <option value="PUTIH">PUTIH</option>
                          <?php } elseif ($data['kategori'] == 'PUTIH') { ?>
                            <option value="HITAM">HITAM</option>
                            <option value="PUTIH" selected>PUTIH</option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>



                    <div class="form-group">
                      <label for="foto" class="col-sm-2 control-label">Foto</label>
                      <div class="col-sm-4">
                        <input type="file" name="foto" id="foto" class="form-control">
                        <input type="hidden" name="fotolama" class="form-control" value="<?= $data['img_logo']; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="gam" class="col-sm-2 control-label">&nbsp;</label>

                      <div class="col-sm-4">
                        <img src="../../asset/images/<?= $data['img_logo']; ?>" style="width:250px;">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-4 col-md-offset-2">
                        <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                        <a href="?module=logo" class="btn btn-primary btn-flat">Kembali</a>
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
    }
  } else {
    ?>

    <section class="content-header">
      <h1>
        Logo
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Logo</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">

            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kategori</th>
                      <th>Logo</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $be = mysqli_query($kon, "SELECT * FROM logo");
                    $no = 1;
                    while ($r = mysqli_fetch_assoc($be)) {
                    ?>
                      <tr>
                        <td><?= $no; ?></td>
                        <td><?= $r['kategori']; ?></td>
                        <td><img src="../../asset/images/<?= $r['img_logo'] ?>" width=150></td>
                        <td><a href="?module=logo&aksi=editlogo&id=<?= $r['id_logo']; ?>" class="btn btn-success btn-flat">Edit</a>
                        </td>
                      </tr>
                    <?php $no++;
                    } ?>
                  </tbody>
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