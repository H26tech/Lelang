<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Full Detail Laporan Barang</h4>
                            <p>Menampilkan seluruh data barang dan bid yang terkait.</p>
                            <a href="<?= base_url('laporan/export_to_csv'); ?>" class="btn btn-success">Download Excel (CSV)</a>

                            <!-- Tabel untuk menampilkan seluruh barang dan bid menggunakan DataTables -->
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Awal</th>
                                        <th>Bidder</th>
                                        <th>Bid Amount</th>
                                        <th>Tanggal Bid</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($barang as $b): ?>
                                        <?php
                                        // Filter bid yang terkait dengan barang ini
                                        $filtered_bids = array_filter($bids, function ($bid) use ($b) {
                                            return $bid['id_barang'] == $b['id_barang'];
                                        });
                                        ?>

                                        <!-- Menampilkan tiap bid yang terkait dengan barang ini -->
                                        <?php foreach ($filtered_bids as $bid): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($b['id_barang']); ?></td>
                                                <td><?= htmlspecialchars($b['nama_barang']); ?></td>
                                                <!-- Format Harga Awal ke Rupiah -->
                                                <td><?= 'Rp ' . number_format($b['harga_awal'], 0, ',', '.'); ?></td>
                                                <td><?= htmlspecialchars($bid['nama_lengkap']); ?></td>

                                                <!-- Memeriksa apakah bid ini adalah bid tertinggi untuk barang ini -->
                                                <td>
                                                    <?php if ($bid['bid_amount'] == $max_bid_per_barang[$b['id_barang']]): ?>
                                                        <strong><?= 'Rp ' . number_format($bid['bid_amount'], 0, ',', '.'); ?></strong> <!-- Bid tertinggi ditampilkan tebal -->
                                                    <?php else: ?>
                                                        <?= 'Rp ' . number_format($bid['bid_amount'], 0, ',', '.'); ?> <!-- Bid biasa -->
                                                    <?php endif; ?>
                                                </td>

                                                <td><?= htmlspecialchars($bid['created_at']); ?></td>
                                                <td><?= htmlspecialchars($bid['telp']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery, Bootstrap JS, DataTables JS, and DataTables Buttons JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable with multi-column sorting
        $('#datatable-buttons').DataTable({
            dom: 'Bfrtip', // Menentukan tempat tombol-tombol berada
            buttons: [{
                extend: 'csvHtml5',
                text: 'Download CSV', // Teks tombol untuk unduh CSV
                title: 'Laporan Barang', // Nama file saat diunduh
            }],
            responsive: true, // Menjadikan tabel responsif
            order: [
                [2, 'asc'],
                [4, 'desc']
            ], // Urutkan berdasarkan harga_awal dan bid_amount
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json' // Pengaturan bahasa (optional)
            }
        });
    });
</script>