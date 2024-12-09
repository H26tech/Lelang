<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input Barang</h4>
                    <?php echo form_open_multipart('lelang/store_barang'); ?>

                    <div class="mb-3 row">
                        <label for="nama_barang" class="col-md-2 col-form-label">Nama Barang</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="nama_barang" value="<?php echo set_value('nama_barang'); ?>" required>
                        </div>
                    </div><!-- end row -->

                    <div class="mb-3 row">
                        <label for="tanggal_mulai" class="col-md-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="tanggal_mulai" value="<?php echo set_value('tanggal_mulai'); ?>" required>
                        </div>
                    </div><!-- end row -->

                    <div class="mb-3 row">
                        <label for="tanggal_selesai" class="col-md-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" name="tanggal_selesai" value="<?php echo set_value('tanggal_selesai'); ?>" required>
                        </div>
                    </div><!-- end row -->

                    <div class="mb-3 row">
                        <label for="harga_awal" class="col-md-2 col-form-label">Harga Awal</label>
                        <div class="col-md-10">
                            <input class="form-control" type="number" name="harga_awal" step="0.01" value="<?php echo set_value('harga_awal'); ?>" required>
                        </div>
                    </div><!-- end row -->

                    <div class="mb-3 row">
                        <label for="status" class="col-md-2 col-form-label">Status</label>
                        <div class="col-md-10">
                            <select class="form-control" name="status">
                                <option value="dibuka" <?php echo set_select('status', 'dibuka'); ?>>Dibuka</option>
                                <option value="ditutup" <?php echo set_select('status', 'ditutup'); ?>>Ditutup</option>
                            </select>
                        </div>
                    </div><!-- end row -->

                    <div class="mb-3 row">
                        <label for="gambar" class="col-md-2 col-form-label">Gambar</label>
                        <div class="col-md-10">
                            <input class="form-control" type="file" name="gambar" required>
                        </div>
                    </div><!-- end row -->
                    
                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-md-2 col-form-label">Deskripsi</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="deskripsi" required><?php echo set_value('deskripsi'); ?></textarea>
                        </div>
                    </div><!-- end row -->


                    <div class="mb-3 row">
                        <div class="col-md-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div><!-- end row -->

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>