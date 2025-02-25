<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Slider
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Slider</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <a href="?module=slider/slider&aksi=tambahslider" class="btn btn-flat btn-primary">Tambah Slider</a>
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
                  $be = mysqli_query($kon, "SELECT * FROM tb_slider");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><img style="width:75px;height:75px;" src="../../asset/images/<?= $r['gambar'] ?>"></td>
                      <td>
                        <a href="?module=slider/slider&aksi=editslider&idslider=<?= $r['idslider']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Slider</a>
                        <a href="?module=slider/slider&aksi=hapusslider&idslider=<?= $r['idslider']; ?>" class="btn btn-info">Hapus Slider</a>
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