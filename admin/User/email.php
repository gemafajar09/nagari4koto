<div class="content-wrapper">
<?php
  if (isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];

  switch ($aksi){
    case "tambahemail" :
	
    if(isset($_POST['save1'])){
	$save= mysqli_query($kon, "INSERT INTO email (idemail,email) VALUES ('','$_POST[email]')");
	 if($save) {
        echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=emailbawaslu';
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
        Email
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Email</li>
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
            <label for="des" class="col-sm-2 control-label">Email Bawaslu</label>
            <div class="col-sm-8">
            <input name="email" type="email"  class="form-control">
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
    case "editemail":
    if(isset($_GET['idemail'])){
      $sql = mysqli_query($kon, "SELECT * FROM email where idemail='$_GET[idemail]'");
      $data=mysqli_fetch_assoc($sql);
    }
    if(isset($_POST['save'])){

      $save=mysqli_query($kon, "UPDATE email set email='$_POST[email]' where idemail='$_GET[idemail]'");
      if($save) {
        echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=emailbawaslu';
              </script>";
        }else{
          echo "<script>alert('Gagal');
              </script>";
       }
    }
?>
<section class="content-header">
      <h1>
       Email
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Email</li>
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
						<label for="des" class="col-sm-2 control-label">Email</label>
					  <div class="col-sm-8">
						<input name="idemail" type="hidden" id="des" class="form-control" value="<?= $data['idemail']?>">
						<input name="email" type="email" id="des" class="form-control" value="<?= $data['email']?>">
					  </div>
					  
					</div>					
                <div class="form-group">
                  <div class="col-sm-4 col-md-offset-2">
                    <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
					<a href="?module=emailbawaslu" class="btn btn-primary btn-flat">Kembali</a>
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
    case "hapusemail" :

    if(isset($_GET['idemail'])){
      $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM email where idemail='$_GET[idemail]'"));

      $del = mysqli_query($kon, "DELETE FROM email where idemail='$_GET[idemail]'");
      if($del){
    	  echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=emailbawaslu';
    				  </script>";
      }else{
        echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=emailbawaslu';
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
