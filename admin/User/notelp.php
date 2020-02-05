<div class="content-wrapper">
<section class="content-header">
      <h1>
      No Telp
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">No Telp</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">          
              <a href="?module=notelpdata&aksi=tambahnotelp" class="btn btn-flat btn-primary">Tambah No Telp</a> 
            </div>
           <div class="box-body">
              <div class="table table-responsive">
              <table  id="example1"  class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>No</th>
					<th>Nama</th>
					<th>No Telp.</th>
					<th>Keterangan</th>
					<th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$be = mysqli_query($kon, "SELECT * FROM notelp");
					
					$no=1;
					while($r=mysqli_fetch_assoc($be)){
				?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $r["nama"];?></td>		
					<td><?= $r["telp"];?></td>					
					<td><?= $r["ket"];?></td>					
					<td>
						<a href="?module=notelpdata&aksi=editnotelp&idtelp=<?= $r['idtelp'];?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Telp</a>
					<a href="?module=notelpdata&aksi=hapusnotelp&idtelp=<?= $r['idtelp'];?>" class="btn btn-info">Hapus Telp</a> 
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
