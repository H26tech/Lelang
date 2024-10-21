<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="container">
                <h2>Data Barang Lelang</h2>

                <?php if ($this->session->flashdata('message')): ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                <?php endif; ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga Awal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($barang as $item): ?>
                            <tr>
                                <td><?php echo $item['nama_barang']; ?></td>
                                <td><?php echo $item['harga_awal']; ?></td>
                                <td><?php echo ucfirst($item['status']); ?></td>
                                <td>
                                    <a href="<?php echo base_url('dashboard_petugas/edit_barang/' . $item['id_barang']); ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?php echo base_url('dashboard_petugas/hapus_barang/' . $item['id_barang']); ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>