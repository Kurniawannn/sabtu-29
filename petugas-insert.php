<?php
            if (isset($_POST['save'])) {
                $nama           = $_POST['nama'];
                $jabatan        = $_POST['jabatan'];
                $nomor_telepon  = $_POST['nomor_telepon'];
                $alamat         = $_POST['alamat'];
                $username       = $_POST['username'];
                $password       = $_POST['password'];
                
                ///////////////////////////////////
                $options = [
                    'cost' => 12,
                ];
                $password_encrypt = password_hash($password, PASSWORD_BCRYPT, $options);

                ////////////////////////////////////
                $query_insert = mysqli_query($koneksi,"INSERT INTO petugas VALUES('','$nama','$jabatan','$nomor_telepon','$alamat','$username','$password_encrypt')");
        
        
        
            }if ($query_insert){
            // header('refresh:1  URL=http://localhost/16_mywebsite_12RPL2/admin.php?page=anggota');
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            BERHASIL DITAMBAHKAN
            <script>window.location.href='http://localhost/16_mywebsite_12RPL2/admin.php?page=petugas';</script>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }else{
            echo "Data Gagal Disimpan";
            }
            ?> 