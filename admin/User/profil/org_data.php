<?php
include '../koneksi.php';
?>
<div class="content-wrapper">
    <?php
    if (isset($_GET['aksi'])) {
        $aksi = $_GET['aksi'];

        switch ($aksi) {
            case "tambahorganisasi":

                if (isset($_POST['save1'])) {

                    $lokasi_file = $_FILES['fupload']['tmp_name'];
                    $nama_file = $_FILES['fupload']['name'];
                    if (!empty($lokasi_file)) {
                        move_uploaded_file($lokasi_file, "../../asset/images/" . $nama_file);
                    }

                    $save = mysqli_query($kon, "INSERT INTO struktur_organisasi (gambar) VALUES ('$nama_file')");
                    if ($save) {
                        echo "<script>
            alert('Tambah Data Berhasil');
            window.location='?module=profil/org';
            </script>";
                        exit;
                    } else {
                        echo "<script>alert('Gagal');
            </script>";
                    }
                }
    ?>
                <section class="content-header">
                    <h1>
                        Struktur Organisasi
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Tambah Struktur Organisasi</li>
                    </ol>
                </section>
                <!-- Content Header (Page header) -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-info">
                                <div class="box-header with-border">

                                </div>
                                <!-- form start -->
                                <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="col-sm-12">



                                            <div class="form-group">
                                                <label for="des" class="col-sm-2 control-label">Gambar</label>
                                                <div class="col-sm-8">
                                                    <input name="fupload" id="fupload" type="file" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-md-offset-2">
                                                    <button type="submit" name="save1" class="btn btn-primary btn-flat">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>


            <?php
                break;
            case "editorganisasi":
                if (isset($_GET['id_organisasi'])) {
                    $sql = mysqli_query($kon, "SELECT * FROM Struktur_organisasi where id_organisasi='$_GET[id_organisasi]'");
                    $data = mysqli_fetch_assoc($sql);
                }
                if (isset($_POST['save'])) {

                    $lokasi_file = $_FILES['fupload']['tmp_name'];
                    $nama_file = $_FILES['fupload']['name'];
                    if (!empty($lokasi_file)) {
                        move_uploaded_file($lokasi_file, "../../asset/images/" . $nama_file);
                    } else {
                        $nama_file = $_POST["fuploadlama"];
                    }

                    $save = mysqli_query($kon, "UPDATE struktur_organisasi set gambar='$nama_file' where id_organisasi='$_GET[id_organisasi]'");
                    if ($save) {
                        echo "<script>
            alert('Edit Data Berhasil');
            window.location='?module=profil/org';
            </script>";
                    } else {
                        echo "<script>alert('Gagal');
            </script>";
                    }
                }
            ?>
                <section class="content-header">
                    <h1>
                        Struktur Organisasi
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Edit Struktur Organisasi</li>
                    </ol>
                </section>

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-info">
                                <div class="box-header with-border">

                                </div>

                                <!-- form start -->
                                <form method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="col-sm-12">

                                            <input name="id_organisasi" type="hidden" id="des" class="form-control" value="<?= $data['id_organisasi'] ?>">


                                            <div class="form-group">
                                                <label for="des" class="col-sm-2 control-label">Gambar</label>
                                                <div class="col-sm-8">
                                                    <input name="fupload" id="fupload" type="file" class="form-control">
                                                    <input name="fuploadlama" id="fupload" type="hidden" class="form-control" value="<?= $data['gambar'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-md-offset-2">
                                                    <button type="submit" name="save" class="btn btn-primary btn-flat">Simpan</button>
                                                    <a href="?module=profil/organisasi" class="btn btn-primary btn-flat">Kembali</a>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
                break;
            case "hapusorganisasi":

                if (isset($_GET['id_organisasi'])) {
                    $lihat = mysqli_fetch_assoc(mysqli_query($kon, "SELECT * FROM struktur_organisasi where id_organisasi='$_GET[id_organisasi]'"));

                    $del = mysqli_query($kon, "DELETE FROM struktur_organisasi where id_organisasi='$_GET[id_organisasi]'");
                    if ($del) {
                        echo
                            "<script>
                                alert('Data Berhasil Dihapus');
                                window.location='index.php?module=profil/org';
                            </script>";
                    } else {
                        echo
                            "<script>
                                alert('Data Gagal Dihapus');
                                window.location='index.php?module=profil/org';
                            </script>";
                    }
                }
            ?>
    <?php
                break;
        }
    }
    ?>
</div>