  <section class="content py-3">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama File</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $be = mysqli_query($kon, "SELECT * FROM tb_keuangan");

                  $no = 1;
                  while ($r = mysqli_fetch_assoc($be)) {
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $r['keuangan']; ?></td>
                      <td>
                        <a href="asset/files/<?= $r['keuangan']; ?>" class="btn btn-flat btn-primary" style="border-radius:2px;">View</a>
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