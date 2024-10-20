<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h2>Data Barang </h2>
            <?php echo form_open_multipart('lelang/store_barang'); ?>

            <label for="nama_barang">Nama Barang:</label>
            <input type="text" name="nama_barang" value="<?php echo set_value('nama_barang'); ?>" required>

            <label for="tanggal_mulai">Tanggal Mulai:</label>
            <input type="date" name="tanggal_mulai" value="<?php echo set_value('tanggal_mulai'); ?>" required>

            <label for="tanggal_selesai">Tanggal Selesai:</label>
            <input type="date" name="tanggal_selesai" value="<?php echo set_value('tanggal_selesai'); ?>" required>

            <label for="harga_awal">Harga Awal:</label>
            <input type="number" name="harga_awal" step="0.01" value="<?php echo set_value('harga_awal'); ?>" required>

            <label for="status">Status:</label>
            <select name="status">
                <option value="dibuka" <?php echo set_select('status', 'dibuka'); ?>>Dibuka</option>
                <option value="ditutup" <?php echo set_select('status', 'ditutup'); ?>>Ditutup</option>
            </select>

            <label for="gambar">Gambar:</label>
            <input type="file" name="gambar" required>
            <!-- <label for="history">History:</label>
            <textarea name="history"><?php echo set_value('history'); ?></textarea> -->
            <button type="submit">Submit</button>
            <?php echo form_close(); ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Input barang</h4>
                    <div class="mb-3 row">
                        <label for="nama_barang" class="col-md-2 col-form-label">Nama Barang</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" value=" kale" id="example-text-input" fdprocessedid="u2d4qg">
                        </div>
                    </div><!-- end row -->
                    <div class="mb-3 row">
                        <label for="example-date-input" class="col-md-2 col-form-label">Date</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                        </div>
                    </div><!-- end row -->
                    <div class="mb-3 row">
                        <label for="example-date-input" class="col-md-2 col-form-label">Date</label>
                        <div class="col-md-10">
                            <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                        </div>
                    </div><!-- end row -->
                    <div class="mb-3 row">
                        <label for="example-time-input" class="col-md-2 col-form-label">Time</label>
                        <div class="col-md-10">
                            <input class="form-control" type="time" value="13:45:00" id="example-time-input">
                        </div>
                    </div><!-- end row -->
                    <div class="mb-3 row">
                        <label for="nama_barang" class="col-md-2 col-form-label">Harga awal</label>
                        <div class="col-md-10">
                            <input class="form-control" type="number" value=" kale" id="example-text-input" fdprocessedid="u2d4qg">
                        </div>
                    </div><!-- end row -->
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Select</label>
                        <div class="col-md-10">
                            <select class="form-control" fdprocessedid="b883y">
                                <option>Select</option>
                                <option>Large select</option>
                                <option>Small select</option>
                            </select>
                        </div>
                    </div><!-- end row -->

                </div>
            </div>
            <!-- End Form Section -->
        </div> <!-- container-fluid -->
    </div> <!-- End Page-content -->
</div>