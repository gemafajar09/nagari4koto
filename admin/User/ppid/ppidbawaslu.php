<div class="content-wrapper">
  <section class="content-header">
    <h1>
      PPID Bawaslu
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">PPID Bawaslu</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <a href="?module=ppid/ppid&aksi=tambahppid" class="btn btn-flat btn-primary">Tambah PPID Bawaslu</a>
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Nama File</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM tb_ppid");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r['kategori']; ?></td>
                      <td><?= $r['dokumen']; ?></td>
                      <td>
                        <a href="?module=ppid/ppid&aksi=editppid&idppid=<?= $r['id_ppid']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit PPID</a>
                        <a href="?module=ppid/ppid&aksi=hapusppid&idppid=<?= $r['id_ppid']; ?>" class="btn btn-info">Hapus PPID</a>
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