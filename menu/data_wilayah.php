<div class="card">
    <div class="card-header">
        <h3 class="card-title"><center>Data Wilayah Administratif</center></h3>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover" style="font-size:13px">
            <thead>
                <tr>
                    <td>NO</td>
                    <td>Nama Kelurahan</td>
                    <td>Nama Kepala Kelurahan</td>
                    <td>Jumlah RT</td>
                    <td>Jumlah KK</td>
                    <td>Jumlah Jiwa</td>
                    <td>Laki-laki</td>
                    <td>Perempuan</td>
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
                    </tr>
                  <?php $no++;
                    @$total  += $r['admin_rt'];
                    @$total1 += $r['admin_kk'];
                    @$total2 += $r['admin_jiwa'];
                    @$total3 += $r['admin_jekel1'];
                    @$total4 += $r['admin_jekel2'];
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
