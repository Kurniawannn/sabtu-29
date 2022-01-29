<!-- modal edit-->
<?php
        // if (isset($_POST['edit'])) {
        $id = $_GET['id'];
        $query = mysqli_query($koneksi,"SELECT * FROM petugas WHERE id_petugas ='$id'");
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

        <form  action="?page=petugas-edit-proses" method="post"> 
        <input type="hidden" name="id_petugas" value="<?php echo $row['id_petugas']; ?>">
        <div class="form-group mb-2">
            <input value="<?php echo $row['nama']; ?>" class="form-control" type="text" name="nama" placeholder="NAMA" required>
        </div>
        <div class="form-group mb-2">
            <input value="<?php echo $row['jabatan']; ?>" class="form-control" type="text" name="jabatan" placeholder="JABATAN" required>
        </div>
        <div class="form-group mb-2">
            <input value="<?php echo $row['nomor_telepon']; ?>" class="form-control" type="text" name="nomor_telepon" placeholder="NO TELP" required>
        </div>
        <div class="form-group mb-2">
            <input value="<?php echo $row['alamat']; ?>" class="form-control" type="text" name="alamat" placeholder="ALAMAT" required>
        </div>
        <div class="form-group mb-2">
            <input value="<?php echo $row['username']; ?>" class="form-control" type="text" name="username" placeholder="USERNAME" required>
        </div>
        <div class="form-group mb-2">
            <input value="<?php echo $row['password']; ?>" class="form-control" type="password" name="password" placeholder="PASSWORD" required>
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