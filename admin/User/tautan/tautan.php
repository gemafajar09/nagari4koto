<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tautan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Tautan</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <a href="?module=tautan/tautandata&aksi=tambahtautan" class="btn btn-flat btn-primary">Tambah Tautan</a>
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tautan</th>
                    <th>Link</th>
                    <th>Logo</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM tb_tautan");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r["judul"]; ?></td>
                      <td><?= $r["link"]; ?></td>
                      <td><img style="width:75px;height:75px;" src="../../asset/images<?= $r['gambar'] ?>"></td>
                      <td>
                        <a href="?module=tautan/tautandata&aksi=edittautan&idtautan=<?= $r['idtautan']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Tautan</a>
                        <a href="?module=tautan/tautandata&aksi=hapustautan&idtautan=<?= $r['idtautan']; ?>" class="btn btn-info">Hapus Tautan</a>
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