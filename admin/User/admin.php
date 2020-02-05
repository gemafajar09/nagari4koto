<div class="content-wrapper">
        <!-- Content Header (Page header) -->
       

<?php
  if (isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];

  switch ($aksi){
    case "tambahadmin" :

    if(isset($_POST['save'])){
    $tglskrg = date('Y-m-d');
		
		
	$save=mysqli_query($con, "INSERT INTO tbl_admin VALUES('', '$_POST[username]','$_POST[password]','$_POST[nama]', '$_POST[level]')");
	  
	 if($save) {
        echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=admin';
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
        admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Admin</li>
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
						<label for="kdp" class="col-sm-2 control-label">Username</label>
					  <div class="col-sm-4">
						<input type="text" name="username" id="kdp" class="form-control">
					  </div>
					</div>
					<div class="form-group">
						<label for="kdp" class="col-sm-2 control-label">Password</label>
					  <div class="col-sm-4">
						<input type="password" name="password" id="kdp" class="form-control">
					  </div>
					</div>
					<div class="form-group">
						<label for="kdp" class="col-sm-2 control-label">Nama Lengkap</label>
					  <div class="col-sm-4">
						<input type="text" name="nama" id="kdp" class="form-control">
					  </div>
					</div>

					<div class="form-group">
						<label for="kdp" class="col-sm-2 control-label">Level</label>
					  <div class="col-sm-4">
						<select name="level" class="form-control">
						<option value="">--Pilih--</option>
						<option value="superadmin">Super Admin</option>
						<option value="adminbiasa">Admin Biasa</option>
						</select>
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
    case "editadmin":
    if(isset($_GET['idadmin'])){
      $sql = mysqli_query($con, "SELECT * FROM tbl_admin where idadmin='$_GET[idadmin]'");
      $data=mysqli_fetch_assoc($sql);
    }
    if(isset($_POST['save'])){
		
      $save=mysqli_query($con, "UPDATE tbl_admin set username='$_POST[username]', password='$_POST[password]',namalengkap='$_POST[nama]',level='$_POST[level]' where idadmin='$_GET[idadmin]'");
      if($save) {
        echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=admin';
              </script>";
        }else{
          echo "<script>alert('Gagal');
              </script>";
       }
    }
?>
<section class="content-header">
      <h1>
        Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Admin</li>
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
                  <label for="jdl" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" id="jdl" class="form-control"  value="<?= $data['username']; ?>">
                  </div>
                </div>
				
				<div class="form-group" >
                  <label for="jdl" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="text" name="password" id="jdl" class="form-control"  value="<?= $data['password']; ?>">
                  </div>
                </div>
				
				<div class="form-group" >
                  <label for="jdl" class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" id="jdl" class="form-control"  value="<?= $data['namalengkap']; ?>">
                  </div>
                </div>
				
				<div class="form-group" >
                  <label for="jdl" class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-10">
                    <select name="level" class="form-control">
						<option value="<?= $data['level']; ?>"><?= $data['level']; ?></option>
						<option value="superadmin">Super Admin</option>
						<option value="adminbiasa">Admin Biasa</option>
						</select>
                  </div>
                </div>
				

                <div class="form-group">
                  <div class="col-sm-4 col-md-offset-2">
                    <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
					<a href="?module=admin" class="btn btn-primary btn-flat">Kembali</a>
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
    case "hapusadmin" :

    if(isset($_GET['idadmin'])){
      $lihat = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM tbl_admin where idadmin='$_GET[idadmin]'"));

      $del = mysqli_query($con, "DELETE FROM tbl_admin where idadmin='$_GET[idadmin]'");
      if($del){
    	  echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=admin';
    				  </script>";
      }else{
        echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=admin';
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
        Admin
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admin</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <a href="?module=admin&aksi=tambahadmin" class="btn btn-flat btn-primary">Tambah Admin</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive">
              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>No</th>
					<th>Username</th>
					<th>Nama Admin</th>
					<th>Level</th>
					
					<th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php 
					$be = mysqli_query($con, "SELECT * FROM tbl_admin");
					$no=1;
					while($r=mysqli_fetch_assoc($be)){
				?>
          		
				<tr>
					<td><?= $no; ?></td>
					<td><?= $r["username"];?></td>
				<td><?= $r["namalengkap"];?></td>
				<td><?= $r["level"];?></td>
					
					<td><a href="?module=admin&aksi=editadmin&idadmin=<?= $r['idadmin'];?>" class="btn btn-info">Edit</a>
						<a href="?module=admin&aksi=hapusadmin&idadmin=<?= $r['idadmin'];?>" class="btn btn-info">Hapus</a>
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