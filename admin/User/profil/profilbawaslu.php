<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Profil
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Profil</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <!-- <a href="?module=profil/profil&aksi=tambahprofil" class="btn btn-flat btn-primary">Tambah Profil</a>!-->
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM tb_profil");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r["kategori"]; ?></td>
                      <td><?= $r["deskripsi"]; ?></td>
                      <td>
                        <a href="?module=profil/profil&aksi=editprofil&id_profil=<?= $r['id_profil']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Profil</a>
                        <!--<a href="?module=profil/profil&aksi=hapusprofil&id_profil=<?= $r['id_profil']; ?>" class="btn btn-info">Hapus Profil</a> !-->
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