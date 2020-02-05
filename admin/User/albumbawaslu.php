<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Album Bawaslu
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Album Bawaslu</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <a href="?module=album&aksi=tambahalbum" class="btn btn-flat btn-primary">Tambah Album Bawaslu</a>
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul Album</th>
                    <th>Cover Album</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM tb_album");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r["judulalbum"]; ?></td>
                      <td><img style="width:50px;height:50px;" src="../../asset/images/<?= $r["coverlbum"]; ?>">
                      </td>
                      <td>
                        <a href="?module=album&aksi=editalbum&idalbum=<?= $r['idalbum']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Album</a>
                        <a href="?module=album&aksi=hapusalbum&idalbum=<?= $r['idalbum']; ?>" class="btn btn-info">Hapus Album</a>
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