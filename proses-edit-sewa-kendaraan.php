<div class="modal fade" id="myModal<?php echo $data['id_sewa']; ?>" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Data Sewa</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form role="form" action="proses-edit-sewa-kendaraan.php" method="post">
          <?php
          $id = $data['id_sewa'];
          $query_edit = mysqli_query($koneksi, "SELECT * FROM sewa_kendaraan WHERE id_sewa='$id'");
          while ($row = mysqli_fetch_array($query_edit)) {
          ?>
            <input type="hidden" name="id_sewa" value="<?php echo $row['id_sewa']; ?>">
            <div class="form-group">
              <label>Tgl Sewa</label>
              <input type="date" name="tgl_sewa" class="form-control" value="<?php echo $row['tgl_sewa']; ?>">
            </div>
            <div class="form-group">
              <label>Tgl Kembali</label>
              <input type="date" name="tgl_kembali" class="form-control" value="<?php echo $row['tgl_kembali']; ?>">
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="number" name="harga" class="form-control" value="<?php echo $row['harga']; ?>">
            </div>
            <div class="form-group">
              <label>Lama Sewa</label>
              <input type="number" name="lama_sewa" class="form-control" value="<?php echo $row['lama_sewa']; ?>">
            </div>
            <div class="form-group">
              <label>Merek</label>
              <select name="id_merek" class="form-control">
                <?php foreach ($brands as $brand) { ?>
                  <option value="<?= $brand['id_merek']; ?>" <?= ($row['id_merek'] == $brand['id_merek']) ? 'selected' : ''; ?>><?= $brand['merek']; ?></option>
                <?php } ?>
              </select>
            </div>
          <?php
          }
          ?>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
