<div class="content-wrapper">

<?php
  if (isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];

  switch ($aksi){

    case "editevent":
    if(isset($_GET['id'])){
      $sql = mysqli_query($kon, "SELECT * FROM event where idwaktu='$_GET[id]'");
      $data=mysqli_fetch_assoc($sql);
    }
    if(isset($_POST['save'])){
    
    $save=mysqli_query($kon, "UPDATE event set judul='$_POST[judul]', tgl='$_POST[tgl]', jam='$_POST[jam]', status='$_POST[status]' WHERE idwaktu='$_GET[id]'");
        
    if($save) {
        echo "<script>
                alert('Edit Data Berhasil');
                window.location='?module=event';
              </script>";
        }else{
          echo "<script>alert('Gagal');
              </script>";
       }
    }
?>
<section class="content-header">
      <h1>
        Event
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Event</li>
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
                  <label for="judul" class="col-sm-2 control-label">Judul</label>
                  <div class="col-sm-8">
                    <input type="text" name="judul" id="judul" class="form-control"  value="<?= $data['judul']; ?>">
                  </div>
                </div>

                <div class="form-group" >
                  <label for="tgl" class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-8">
                    <input type="date" name="tgl" id="tgl" class="form-control"  value="<?= $data['tgl']; ?>">
                  </div>
                </div>

                <div class="form-group" >
                  <label for="jam" class="col-sm-2 control-label">Waktu</label>
                  <div class="col-sm-8">
                    <input type="time" name="jam" id="jam" class="form-control"  value="<?= $data['jam']; ?>">
                  </div>
                </div>
                
                <div class="form-group" >
                  <label for="jam" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-8">
                    <select name="status" class="form-control">
                      <option value="Aktif">Aktif</option>
                      <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-4 col-md-offset-2">
                    <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                    <a href="?module=event" class="btn btn-primary btn-flat">Kembali</a>
                  </div>
                </div>
              </div>
            </form>
            <script>
              document.getElementsByName("status")[0].value = "<?=$data['status']?>";
            </script>
          </div>
        </div>
    </div>
</section>
<?php
    break;
    case "hapusevent" :

    if(isset($_GET['id'])){
      
      $del = mysqli_query($kon, "DELETE FROM event where idwaktu='$_GET[id]'");
      if($del){
    	  echo "<script>
                 alert('Data Berhasil Dihapus');
    					   window.location='index.php?module=event';
    				  </script>";
      }else{
        echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=event';
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
        Event
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Event</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <!-- <a href="?module=video&aksi=tambahvideo" class="btn btn-flat btn-primary">Tambah Video</a> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table table-responsive">
              <table  class="table table-bordered table-striped" id="example1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM event");
                  $no=1;
                  while($r=mysqli_fetch_assoc($be)){
                  ?>

                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r['judul'] ?></td>
                      <td><?= $r['tgl'] ?></td>
                      <td><?= $r['jam'] ?></td>
                      <td><?= $r['status'] ?></td>
                      <td><a href="?module=event&aksi=editevent&id=<?= $r['idwaktu'];?>" class="btn btn-success btn-flat">Edit</a>
                        <!-- <a href="?module=event&aksi=editevent&id=<?//= $r['idevent'];?>" class="btn btn-danger btn-flat" onclick="return confirm('Yakin Akan Menghapus Data Ini ... ?')">Hapus</a> -->
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
