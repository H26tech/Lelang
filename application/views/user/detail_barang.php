<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="container">
                <h2>Detail Barang Lelang</h2>

                <div class="card mb-4">
                    <img src="<?php echo base_url('uploads/' . $barang['gambar']); ?>" class="card-img-top" alt="<?php echo $barang['nama_barang']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $barang['nama_barang']; ?></h5>
                        <p class="card-text">Harga Awal: Rp <?php echo number_format($barang['harga_awal'], 0, ',', '.'); ?></p>
                        <p class="card-text">Tanggal Mulai: <?php echo date('d-m-Y', strtotime($barang['tanggal_mulai'])); ?></p>
                        <p class="card-text">Tanggal Selesai: <?php echo date('d-m-Y', strtotime($barang['tanggal_selesai'])); ?></p>
                        <p class="card-text">Bid Tertinggi Saat Ini: Rp <?php echo isset($highest_bid['bid_amount']) ? number_format($highest_bid['bid_amount'], 0, ',', '.') : 'Belum ada bid'; ?></p>

                        <!-- Display Deskripsi -->
                        <p class="card-text"><strong>Deskripsi:</strong></p>
                        <p class="card-text"><?php echo nl2br($barang['deskripsi']); ?></p>

                        <!-- Notification Section -->
                        <?php if ($this->session->flashdata('message')): ?>
                            <div class="alert alert-info" role="alert">
                                <?php echo $this->session->flashdata('message'); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Bid Form -->
                        <h5>Masukkan Tawaran Anda</h5>
                        <form method="post" action="<?php echo base_url('dashboard_user/submit_bid'); ?>">
                            <input type="hidden" name="id_barang" value="<?php echo $barang['id_barang']; ?>">
                            <div class="mb-3">
                                <label for="bid_amount" class="form-label">Tawaran Anda (Rp)</label>
                                <input type="number" class="form-control" name="bid_amount" id="bid_amount" min="<?php echo $barang['harga_awal']; ?>" placeholder="Masukkan tawaran">
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Tawaran</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
