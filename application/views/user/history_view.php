<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="container">
                <h3>Riwayat Bid Pengguna</h3>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Bid Amount</th>
                                    <th>Tanggal Bid</th>
                                    <th>Status Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($history)): ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada riwayat bid untuk pengguna ini.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($history as $h): ?>
                                        <tr>
                                            <td><?= $h['id_barang']; ?></td>
                                            <td><?= $h['nama_barang']; ?></td>
                                            <td><?= $h['bid_amount']; ?></td>
                                            <td><?= date('d-m-Y H:i:s', strtotime($h['created_at'])); ?></td>
                                            <td>
                                                <!-- Menampilkan status barang: Ditutup atau Belum -->
                                                <?= $h['status'] == 'ditutup' ? '<span class="text-danger">Ditutup</span>' : '<span class=" text-success">Tersedia</span>'; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>