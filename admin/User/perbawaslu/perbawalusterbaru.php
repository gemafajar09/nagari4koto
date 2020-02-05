<div class="content-wrapper">
<section class="content-header">
      <h1>
      Perbawaslu
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Perbawaslu</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">          
              <a href="?module=perbawaslu&aksi=tambahperbawaslu" class="btn btn-flat btn-primary">Tambah Perbawaslu</a> 
            </div>
           <div class="box-body">
              <div class="table table-responsive">
              <table  id="example1"  class="table table-bordered table-striped">
                <thead>
                <tr>
        					<th>No</th>
        					<th>Judul</th>
                  <th>Dokumen</th>
        					<th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$be = mysqli_query($kon, "SELECT * FROM tb_perbawaslu_terbaru");
					
					$no=1;
					while($r=mysqli_fetch_assoc($be)){
				?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $r["judul"];?></td>					
					<td><a href="../../dokumen/perbawaslu/<?= $r['berkas'] ?>"><?= $r['berkas'] ?></a></td>
					<td>
						<a href="?module=perbawaslu&aksi=editperbawaslu&idperbawaslu=<?= $r['idperbawaslu'];?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Perbawaslu</a>
						<a href="?module=perbawaslu&aksi=hapusperbawaslu&idperbawaslu=<?= $r['idperbawaslu'];?>" class="btn btn-info">Hapus Perbawaslu</a> 
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
