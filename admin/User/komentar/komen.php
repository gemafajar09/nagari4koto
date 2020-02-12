<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Komentar
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Komentar</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <!-- <a href="?module=kontak/alamat&aksi=tambahalamat" class="btn btn-flat btn-primary">Tambah Alamat</a>!-->
                    </div>
                    <div class="box-body">
                        <div class="table table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Komentar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $be = mysqli_query($kon, "SELECT * FROM komentar");

                                    $no = 1;
                                    while ($r = mysqli_fetch_assoc($be)) {
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $r["nama"]; ?></td>
                                            <td><?= $r["email"]; ?></td>
                                            <td><?= $r["komentar"]; ?></td>
                                            <td>
                                                <!-- <a href="?module=komentar/komentar&aksi=editalamat&idalamat=<?= $r['idalamat']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Alamat</a> -->
                                                <a href="?module=komentar/hapus&aksi=hapuskomentar&id=<?= $r['id']; ?>" class="btn btn-info">Hapus</a>
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