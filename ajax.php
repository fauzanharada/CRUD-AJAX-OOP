<?php
require_once("config/DataImplement.php");
$OOP = new DataCRUD;

switch (@$_GET['p']) {
  case 'SaveData':
    $OOP->setNama($_POST['nama']);
    $OOP->setJenkel($_POST['jenkel']);
    $OOP->setAlamat($_POST['alamat']);

    $Hasil = $OOP->InsertData();
  break;
  case 'UpdateData':
    $OOP->setNama($_GET['nama']);
    $OOP->setJenkel($_GET['jenkel']);
    $OOP->setAlamat($_GET['alamat']);

    $update = $OOP->UpdateData($_GET['idData']);
  break;
  case 'DeleteData':
    $id = $_GET['id'];
    $delete = $OOP->DeleteData($id);
  break;
  case 'Cari':
    $OOP->setNama($_GET['kataKunci']);
    ?>
    <table width="100%" class="table table-hover">
      <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <td colspan="2" align="center"><b>Action</b></td>
      </tr>
      <?php
      $Myrow = $OOP->cari();
      $no=1;
      if ($Myrow !=null) {
        foreach ($Myrow as $row):
          if($row['jenkel']=="L"){
            $jenkel = "Laki-Laki";
          }else {
            $jenkel = "Perempuan";
          }
          ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $jenkel; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td align="center">
              <!-- Modal Button -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdateData-<?php echo $row['id']; ?>">Edit</button>
              <!-- Modal Button -->
              <!-- Modal -->

              <div class="modal fade" id="UpdateData-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Data Baru</h4>
                    </div>
                    <div class="modal-body">
                      <form action="javascript:void(0)" onsubmit="hilangModal('<?php echo $row['id']; ?>');UpdateData('<?php echo $row['id']; ?>')">
                        <table width="100%">
                          <tr>
                            <input type="hidden" id="idData<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
                            <th>Nama Lengkap</th>
                            <td>:</td>
                            <td><input type="text" name="nama" id="nama<?php echo $row['id']; ?>" placeholder="Nama Lengkap" class="form-control" value="<?php echo $row['nama']; ?>"> </td>
                          </tr>
                          <tr>
                            <th>Jenis Kelamin</th>
                            <td>:</td>
                            <td>
                              <select class="form-control" id="jenkel<?php echo $row['id']; ?>">
                                <option value="L" <?php if ($row['jenkel']=="L") { echo "selected"; } ?>>Laki-Laki</option>
                                <option value="P" <?php if ($row['jenkel']=="P") { echo "selected"; } ?>>Perempuan</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <th>Alamat</th>
                            <td>:</td>
                            <td><textarea name="alamat" class="form-control" id="alamat<?php echo $row['id']; ?>"><?php echo $row['alamat']; ?></textarea>  </td>
                          </tr>
                        </table>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <script type="text/javascript">
              function hilangModal(id){
                $('#UpdateData-'+id).modal('hide');
              }

              </script>

            </td>
            <td align="center"><button type="button" onclick="DeleteData('<?php echo $row['id']; ?>')" class="btn btn-danger" name="button">Delete</button>  </td>

          </tr>
        <?php endforeach;
      }else {
        echo "
        <tr>
        <td colspan='6' align = 'center'>Data tidak ditemukan</td>
        </tr>";
      }
      ?>
    </table>
    <?php
  break;
  default:
    ?>
    <table width="100%" class="table table-hover">
      <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <td colspan="2" align="center"><b>Action</b></td>
      </tr>
      <?php
      $Myrow = $OOP->ShowData();
      $no=1;
      foreach ($Myrow as $row):
        if($row['jenkel']=="L"){
          $jenkel = "Laki-Laki";
        }else {
          $jenkel = "Perempuan";
        }
        ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $row['nama']; ?></td>
          <td><?php echo $jenkel; ?></td>
          <td><?php echo $row['alamat']; ?></td>
          <td align="center">
            <!-- Modal Button -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdateData-<?php echo $row['id']; ?>">Edit</button>
            <!-- Modal Button -->
            <!-- Modal -->

            <div class="modal fade" id="UpdateData-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Data Baru</h4>
                  </div>
                  <div class="modal-body">
                    <form action="javascript:void(0)" onsubmit="hilangModal('<?php echo $row['id']; ?>');UpdateData('<?php echo $row['id']; ?>')">
                      <table width="100%">
                        <tr>
                          <input type="hidden" id="idData<?php echo $row['id']; ?>" value="<?php echo $row['id']; ?>">
                          <th>Nama Lengkap</th>
                          <td>:</td>
                          <td><input type="text" name="nama" id="nama<?php echo $row['id']; ?>" placeholder="Nama Lengkap" class="form-control" value="<?php echo $row['nama']; ?>"> </td>
                        </tr>
                        <tr>
                          <th>Jenis Kelamin</th>
                          <td>:</td>
                          <td>
                            <select class="form-control" id="jenkel<?php echo $row['id']; ?>">
                              <option value="L" <?php if ($row['jenkel']=="L") { echo "selected"; } ?>>Laki-Laki</option>
                              <option value="P" <?php if ($row['jenkel']=="P") { echo "selected"; } ?>>Perempuan</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <th>Alamat</th>
                          <td>:</td>
                          <td><textarea name="alamat" class="form-control" id="alamat<?php echo $row['id']; ?>"><?php echo $row['alamat']; ?></textarea>  </td>
                        </tr>
                      </table>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <script type="text/javascript">
            function hilangModal(id){
              $('#UpdateData-'+id).modal('hide');
            }

            </script>

          </td>
          <td align="center"><button type="button" onclick="DeleteData('<?php echo $row['id']; ?>')" class="btn btn-danger" name="button">Delete</button>  </td>

        </tr>
      <?php endforeach; ?>
    </table>

    <?php
  break;
}
?>
