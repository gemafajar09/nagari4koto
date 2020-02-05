<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Email
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Email</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <!--<a href="?module=kontak/email&aksi=tambahemail" class="btn btn-flat btn-primary">Tambah Email</a> !-->
          </div>
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM email");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r["email"]; ?></td>
                      <td>
                        <a href="?module=kontak/email&aksi=editemail&idemail=<?= $r['idemail']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">Edit Email</a>
                        <!--<a href="?module=kontak/email&aksi=hapusemail&idemail=<?= $r['idemail']; ?>" class="btn btn-info">Hapus Email</a> !-->
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