<div class="content-wrapper">
<?php
  if (isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];

  switch ($aksi){
    case "tambahbukusaku" :
	
    if(isset($_POST['save1'])){

    $judul = anti_injection($_POST['judul']);
		
		$lokasi_file=$_FILES['fupload']['tmp_name'];
    $nama_file=$_FILES['fupload']['name'];
    if(!empty($lokasi_file)){
      move_uploaded_file($lokasi_file, "../../dokumen/bukusaku/".$nama_file);}
      
	$save= mysqli_query($kon, "INSERT INTO tb_buku_saku_bawaslu (judul,berkas) VALUES ('$judul','$nama_file')");
	 if($save) {
        echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=bukusakubawaslu';
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
        Buku Saku
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Buku Saku</li>
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
            <label for="des" class="col-sm-2 control-label">Judul</label>
            <div class="col-sm-8">
            <input name="judul" type="text"  class="form-control">
            </div>
			</div>
			
			<div class="form-group">
            <label for="des" class="col-sm-2 control-label">Berkas</label>
            <div class="col-sm-8">
            <input name="fupload" id="fupload" type="file"  class="form-control">
            </div>
			</div>
			 
			
				
				    <div class="form-group">
					  <div class="col-sm-4 col-md-offset-2 ">
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
    case "editbukusaku":
    if(isset($_GET['idbukusaku'])){
      $sql = mysqli_query($kon, "SELECT * FROM tb_buku_saku_bawaslu where idbukusaku ='$_GET[idbukusaku]'");
      $data=mysqli_fetch_assoc($sql);
    }
    if(isset($_POST['save'])){
       $judul = anti_injection($_POST['judul']);
		$lokasi_file=$_FILES['fupload']['tmp_name'];
    $nama_file=$_FILES['fupload']['name'];
    if(!empty($lokasi_file)){
      move_uploaded_file($lokasi_file, "../../dokumen/bukusaku/".$nama_file);
      }else{
		 $nama_file=$_POST["fuploadlama"];
	  }

      $save=mysqli_query($kon, "UPDATE tb_buku_saku_bawaslu set judul='$judul', berkas='$nama_file' where idbukusaku='$_GET[idbukusaku]'");
      if($save) {
        echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=bukusakubawaslu';
              </script>";
        }else{
          echo "<script>alert('Gagal');
              </script>";
       }
    }
?>
<section class="content-header">
      <h1>
       Buku Saku
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Buku Saku</li>
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
						<label for="des" class="col-sm-2 control-label">Judul</label>
					  <div class="col-sm-8">
						<input name="idbukusaku" type="hidden" id="des" class="form-control" value="<?= $data['idbukusaku']?>">
						<input name="judul" id="des" class="form-control" value="<?= $data['judul']?>">
					  </div>
					</div>	
					
					<div class="form-group">
            <label for="des" class="col-sm-2 control-label">Berkas</label>
            <div class="col-sm-8">
            <input name="fupload" id="fupload" type="file"  class="form-control">
            <input name="fuploadlama" id="fupload" type="hidden"  class="form-control" value="<?= $data['berkas']?>">
            </div>
			</div>
					
								
                <div class="form-group">
                  <div class="col-sm-4 col-md-offset-2">
                    <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
					<a href="?module=bukusakubawaslu" class="btn btn-primary btn-flat">Kembali</a>
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
    case "hapusbukusaku" :

    if(isset($_GET['idbukusaku'])){
      $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM tb_buku_saku_bawaslu where idbukusaku='$_GET[idbukusaku]'"));

      $del = mysqli_query($kon, "DELETE FROM tb_buku_saku_bawaslu where idbukusaku='$_GET[idbukusaku]'");
      if($del){
    	  echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=bukusakubawaslu';
    				  </script>";
      }else{
        echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=bukusakubawaslu';
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
