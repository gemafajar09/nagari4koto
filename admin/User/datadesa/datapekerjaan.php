<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Data Pekerjaan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Pekerjaan</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <a href="?module=datadesa/datapekerjaanbawaslu&aksi=tambahdata" class="btn btn-flat btn-primary">Tambah Data</a>
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Kelompok</th>
                    <th colspan="2">Jumlah</th>
                    <th colspan="2">Laki-Laki</th>
                    <th colspan="2">Perempuan</th>
                    <th rowspan="2">Aksi</th>
                  </tr>
                  <tr>
                    <td>n</td>
                    <td>%</td>
                    <td>n</td>
                    <td>%</td>
                    <td>n</td>
                    <td>%</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM datapekerjaan");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r["data_kel"]; ?></td>

                      <td><?= $r["data_jml"]; ?></td>
                      <td><?= $r["data_jml2"]; ?></td>
                      <td><?= $r["data_lk"]; ?></td>
                      <td><?= $r["data_lk2"]; ?></td>
                      <td><?= $r["data_pr"]; ?></td>
                      <td><?= $r["data_pr2"]; ?></td>

                      <td>
                        <a href="?module=datadesa/datapekerjaanbawaslu&aksi=editdata&data_id=<?= $r['data_id']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Data</a>
                        <a href="?module=datadesa/datapekerjaanbawaslu&aksi=hapusdata&data_id=<?= $r['data_id']; ?>" class="btn btn-info">Hapus Data</a>
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