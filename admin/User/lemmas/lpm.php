<div class="content-wrapper">

  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahlpm":

        if (isset($_POST['save'])) {
          $judul = $_POST['judul'];
          $isi   = $_POST['isi'];

          if (in_array($ext, $valid)) {

            $save = mysqli_query($kon, "INSERT INTO tb_lpm (judul_lpm, isi_lpm) VALUES ('$judul', '$_POST[isi]')");

            if ($save) {
              echo "<script>
            alert('Tambah Data Berhasil');
            window.location='../index.php?module=lemmas/lpm';
            </script>";
              exit;
            } else {
              echo "<script>alert('Gagal');
            </script>";
            }
          }
        }
  ?>
        <section class="content-header">
          <h1>
            LPM
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah Konten</li>
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
                        <label for="kdp" class="col-sm-2 control-label">Judul</label>
                        <div class="col-sm-8">
                          <input type="text" name="judul" id="kdp" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="editor" class="col-sm-2 control-label">Isi Konten</label>
                        <div class="col-sm-8">
                          <textarea type="text" name="isi" id="editor" class="form-control" rows="15" cols="80"></textarea>

                        </div>
                      </div>

                      <div class="form-group">
                        <label for="postby" class="col-sm-2 control-label">Posting By</label>
                        <div class="col-sm-4">
                          <input type="text" name="postby" id="postby" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="gam" class="col-sm-2 control-label">Gambar</label>
                        <div class="col-sm-4">
                          <input type="file" name="gambar" id="gam" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=berita/berita" class="btn btn-primary btn-flat">Kembali</a>
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
      case "editberita":
        if (isset($_GET['id'])) {
          $sql = mysqli_query($kon, "SELECT * FROM tb_berita where idberita='$_GET[id]'");
          $data = mysqli_fetch_assoc($sql);
        }
        if (isset($_POST['save'])) {
          $judulseo = seo_title($_POST['judul']);
          $judul = anti_injection($_POST['judul']);
          $postby = anti_injection($_POST['postby']);
          $nmberkas  = $_FILES['foto']["name"];
          $lokberkas = $_FILES["foto"]["tmp_name"];
          $nmfoto = date("YmdHis") . $nmberkas;
          $valid    = array('jpg', 'png', 'gif', 'jpeg');
          if (empty($lokberkas)) {
            $save = mysqli_query($kon, "UPDATE tb_berita set judul='$judul', isiberita='$_POST[deskripsi]', posting_by='$postby', judul_seo='$judulseo' where idberita='$_GET[id]'");
            if ($save) {
              echo "<script>
              alert('Edit Data Berhasil');
              window.location='../index.php?module=berita/berita';
                </script>";
            } else {
              echo "<script>alert('Gagal');
                </script>";
            }
          } else if (!empty($lokberkas)) {
            list($txt, $ext) = explode(".", $nmfoto);
            if (in_array($ext, $valid)) {

              move_uploaded_file($lokberkas, "../../asset/images/ .$nmfoto");
              $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM tbl_berita where idberita='$_GET[id]'"));

              unlink("../../asset/images/" . $lihat['gambar']);

              $save = mysqli_query($kon, "UPDATE tb_berita set judul='$judul', isiberita='$_POST[deskripsi]', gambar='$nmfoto', posting_by='$postby', judul_seo='$judulseo' where idberita='$_GET[id]'");
              if ($save) {
                echo "<script>
            alert('Edit Data Berhasil');
            window.location='../index.php?module=berita/berita';
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
            Berita
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Berita</li>
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
                      <label for="jdl" class="col-sm-2 control-label">Judul</label>
                      <div class="col-sm-10">
                        <input type="text" name="judul" id="jdl" class="form-control" value="<?= $data['judul']; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="editor" class="col-sm-2 control-label">Isi Berita</label>
                      <div class="col-sm-10">
                        <textarea type="text" name="deskripsi" id="editor" class="form-control" rows="15" cols="80"><?= $data['isiberita']; ?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="postby" class="col-sm-2 control-label">Posting By</label>
                      <div class="col-sm-10">
                        <input type="text" name="postby" id="postby" class="form-control" value="<?= $data['posting_by']; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="gam" class="col-sm-2 control-label">Gambar</label>
                      <div class="col-sm-4">
                        <input type="file" name="foto" id="gam" class="form-control">
                        <input type="hidden" name="gambarlama" id="jdl" class="form-control" value="<?= $data['gambar']; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="gam" class="col-sm-2 control-label">&nbsp;</label>
                      <div class="col-sm-4">
                        <img src="../../img/blog/<?= $data['gambar']; ?>" style="width:250px;">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-4 col-md-offset-2">
                        <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                        <a href="?module=berita/berita" class="btn btn-primary btn-flat">Kembali</a>
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
      case "hapusberita":

        if (isset($_GET['id'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM tb_berita where idberita='$_GET[id]'"));

          unlink("../../img/blog/" . $lihat['gambar']);
          $del = mysqli_query($kon, "DELETE FROM tb_berita where idberita='$_GET[id]'");
          if ($del) {
            echo "<script>
                alert('Data Berhasil Dihapus');
                window.location='index.php?module=berita/berita';
                  </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=berita/berita';
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
        Berita
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Berita</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <a href="?module=berita/berita&aksi=tambahberita" class="btn btn-flat btn-primary">Tambah Berita</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive">
                <table class="table table-bordered table-striped" id="example1">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Gambar</th>
                      <th>Judul</th>
                      <th>Isi Berita</th>
                      <th>Posting By</th>
                      <th>Tanggal Posting</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $be = mysqli_query($kon, "SELECT * FROM tb_berita ORDER BY tgl_posting DESC");
                    $no = 1;
                    while ($r = mysqli_fetch_assoc($be)) {
                      $des = substr($r['isiberita'], 0, 50) . "...";
                    ?>

                      <tr>
                        <td><?= $no; ?></td>
                        <td><img src="../../asset/images/<?= $r["gambar"]; ?>" style="width:100px;"></td>
                        <td><?= $r["judul"]; ?></td>
                        <td><?= $des; ?></td>
                        <td><?= $r["posting_by"]; ?></td>
                        <td><?= $r["tgl_posting"]; ?></td>
                        <td><a href="?module=berita/berita&aksi=editberita&id=<?= $r['idberita']; ?>" class="btn btn-success btn-flat">Edit</a>
                          <a href="?module=berita/berita&aksi=hapusberita&id=<?= $r['idberita']; ?>" class="btn btn-danger btn-flat" onclick="return confirm('Yakin Akan Menghapus Data Ini ... ?')">Hapus</a>
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