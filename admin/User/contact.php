<?php
  $contact = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM contact"));

  if(isset($_POST['save'])){
    mysqli_query($con, "UPDATE contact SET website='$_POST[website]', fb='$_POST[fb]', twitter='$_POST[twitter]', ig='$_POST[ig]', alamat='$_POST[alamat]', telp='$_POST[telp]', email='$_POST[email]'");
    echo "<META HTTP-EQUIV='Refresh' Content='0; URL=?module=contact'>";
  }
?>
<div class="content-wrapper">
<section class="content-header">
      <h1>
        Contact
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Contact</li>
      </ol>
</section>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="website" class="col-sm-1 control-label">Website</label>
                      <div class="col-sm-8">
                        <input type="text" name="website" id="website" value="<?= $contact['website'] ?>" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="fb" class="col-sm-1 control-label">Facebook</label>
                      <div class="col-sm-8">
                        <input type="text" name="fb" id="fb" value="<?= $contact['fb'] ?>" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="twitter" class="col-sm-1 control-label">Twitter</label>
                      <div class="col-sm-8">
                        <input type="text" name="twitter" id="twitter" value="<?= $contact['twitter'] ?>" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="ig" class="col-sm-1 control-label">Instagram</label>
                      <div class="col-sm-8">
                        <input type="text" name="ig" id="ig" value="<?= $contact['ig'] ?>" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-1 control-label">Alamat</label>
                      <div class="col-sm-8">
                        <textarea type="text" name="alamat" class="form-control"><?= $contact['alamat'] ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="telp" class="col-sm-1 control-label">Telepon</label>
                      <div class="col-sm-8">
                        <input type="text" name="telp" id="telp" value="<?= $contact['telp'] ?>" onkeypress="return hanyaAngka(event)" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email" class="col-sm-1 control-label">Email</label>
                      <div class="col-sm-8">
                        <input type="email" name="email" id="email" value="<?= $contact['email'] ?>" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-4 col-md-offset-1">
                        <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                      </div>
                    </div>
                  </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          </div>
          <!-- /.box -->
     </section>
      </div>
