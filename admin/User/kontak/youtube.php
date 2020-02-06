<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Youtube
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Youtube</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <!--<a href="?module=kontak/ig&aksi=tambahig" class="btn btn-flat btn-primary">Tambah Instagram</a> !-->
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Youtube</th>
                    <th>Link</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM youtube");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r["youtube"]; ?></td>
                      <td><?= $r["link"]; ?></td>
                      <td>
                        <a href="?module=kontak/youtubedata&aksi=edityoutube&idyoutube=<?= $r['idyoutube']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Youtube</a>
                        <!--<a href="?module=kontak/ig&aksi=hapusig&idig=<?= $r['idig']; ?>" class="btn btn-info">Hapus Instagram</a> !-->
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