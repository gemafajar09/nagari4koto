<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Data Perkawinan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Perkawinan</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <a href="?module=datadesa/datakawinbawaslu&aksi=tambahdata" class="btn btn-flat btn-primary">Tambah Data</a>
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
                  $be = mysqli_query($kon, "SELECT * FROM datakawin");

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
                        <a href="?module=datadesa/datakawinbawaslu&aksi=editdata&data_id=<?= $r['data_id']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Data</a>
                        <a href="?module=datadesa/datakawinbawaslu&aksi=hapusdata&data_id=<?= $r['data_id']; ?>" class="btn btn-info">Hapus Data</a>
                      </td>
                    </tr>
                  <?php $no++;
                    $total   += $r['data_jml'];
                    $total1  += $r['data_jml2'];
                    $total2  += $r['data_lk'];
                    $total3  += $r['data_lk2'];
                    $total4  += $r['data_pr'];
                    $total5  += $r['data_pr2'];
                  } ?>
                </tbody>
                <tr>
                  <td>&nbsp</td>
                  <td>Jumlah</td>
                  <td> <?= $total ?></td>
                  <td> <?= $total1 ?></td>
                  <td> <?= $total2 ?></td>
                  <td> <?= $total3 ?></td>
                  <td> <?= $total4 ?></td>
                  <td> <?= $total5 ?></td>

                </tr>
                <tr>
                  <td>&nbsp</td>
                  <td>Belum Mengisi</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>&nbsp</td>
                  <td>Total</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>