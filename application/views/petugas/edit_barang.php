<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="container">
                <h2>Edit Barang Lelang</h2>

                <?php echo validation_errors(); ?>

                <form action="<?php echo base_url('dashboard_petugas/update_barang/' . $barang['id_barang']); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" value="<?php echo $barang['nama_barang']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="harga_awal">Harga Awal</label>
                        <input type="text" name="harga_awal" class="form-control" value="<?php echo $barang['harga_awal']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="dibuka" <?php echo $barang['status'] == 'dibuka' ? 'selected' : ''; ?>>Dibuka</option>
                            <option value="ditutup" <?php echo $barang['status'] == 'ditutup' ? 'selected' : ''; ?>>Ditutup</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>

        </div>
    </div>
</div>