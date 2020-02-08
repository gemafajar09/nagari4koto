<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Data Wilayah Administratif
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Wilayah Administratif</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <a href="?module=datadesa/dataadminbawaslu&aksi=tambahadmin" class="btn btn-flat btn-primary">Tambah Data</a>
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Dusun</th>
                    <th>Nama Kepala Dusun</th>
                    <th>Jumlah RT</th>
                    <th>Jumlah KK</th>
                    <th>Jumlah Jiwa</th>
                    <th>Laki-Laki</th>
                    <th>Perempuan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>


                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM dataadmin");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r["admin_nama"]; ?></td>
                      <td><?= $r["admin_kepdus"]; ?></td>
                      <td><?= $r["admin_rt"]; ?></td>
                      <td><?= $r["admin_kk"]; ?></td>
                      <td><?= $r["admin_jiwa"]; ?></td>
                      <td><?= $r["admin_jekel1"]; ?></td>
                      <td><?= $r["admin_jekel2"]; ?></td>
                      <td>
                        <a href="?module=datadesa/dataadminbawaslu&aksi=editdata&admin_id=<?= $r['admin_id']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Data</a>
                        <a href="?module=datadesa/dataadminbawaslu&aksi=hapusdata&admin_id=<?= $r['admin_id']; ?>" class="btn btn-info">Hapus Data</a>
                      </td>
                    </tr>
                  <?php $no++;
                    $total  += $r['admin_rt'];
                    $total1 += $r['admin_kk'];
                    $total2 += $r['admin_jiwa'];
                    $total3 += $r['admin_jekel1'];
                    $total4 += $r['admin_jekel2'];
                  } ?>
                </tbody>
                <tr>
                  <td colspan="3" align="right"><b>Total</b></td>
                  <td> <?= $total ?> </td>
                  <td> <?= $total1 ?> </td>
                  <td> <?= $total2 ?> </td>
                  <td> <?= $total3 ?> </td>
                  <td> <?= $total4 ?> </td>

                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>