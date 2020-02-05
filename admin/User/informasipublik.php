<?php
  if (isset($_GET['aksi'])){
    $aksi = $_GET['aksi'];

  switch ($aksi){
    case "hapusinf" :

    if(isset($_GET['id'])){
      $del = mysqli_query($kon, "DELETE FROM informasipublic where idinformasi='$_GET[id]'");
      if($del){
        echo "<script>
                 alert('Data Berhasil Dihapus');
                 window.location='index.php?module=informasipublik';
              </script>";
      }else{
        echo "<script>
                alert('Data Gagal Dihapus');
                window.location='index.php?module=informasipublik';
              </script>";
      }
    }
    break;
  }
}else{
?>
<div class="content-wrapper">
<section class="content-header">
      <h1>
      Informasi Publik
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Informasi Publik</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">          
              <!--<a href="?module=ig&aksi=tambahig" class="btn btn-flat btn-primary">Tambah Instagram</a> !-->
            </div>
           <div class="box-body">
              <div class="table table-responsive">
              <table  id="example1"  class="table table-bordered table-striped">
                <thead>
                <tr>
					         <th>No</th>
                   <th>Nama</th>
                   <th>Email</th>
        					 <th>No HP</th>
                   <th>Isi</th>
        					 <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$be = mysqli_query($kon, "SELECT * FROM informasipublic");
					
					$no=1;
					while($r=mysqli_fetch_assoc($be)){
				?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $r["nama"];?></td>
          <td><?= $r["email"];?></td>
          <td><?= $r["nohp"];?></td>
          <td><?= $r["isi"];?></td>					
					<td>
						<a href="https://mail.google.com/mail/u/0/#inbox?compose=new" class="btn btn-flat btn-primary" style="border-radius:2px;" target="_blank">Kirim Email</a>
						<a href="?module=informasipublik&aksi=hapusinf&id=<?php echo $r['idinformasi'];?>" class="btn btn-danger">Hapus</a>
					</td>
				</tr>
					<?php $no++; } ?>
				</tbody>
              </table>
            </div>
            </div>
          </div>
          </div>
          </div>
     </section>
</div>
<?php } ?>
