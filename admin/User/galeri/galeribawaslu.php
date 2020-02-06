<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Galeri Bawaslu
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Galeri Bawaslu</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <a href="?module=galeri/galeri&aksi=tambahgaleri" class="btn btn-flat btn-primary">Tambah Galeri Bawaslu</a>
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Album</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM tb_galeri a JOIN tb_album b ON a.idalbum=b.idalbum ");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r['judulalbum']; ?></td>
                      <td><img style="width:75px;height:75px;" src="../../asset/images/<?= $r['foto'] ?>"></td>
                      <td>
                        <a href="?module=galeri/galeri&aksi=editgaleri&idgaleri=<?= $r['idgaleri']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Galeri</a>
                        <a href="?module=galeri/galeri&aksi=hapusgaleri&idgaleri=<?= $r['idgaleri']; ?>" class="btn btn-info">Hapus Galeri</a>
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