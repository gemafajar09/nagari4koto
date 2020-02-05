<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Struktur Organisasi
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Struktur Organisasi</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <a href="?module=org_data&aksi=tambahorganisasi" class="btn btn-flat btn-primary">Tambah Struktur Organisasi</a>
                    </div>
                    <div class="box-body">
                        <div class="table table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $be = mysqli_query($kon, "SELECT * FROM struktur_organisasi");
                                    $no = 1;
                                    while ($r = mysqli_fetch_assoc($be)) {
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><img style="width:75px;height:75px;" src="../../asset/images/<?= $r['gambar'] ?>"></td>
                                            <td>
                                                <a href="?module=org_data&aksi=editorganisasi&id_organisasi=<?= $r['id_organisasi']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Struktur Organisasi</a>
                                                <a href="?module=org_data&aksi=hapusorganisasi&id_organisasi=<?= $r['id_organisasi']; ?>" class="btn btn-info">Hapus Struktur Organisasi</a>
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