<div class="content-wrapper">
  <?php
  if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    switch ($aksi) {
      case "tambahppid":

        if (isset($_POST['save1'])) {

          $lokasi_file = $_FILES['fupload']['tmp_name'];
          $nama_file = $_FILES['fupload']['name'];
          if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, "../../asset/images/" . $nama_file);
          }


          $save = mysqli_query($kon, "INSERT INTO tb_ppid(kategori,dokumen) VALUES('$_POST[kategori]','$nama_file')");
          if ($save) {
            echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=ppid/ppidbawaslu';
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
            PPID
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tambah PPID</li>
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
                        <label for="des" class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-8">
                          <select name="kategori" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            <option value="PROFIL">PROFIL</option>
                            <option value="BIAYA">BIAYA</option>
                            <option value="INFORMASI PUBLIK">INFORMASI PUBLIK</option>
                            <option value="LAPORAN KEUANGAN TAHUNAN">LAPORAN KEUANGAN TAHUNAN</option>
                            <option value="LAPORAN KINERJA">LAPORAN KINERJA</option>
                            <option value="LAPORAN LAYANAN INFORMASI">LAPORAN LAYANAN INFORMASI</option>
                            <option value="RENCANA KERJA DAN ANGGARAN">RENCANA KERJA DAN ANGGARAN</option>
                            <option value="SOP LAYANAN INFORMASI">SOP LAYANAN INFORMASI</option>
                            <option value="STRUKTUR ORGANISASI PPID">STRUKTUR ORGANISASI PPID</option>
                            <option value="TUGAS DAN FUNGSI">TUGAS DAN FUNGSI</option>
                            <option value="VISI DAN MISI">VISI DAN MISI</option>
                            <option value="LHKPN">LHKPN</option>
                            <option value="PERMOHONAN INFORMASI">PERMOHONAN INFORMASI</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">File</label>
                        <div class="col-sm-8">
                          <input name="fupload" id="fupload" type="file" class="form-control">
                        </div>
                      </div>



                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save1" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=ppid/ppidbawaslu" class="btn btn-primary btn-flat">Kembali</a>
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
      case "editppid":
        if (isset($_GET['idppid'])) {
          $sql = mysqli_query($kon, "SELECT * FROM tb_ppid where id_ppid='$_GET[idppid]'");
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

          $save = mysqli_query($kon, "UPDATE tb_ppid set id_ppid='$_POST[id_ppid]',kategori='$_POST[kategori]',dokumen='$nama_file' where id_ppid='$_GET[idppid]'");
          if ($save) {
            echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=ppid/ppidbawaslu';
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
            <li class="active">Edit PPID</li>
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
                        <input name="id_ppid" id="id_ppid" type="hidden" class="form-control" value="<?= $data['id_ppid'] ?>">
                        <label for="des" class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-8">
                          <select name="kategori" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            <option value="PROFIL">PROFIL</option>
                            <option value="BIAYA">BIAYA</option>
                            <option value="INFORMASI PUBLIK">INFORMASI PUBLIK</option>
                            <option value="LAPORAN KEUANGAN TAHUNAN">LAPORAN KEUANGAN TAHUNAN</option>
                            <option value="LAPORAN KINERJA">LAPORAN KINERJA</option>
                            <option value="LAPORAN LAYANAN INFORMASI">LAPORAN LAYANAN INFORMASI</option>
                            <option value="RENCANA KERJA DAN ANGGARAN">RENCANA KERJA DAN ANGGARAN</option>
                            <option value="SOP LAYANAN INFORMASI">SOP LAYANAN INFORMASI</option>
                            <option value="STRUKTUR ORGANISASI PPID">STRUKTUR ORGANISASI PPID</option>
                            <option value="TUGAS DAN FUNGSI">TUGAS DAN FUNGSI</option>
                            <option value="VISI DAN MISI">VISI DAN MISI</option>
                            <option value="LHKPN">LHKPN</option>
                            <option value="PERMOHONAN INFORMASI">PERMOHONAN INFORMASI</option>
                          </select>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="des" class="col-sm-2 control-label">Foto</label>
                        <div class="col-sm-8">
                          <input name="fupload" id="fupload" type="file" class="form-control">
                          <input name="fuploadlama" id="fupload" type="hidden" class="form-control" value="<?= $data['dokumen'] ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-4 col-md-offset-2">
                          <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                          <a href="?module=ppid/ppidbawaslu" class="btn btn-primary btn-flat">Kembali</a>
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
      case "hapusppid":

        if (isset($_GET['idppid'])) {
          $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM tb_ppid where id_ppid='$_GET[idppid]'"));

          $del = mysqli_query($kon, "DELETE FROM tb_ppid where id_ppid='$_GET[idppid]'");
          if ($del) {
            echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=ppid/ppidbawaslu';
    				  </script>";
          } else {
            echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=ppid/ppidbawaslu';
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