<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Detail Laporan Barang</h4>
                            <p><strong>Nama Barang:</strong> <?= htmlspecialchars($barang['nama_barang']); ?></p>
                            <p><strong>Harga Awal:</strong> <?= 'Rp ' . number_format($barang['harga_awal'], 0, ',', '.'); ?></p>

                            <h5>Detail Bid</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Bidder</th>
                                        <th>Bid Amount</th>
                                        <th>Date</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($bids)): ?>
                                        <?php foreach ($bids as $bid): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($bid['nama_lengkap']); ?></td>
                                                <td><?= 'Rp ' . number_format($bid['bid_amount'], 0, ',', '.'); ?></td>
                                                <td><?= htmlspecialchars($bid['created_at']); ?></td>
                                                <td><?= htmlspecialchars($bid['telp']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data bid</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>