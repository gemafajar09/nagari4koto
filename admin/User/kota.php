<div class="content-wrapper">
<section class="content-header">
      <h1>
      Kota
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Kota</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">          
              <!--<a href="?module=kotadata&aksi=tambahkota" class="btn btn-flat btn-primary">Tambah Kota</a> !-->
            </div>
           <div class="box-body">
              <div class="table table-responsive">
              <table  id="example1"  class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>No</th>
					<th>Kota</th>
					<th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$be = mysqli_query($kon, "SELECT * FROM kota");
					
					$no=1;
					while($r=mysqli_fetch_assoc($be)){
				?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $r["namakota"];?></td>					
					<td>
						<a href="?module=kotadata&aksi=editkota&idkota=<?= $r['idkota'];?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Kota</a>
						<!--<a href="?module=kotadata&aksi=hapuskota&idkota=<?= $r['idkota'];?>" class="btn btn-info">Hapus Kota</a> !-->
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
