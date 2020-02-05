<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Alamat
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Alamat</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <!-- <a href="?module=kontak/alamat&aksi=tambahalamat" class="btn btn-flat btn-primary">Tambah Alamat</a>!-->
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM alamat");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r["alamat"]; ?></td>
                      <td>
                        <a href="?module=kontak/alamat&aksi=editalamat&idalamat=<?= $r['idalamat']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Alamat</a>
                        <!-- <a href="?module=kontak/alamat&aksi=hapusalamat&idalamat=<?= $r['idalamat']; ?>" class="btn btn-info">Hapus Alamat</a> !-->
                      </td>
                    </tr>
                  <?php $no++;
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>