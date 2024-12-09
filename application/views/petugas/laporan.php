<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Laporan Barang</h4>
                            <p class="card-title-desc">DataTables example with Buttons extension.</p>

                            <!-- Tombol Full Detail -->
                            <a href="<?= base_url('Laporan/full_detail'); ?>" class="btn btn-primary mb-3">Full Detail</a>

                            <!-- Table with DataTables -->
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Awal</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($barang as $b): ?>
                                        <tr>
                                            <td><?= $b['id_barang']; ?></td>
                                            <td><?= $b['nama_barang']; ?></td>
                                            <!-- Format Harga Awal ke Rupiah -->
                                            <td><?= 'Rp ' . number_format($b['harga_awal'], 0, ',', '.'); ?></td>
                                            <td>
                                                <!-- Redirect to the new page for detail -->
                                                <a href="<?= base_url('Laporan/detail/' . $b['id_barang']); ?>" class="btn btn-info">
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
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