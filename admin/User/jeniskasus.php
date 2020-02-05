<div class="content-wrapper">
        <!-- Content Header (Page header) -->


<?php
  if (isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];

  switch ($aksi){
    case "tambahjnskasus" :

    if(isset($_POST['save'])){
    $tglskrg = date('Y-m-d');

	$save=mysqli_query($con, "INSERT INTO tbl_jnskasus VALUES('', '$_POST[jenis_kasus]')");

	 if($save) {
        echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=jeniskasus';
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
        Jenis Kasus
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Jenis Kasus</li>
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
						<label for="kdp" class="col-sm-2 control-label">Jenis Kasus</label>
					  <div class="col-sm-4">
						<input type="text" name="jenis_kasus" id="kdp" class="form-control">
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
    case "editjnskasus":
    if(isset($_GET['id_jeniskasus'])){
      $sql = mysqli_query($con, "SELECT * FROM tbl_jnskasus where id_jeniskasus='$_GET[id_jeniskasus]'");
      $data=mysqli_fetch_assoc($sql);
    }
    if(isset($_POST['save'])){

      $save=mysqli_query($con, "UPDATE tbl_jnskasus set jenis_kasus='$_POST[jenis_kasus]'where id_jeniskasus='$_GET[id_jeniskasus]'");
      if($save) {
        echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=jeniskasus';
              </script>";
        }else{
          echo "<script>alert('Gagal');
              </script>";
       }
    }
?>
<section class="content-header">
      <h1>
       Jenis Kasus
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Jenis Kasus</li>
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
						<label for="kdp" class="col-sm-2 control-label">Jenis Kasus</label>
					  <div class="col-sm-4">
						<input type="text" name="jenis_kasus" id="kdp" class="form-control" value="<?= $data['jenis_kasus']?>">
					  </div>
				</div>
                <div class="form-group">
                  <div class="col-sm-4 col-md-offset-2">
                    <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
					<a href="?module=client" class="btn btn-primary btn-flat">Kembali</a>
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
    case "hapusjnskasus" :

    if(isset($_GET['id_jeniskasus'])){
      $lihat = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_jnskasus where id_jeniskasus='$_GET[id_jeniskasus]'"));

      $del = mysqli_query($con, "DELETE FROM tbl_jnskasus where id_jeniskasus='$_GET[id_jeniskasus]'");
      if($del){
    	  echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=jeniskasus';
    				  </script>";
      }else{
        echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=jeniskasus';
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
      Jenis Kasus
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jenis Kasus</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <a href="?module=jeniskasus&aksi=tambahjnskasus" class="btn btn-flat btn-primary">Tambah Jenis Kasus</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>No</th>
					<th>Jenis Kasus</th>
					<th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$be = mysqli_query($con, "SELECT * FROM tbl_jnskasus");
					$no=1;
					while($r=mysqli_fetch_assoc($be)){
				?>

				<tr>
					<td><?= $no; ?></td>
					<td><?= $r["jenis_kasus"];?></td>
					<td><a href="?module=jeniskasus&aksi=editjnskasus&id_jeniskasus=<?= $r['id_jeniskasus'];?>" class="btn btn-info">Edit</a>
						<a href="?module=jeniskasus&aksi=hapusjnskasus&id_jeniskasus=<?= $r['id_jeniskasus'];?>" class="btn btn-info">Hapus</a>
					</td>
				</tr>
					<?php $no++; } ?>
				</tfoot>
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
