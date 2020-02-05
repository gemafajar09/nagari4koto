<div class="content-wrapper">

<?php
  if (isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];

  switch ($aksi){
    case "tambahpengumuman" :

  if(isset($_POST['save'])){
    $tglskrg = date('Y-m-d H:i:s');
    $judul = anti_injection($_POST['judul']);
    $judulseo = seo_title($_POST['judul']);
    $postby = anti_injection($_POST['postby']);

	$save=mysqli_query($kon, "INSERT INTO tb_pengumuman (judul, isipengumuman, posting_by, tgl_posting, judul_seo, kategori) VALUES ('$judul', '$_POST[deskripsi]', '$postby', '$tglskrg', '$judulseo', '$_POST[kategori]')");

  $id= mysqli_insert_id($kon);

	 if($save) {
      $jumlah = count($_FILES['gambar']['name']);

      if($jumlah > 0){
        for($i=0; $i < $jumlah; $i++){
          $file_name = $_FILES['gambar']['name'][$i];
          $tmp_name = $_FILES['gambar']['tmp_name'][$i];
          $nmfoto= $file_name;
          move_uploaded_file($tmp_name, "../../dokumen/pengumuman/".$nmfoto);

          $simpan=mysqli_query($kon, "INSERT INTO tb_detail_pengumuman (idpengumuman, berkas) VALUES ('$id', '$nmfoto')");
        }
      }
        echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=pengumuman';
            </script>";
            exit;
    }else{
        echo "<script>alert('Gagal');
            </script>";
    }

  }
?>
<section class="content-header">
      <h1>
        Berita
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Berita</li>
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
						<label for="editor" class="col-sm-2 control-label">Isi Pengumuman</label>
					  <div class="col-sm-8">
						<textarea type="text" name="deskripsi" id="editor" class="form-control" rows="15" cols="80"></textarea>

					  </div>
					</div>

					<div class="form-group">
						<label for="postby" class="col-sm-2 control-label">Posting By</label>
					  <div class="col-sm-4">
						<input type="text" name="postby" id="postby" class="form-control">
					  </div>
					</div>
					
					<div class="form-group">
						<label for="postby" class="col-sm-2 control-label">Kategori</label>
					  <div class="col-sm-4">
						<select name="kategori" class="form-control">
						<option value="">--PILIH KATEGORI--</option>
						<option value="PENGUMUMAN">PENGUMUMAN</option>
						<option value="PENGAWASAN">PENGAWASAN</option>
						<option value="PUTUSAN">PUTUSAN</option>
						</select>
					  </div>
					</div>

					<div class="form-group">
						<label for="gam" class="col-sm-2 control-label">Gambar</label>
					  <div class="col-sm-4">
						<input type="file" name="gambar[]" id="gam" class="form-control" multiple>
					  </div>
					</div>

				    <div class="form-group">
					  <div class="col-sm-4 col-md-offset-2">
						<button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
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
    case "editpengumuman":
    if(isset($_GET['id'])){
      $sql = mysqli_query($kon, "SELECT * FROM tb_pengumuman where idpengumuman='$_GET[id]'");
      $data=mysqli_fetch_assoc($sql);
    }

    if(isset($_POST['upload'])){
      if(empty($_FILES['lampiran']['tmp_name'])){ ?>
        <script>window.alert('Berkas Belum di upload');</script>
      <?php
      }else{
          $id = anti_injection($_GET['id']);
          $file_name = $_FILES['lampiran']['name'];
          $tmp_name = $_FILES['lampiran']['tmp_name'];
          $namafile = $file_name;
          move_uploaded_file($tmp_name, "../../dokumen/pengumuman/".$namafile);

          $lampiran=mysqli_query($kon, "INSERT INTO tb_detail_pengumuman (idpengumuman, berkas) VALUES ('$id', '$namafile')");
        }
    }

    if(isset($_POST['save'])){
    $judulseo = seo_title($_POST['judul']);
    $judul = anti_injection($_POST['judul']);
    $postby = anti_injection($_POST['postby']);
    $id = anti_injection($_GET['id']);

    $save=mysqli_query($kon, "UPDATE tb_pengumuman set judul='$judul', isipengumuman='$_POST[deskripsi]', posting_by='$postby', judul_seo='$judulseo', kategori='$_POST[kategori]' where idpengumuman='$id'");
        
      if($save) {
        echo "<script>
              alert('Edit Data Berhasil');
              window.location='?module=pengumuman';
                </script>";
          }else{
            echo "<script>alert('Gagal');
                </script>";
         }
  }
?>
<section class="content-header">
      <h1>
        Pengumuman
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Pengumuman</li>
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
                <div class="form-group" >
                  <label for="jdl" class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-10">
                    <input type="text" name="judul" id="jdl" class="form-control"  value="<?= $data['judul']; ?>">
                  </div>
                </div>

				        <div class="form-group" >
                  <label for="editor" class="col-sm-2 control-label">Isi Pengumuman</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="deskripsi" id="editor" class="form-control" rows="15" cols="80"><?= $data['isipengumuman']; ?></textarea>
                  </div>
                </div>

                <div class="form-group" >
                  <label for="postby" class="col-sm-2 control-label">Posting By</label>
                  <div class="col-sm-10">
                    <input type="text" name="postby" id="postby" class="form-control"  value="<?= $data['posting_by']; ?>">
                  </div>
                </div>
                
                <div class="form-group" >
                  <label for="postby" class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-10">
                    <select name="kategori" class="form-control">
							<?php if($data['kategori']=='PENGUMUMAN'){ ?> 
							<option value="PENGUMUMAN" selected>PENGUMUMAN</option>
							<option value="PENGAWASAN">PENGAWASAN</option>
							<option value="PUTUSAN">PUTUSAN</option>
							
							<?php } elseif($data['kategori']=='PENGAWASAN'){ ?> 
							<option value="PENGUMUMAN">PENGUMUMAN</option>
							<option value="PENGAWASAN" selected>PENGAWASAN</option>
							<option value="PUTUSAN">PUTUSAN</option>
							
							<?php } elseif($data['kategori']=='PUTUSAN'){ ?> 
							<option value="PENGUMUMAN">PENGUMUMAN</option>
							<option value="PENGAWASAN">PENGAWASAN</option>
							<option value="PUTUSAN" selected>PUTUSAN</option>
							<?php }else{ ?>
              <option value="PENGUMUMAN">PENGUMUMAN</option>
              <option value="PENGAWASAN">PENGAWASAN</option>
              <option value="PUTUSAN">PUTUSAN</option>
              <?php } ?>
					</select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="lampiran" class="col-sm-3 control-label" id="kiriform">Lampiran</label>
                </div>

                <div class="form-group">
                  <div class="col-sm-4 col-md-offset-2">
                    <input type="file" name="lampiran" class="form-control">
                  </div>
                  <div class="col-sm-3">
                    <button type="submit" class="btn btn-success" name="upload"><i class="fa fa-plus"></i></button>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-10 col-md-offset-2">
                    <table class="table table-bordered">
                      <tr class="info">
                        <th>No</th>
                        <th>Berkas</th>
                        <th>Aksi</th>
                      </tr>
                      <?php 
                        $id = anti_injection($_GET['id']);
                        $lampiran=mysqli_query($kon, "SELECT * FROM tb_detail_pengumuman WHERE idpengumuman=$id");
                        $no = 0;
                        while($rlamp=mysqli_fetch_assoc($lampiran)){
                          $no++;
                       ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $rlamp['berkas'] ?></td>
                        <td><a href="?module=pengumuman&aksi=hapusberkas&id=<?= $rlamp['iddetailpengumuman'] ?>" class="btn btn-danger btn-xs"><i class="fa fa-close"></a></td>
                      </tr>
                      <?php } ?>
                    </table>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4 col-md-offset-2">
                    <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                    <a href="?module=pengumuman" class="btn btn-primary btn-flat">Kembali</a>
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
    case "hapuspengumuman" :

    if(isset($_GET['id'])){
      $lihat = mysqli_query($kon, "SELECT * FROM tb_detail_pengumuman where idpengumuman='$_GET[id]'");

      while($rlihat=mysqli_fetch_assoc($lihat)){
        unlink("../../dokumen/pengumuman/".$rlihat['berkas']);
      }

      $del = mysqli_query($kon, "DELETE FROM tb_pengumuman where idpengumuman='$_GET[id]'");
      if($del){
    	  echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=pengumuman';
    				  </script>";
      }else{
        echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=pengumuman';
              </script>";
      }
    }

    break;
    case "hapusberkas" :

    if(isset($_GET['id'])){

      $id= $_GET['id'];

      $cek = mysqli_fetch_assoc(mysqli_query($kon,"SELECT * FROM tb_detail_pengumuman WHERE iddetailpengumuman='$id'"));
      
      unlink("../../dokumen/pengumuman".$cek['berkas']);

      $del = mysqli_query($kon, "DELETE FROM tb_detail_pengumuman WHERE iddetailpengumuman='$id'");

            echo "<script>
              window.history.back(2);
              refresh();
            </script>";

    }
?>
<?php
break;
}
}else{
?>

<section class="content-header">
      <h1>
        Pengumuman
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengumuman</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <a href="?module=pengumuman&aksi=tambahpengumuman" class="btn btn-flat btn-primary">Tambah Informasi</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive">
              <table  class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Isi Pengumuman</th>
                    <th>Posting By</th>
                    <th>Tanggal Posting</th>
                    <th>Berkas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM tb_pengumuman ORDER BY tgl_posting DESC");
                  $no=1;
                  while($r=mysqli_fetch_assoc($be)){
                    $des = substr($r['isipengumuman'],0,50)."...";

                    $berkas = mysqli_query($kon,"SELECT * FROM tb_detail_pengumuman WHERE idpengumuman = '$r[idpengumuman]'");
                    ?>

                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r["kategori"] ?></td>
                      <td><?= $r["judul"];?></td>
                      <td><?= $des;?></td>
                      <td><?= $r["posting_by"];?></td>
                      <td><?= $r["tgl_posting"];?></td>
                      <td>
                          <?php 
                            while($data = mysqli_fetch_assoc($berkas)){ ?>
                          <a href="../../dokumen/pengumuman/<?php echo $data['berkas'] ?>" target="_blank"><i class="fa fa-download"></i> <?php echo $data['berkas'] ?></a><br>
                          <?php
                          }
                          ?>
                      </td>
                      <td><a href="?module=pengumuman&aksi=editpengumuman&id=<?= $r['idpengumuman'];?>" class="btn btn-success btn-flat">Edit</a>
                        <a href="?module=pengumuman&aksi=hapuspengumuman&id=<?= $r['idpengumuman'];?>" class="btn btn-danger btn-flat" onclick="return confirm('Yakin Akan Menghapus Data Ini ... ?')">Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; } ?>
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
