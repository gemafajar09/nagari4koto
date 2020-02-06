<div class="content-wrapper">
<section class="content-header">
      <h1>
      Buku Saku
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Buku Saku</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">          
              <a href="?module=bukusaku&aksi=tambahbukusaku" class="btn btn-flat btn-primary">Tambah Buku Saku</a> 
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
					$be = mysqli_query($kon, "SELECT * FROM tb_buku_saku_bawaslu");
					
					$no=1;
					while($r=mysqli_fetch_assoc($be)){
				?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $r["judul"];?></td>
          <td><a href="../../dokumen/bukusaku/<?= $r['berkas']?>"><?= $r['berkas']?></a></td>					
					<td>
						<a href="?module=bukusaku&aksi=editbukusaku&idbukusaku=<?= $r['idbukusaku'];?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Buku Saku</a>
						<a href="?module=bukusaku&aksi=hapusbukusaku&idbukusaku=<?= $r['idbukusaku'];?>" class="btn btn-info">Hapus Buku Saku</a> 
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
