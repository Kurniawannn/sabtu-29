  <h1 class="text-white" align=center>DATA ANGGOTA</h1>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputmodal">
  Tambah Data
</button>
<br>
<br>
<table class="table table-dark striped">
    
    <tr class="text-center">
        <th>NO</th>
        <th>NIS</th>
        <th>NAMA</th>
        <th>JK</th>
        <th>TEMPAT LAHIR</th>
        <th>TANGGAL LAHIR</th>
        <th>KELAS</th>
        <th>JURUSAN</th>
        <th>NO TELEPON</th>
        <th>ALAMAT</th>
        <th>ACTION</th>
    </tr>
    <?PHP
    $no =1;
    $query = mysqli_query($koneksi,"SELECT * FROM anggota");
    foreach ($query as $row ) {
  
    ?>
    <tr >
        <td class="text-center" valign=middle><?php echo $no?></td>
        <td class="text-center" valign=middle><?php echo $row['nis']?></td>
        <td valign=middle><?php echo $row['nama']?></td>
        <td class="text-center" valign=middle><?php echo $row['jk']?></td>
        <td class="text-center" valign=middle><?php echo $row['tempat_lahir']?></td>
        <td class="text-center" valign=middle><?php echo $row['tgl_lahir']?></td>
        <td class="text-center" valign=middle><?php echo $row['id_kelas']?></td>
        <td valign=middle>
        <?php
        if ($row['id_jurusan']=='1') {
            echo "Rekayasa Perangkat Lunak";
        }elseif ($row['id_jurusan']=='2') {
            echo "Teknik Kendaraan Ringan ";
        }elseif ($row['id_jurusan']=='3') {
            echo "Teknik Instalasi Tenaga Listrik";
        }elseif ($row['id_jurusan']=='4') {
            echo "Teknik Audio Video";
        }
        ?>
        <?php echo $row['id_jurusan']?>
        </td>
        <td class="text-center" valign=middle><?php echo $row['no_telepon']?></td>
        <td valign=middle><?php echo $row['alamat']?></td>        
        <td class="text-center" valign=middle>
        <a href="?page=anggota-delete&hapus&id=<?php echo $row['id_anggota']; ?>">
        <button class="btn btn-danger" ><i class="far fa-trash-alt"></i></button></a>
        <a href="?page=anggota-edit&edit&id=<?php echo $row['id_anggota']; ?>">
        <button  class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="edit-Modal"><i class="fas fa-edit"></i></button></a>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>

</table>


<!-- Modal input -->
<div class="modal fade" id="inputmodal" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inputModalLabel">Form Input Data Anggota</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form  action="?page=anggota-insert" method="post"> 
        <div class="formm-group mb-2">
            <input class="form-control" type="text" name="nis" placeholder="Masukkan NIS" required>
        </div>
        <div class="form-group mb-2">
            <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama" required>
        </div>
        <div class="from-group ">
            <select class="form-control" name="jk" required >
            <option value="">-Pilih Jenis Kelamin-</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="input-group mb-2">
        <span class="input-group-text">Tempat Lahir</span>
            <input class="form-control" type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
        </div>
        <div class="input-group mb-2">
        <span class="input-group-text">Tanggal Lahir</span>
            <input class="form-control" type="date" name="tgl_lahir" placeholder="Masukkan Tgl Lahir" required>
        </div>

        <div class="form-group mb-2">
           <select class="form-control" name="id_kelas" placeholder="Masukkan Kelas" required>
           <option value="">-Pilih Kelas-</option>
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
           <select class="form-control" name="id_jurusan" placeholder="JURUSAN" required >
           <option value="">-Pilih Jurusan-</option>
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
            <input class="form-control" type="text" name="no_telepon" placeholder="Masukkan No Telp" required>
        </div>
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="alamat" required></textarea>
            <label for="floatingTextarea2">Alamat</label>
        </div>

            

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end modal input-->
