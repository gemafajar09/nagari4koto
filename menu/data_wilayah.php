<div class="card">
    <div class="card-header">
        <h3 class="card-title"><center>Data Wilayah Administratif</center></h3>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover table-responsive" style="font-size:13px">
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
            <?php
                $data = $kon->query("SELECT * FROM dataadmin");
            ?>
            <tbody>
                <?php foreach($data as $i => $a)
                {
                ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= $a["admin_nama"]; ?></td>
                    <td><?= $a["admin_kepdus"]; ?></td>
                    <td><?= $a["admin_rt"]; ?></td>
                    <td><?= $a["admin_kk"]; ?></td>
                    <td><?= $a["admin_jiwa"]; ?></td>
                    <td><?= $a["admin_jekel1"]; ?></td>
                    <td><?= $a["admin_jekel2"]; ?></td>
                </tr>
            <?php 
                    @$total  += $a['admin_rt'];
                    @$total1 += $a['admin_kk'];
                    @$total2 += $a['admin_jiwa'];
                    @$total3 += $a['admin_jekel1'];
                    @$total4 += $a['admin_jekel2'];
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
