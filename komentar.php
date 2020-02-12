<div class="card">
    <div class="card-header">
        <center>Tinggalkan Komentar</center>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="">
                <tr>
                    <td>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea name="komentar" class="form-control" cols="300" rows="10"></textarea>
                    </td>
                </tr>
            </table>
            <button name="save" type="submit" class="btn btn-primary btn-block">Kirim</button>
        </form>
    </div>
</div> 

<?php
if(isset($_POST['save']))
{
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $komentar = $_POST['komentar'];
    $save = $kon->query("INSERT INTO komentar (nama,email,komentar) VALUES ('$nama','$email','$komentar')");
    if($save == TRUE)
    {
        echo "<script>alert('Terimaasih Atas Komentar Anda')</script>";
    }else{
        echo "<script>alert('Komentar Anda Ditolak')</script>";
    }

}
?>