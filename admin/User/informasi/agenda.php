<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Agenda
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Agenda</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <a href="?module=informasi/agendadata&aksi=tambahagenda" class="btn btn-flat btn-primary">Tambah Agenda</a>
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tempat</th>
                    <th>Waktu</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM tb_agenda");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r["judul"]; ?></td>
                      <td><?= $r["tempat"]; ?></td>
                      <td><?= $r["waktu"]; ?></td>
                      <td>
                        <a href="?module=informasi/agendadata&aksi=editagenda&idagenda=<?= $r['idagenda']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Agenda</a>
                        <a href="?module=informasi/agendadata&aksi=hapusagenda&idagenda=<?= $r['idagenda']; ?>" class="btn btn-info">Hapus Agenda</a>
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