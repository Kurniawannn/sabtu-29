<!-- modal edit-->
<?php
        // if (isset($_POST['edit'])) {
        $id = $_GET['id'];
        $query = mysqli_query($koneksi,"SELECT * FROM anggota WHERE id_anggota ='$id'");
        foreach ($query as $row){
    ?>
    <script>
        $(document).ready(function(){
            $("#edit-modal").modal('show');
        });
    </script>
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form edit Data Anggota</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form  action="?page=anggota-edit-proses" method="post"> 
        <input type="hidden" name="id_anggota" value="<?php echo $row['id_anggota']; ?>">
        <div class="formm-group mb-2">
            <input value="<?php echo $row['nis']; ?>" class="form-control" type="text" name="nis" placeholder="NIS" required>
        </div>
        <div class="form-group mb-2">
            <input value="<?php echo $row['nama']; ?>" class="form-control" type="text" name="nama" placeholder="NAMA" required>
        </div>
        <div class="from-group ">
            <select value="<?php echo $row['jk']; ?>" class="form-control" name="jk" required >
            <option value="<?php echo $row['jk']; ?>">
                <?php
                        if ($row['jk'] =='L') {
                            echo "Laki-Laki";
                        }else {
                            echo "Perempuan";
                        }
                ?>
            </option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="input-group mb-2">
        <span class="input-group-text">Tempat Lahir</span>
            <input value="<?php echo $row['tempat_lahir']; ?>" class="form-control" type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
        </div>
        <div class="input-group mb-2">
        <span class="input-group-text">Tanggal Lahir</span>
            <input value="<?php echo $row['tgl_lahir']; ?>" class="form-control" type="date" name="tgl_lahir" placeholder="TANGGAL LAHIR" required>
        </div>
        <div class="form-group mb-2">
           <select value="<?php echo $row['id_kelas']; ?>" class="form-control" name="id_kelas" placeholder="Masukkan Kelas" required>
            <?php
            $query_kelas = mysqli_query($koneksi,"SELECT * FROM kelas");
            foreach ($query_kelas as $kelas){
                ?>
                    <option value="<?php echo $kelas['id_kelas']?>"><?php echo $kelas['nama_kelas'] ?></option>
                <?php
            }
            ?>
            </select>
        </div>
        <div class="form-group mb-2">
           <select value="<?php echo $row['id_jurusan']; ?>" class="form-control" name="id_jurusan" placeholder="JURUSAN" required >
           <?php
            $query_jurusan = mysqli_query($koneksi,"SELECT * FROM jurusan");
            foreach ($query_jurusan as $jurusan){
                ?>
                    <option value="<?php echo $jurusan['id_jurusan']?>"><?php echo $jurusan['nama_jurusan'] ?></option>
                <?php
            }
            ?>
            </select>
        </div>
        <div class="from-group mb-2">
            <input value="<?php echo $row['no_telepon']; ?>" class="form-control" type="text" name="no_telepon" placeholder="NO TELEPON" required>
        </div>
        <div class="form-floating">
            <textarea  class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="alamat" required><?php echo $row['alamat']; ?></textarea>
            <label for="floatingTextarea2">Alamat</label>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
}
?>