<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Keuangan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Keuangan</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <a href="?module=tambah_keuangan&aksi=tambahkeuangan" class="btn btn-flat btn-primary">Tambah File</a>
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>File</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM tb_keuangan");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r['keuangan'] ?></td>
                      <td>
                        <a href="?module=tambah_keuangan&aksi=editkeuangan&id=<?= $r['id']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit</a>
                        <a href="?module=tambah_keuangan&aksi=hapuskeuangan&id=<?= $r['id']; ?>" class="btn btn-info">Hapus</a>
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