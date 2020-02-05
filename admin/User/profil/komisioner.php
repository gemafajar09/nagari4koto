<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Komisioner Bawaslu
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Komisioner Bawaslu</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <a href="?module=komisionerdata&aksi=tambahkom" class="btn btn-flat btn-primary">Tambah Komisioner</a>
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM tb_komisioner");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><img style="width:75px;height:75px;" src="../../asset/images/<?= $r['foto'] ?>"></td>
                      <td><?= $r['dll']; ?></td>

                      <td>
                        <a href="?module=komisionerdata&aksi=editkom&idkomisioner=<?= $r['idkomisioner']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Komisioner</a>
                        <a href="?module=komisionerdata&aksi=hapuskom&idkomisioner=<?= $r['idkomisioner']; ?>" class="btn btn-info">Hapus Komisioner</a>
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