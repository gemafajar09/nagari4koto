<div class="content-wrapper">

<?php
  if (isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];

  switch ($aksi){
    case "tambahvideo" :

    if(isset($_POST['save'])){

	 $save=mysqli_query($kon, "INSERT INTO video (link) VALUES ('$_POST[link]')");

	 if($save) {
        echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=video';
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
        Video
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Video</li>
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
						<label for="link" class="col-sm-2 control-label">Link</label>
					  <div class="col-sm-8">
						<input type="text" name="link" id="link" class="form-control">
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
    case "editvideo":
    if(isset($_GET['id'])){
      $sql = mysqli_query($kon, "SELECT * FROM video where idvideo='$_GET[id]'");
      $data=mysqli_fetch_assoc($sql);
    }
    if(isset($_POST['save'])){
    
    $save=mysqli_query($kon, "UPDATE video set link='$_POST[link]' WHERE idvideo='$_GET[id]'");
        
    if($save) {
        echo "<script>
                alert('Edit Data Berhasil');
                window.location='?module=video';
              </script>";
        }else{
          echo "<script>alert('Gagal');
              </script>";
       }
    }
?>
<section class="content-header">
      <h1>
        Video
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Video</li>
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
                  <label for="link" class="col-sm-2 control-label">Link</label>
                  <div class="col-sm-8">
                    <input type="text" name="link" id="link" class="form-control"  value="<?= $data['link']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4 col-md-offset-2">
                    <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                    <a href="?module=video" class="btn btn-primary btn-flat">Kembali</a>
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
    case "hapusvideo" :

    if(isset($_GET['id'])){
      
      $del = mysqli_query($kon, "DELETE FROM video where idvideo='$_GET[id]'");
      if($del){
    	  echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=video';
    				  </script>";
      }else{
        echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=video';
              </script>";
      }
    }
?>
<?php
break;
}
}else{
?>

<section class="content-header">
      <h1>
        Video
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Video</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <a href="?module=video&aksi=tambahvideo" class="btn btn-flat btn-primary">Tambah Video</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive">
              <table  class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Link</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM video");
                  $no=1;
                  while($r=mysqli_fetch_assoc($be)){
                  ?>

                    <tr>
                      <td><?= $no; ?></td>
                      <td><a href="<?= $r['link'] ?>"></a><?= $r['link'] ?></td>
                      <td><a href="?module=video&aksi=editvideo&id=<?= $r['idvideo'];?>" class="btn btn-success btn-flat">Edit</a>
                        <a href="?module=video&aksi=hapusvideo&id=<?= $r['idvideo'];?>" class="btn btn-danger btn-flat" onclick="return confirm('Yakin Akan Menghapus Data Ini ... ?')">Hapus</a>
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
