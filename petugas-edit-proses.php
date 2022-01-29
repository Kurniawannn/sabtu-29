<?php
        $id_petugas     = $_POST['id_petugas'];
        $nama           = $_POST['nama'];
        $jabatan        = $_POST['jabatan'];
        $nomor_telepon  = $_POST['nomor_telepon'];
        $alamat         = $_POST['alamat'];
        $username       = $_POST['username'];
        $password       = $_POST['password'];

        /////////////////////////
        // $options = [
        //     'cost' => 12,
        // ];
        // $password_encrypt = password_hash($password, PASSWORD_BCRYPT, $options);
        ////////////////////////
    $query_update = mysqli_query($koneksi,"UPDATE petugas
    SET nama ='$nama', jabatan ='$jabatan', nomor_telepon ='$nomor_telepon', alamat ='$alamat', username ='$username', password ='$password'
    WHERE id_petugas='$id_petugas'
    ");
    if ($query_update) {
        ?>
        <script>
            alert('data berhasil di ubah');
            window.location.href='http://localhost/16_mywebsite_12RPL2/admin.php?page=petugas';
        </script>
        <?php
        
    }else
    {
        ?>
            <div class="alert alert-danger">
                Data GAGAL Diupdate !!!!!!!!!
            </div>
        <?php
    }

?>
