<div class="content-wrapper">
<section class="content-header">
      <h1>
      Twitter
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Twitter</li>
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
					<th>Twitter</th>
					<th>Link</th>
					<th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$be = mysqli_query($kon, "SELECT * FROM twitter");
					
					$no=1;
					while($r=mysqli_fetch_assoc($be)){
				?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $r["twitter"];?></td>					
					<td><?= $r["link"];?></td>					
					<td>
						<a href="?module=twitterdata&aksi=edittwitter&idtwitter=<?= $r['idtwitter'];?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Twitter</a>
						<!--<a href="?module=ig&aksi=hapusig&idig=<?= $r['idig'];?>" class="btn btn-info">Hapus Instagram</a> !-->
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
