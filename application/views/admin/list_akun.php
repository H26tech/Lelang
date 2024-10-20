<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <h2>Daftar Akun</h2>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
            <?php elseif ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
            <?php endif; ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($accounts)): ?>
                        <?php $no = 1; ?>
                        <?php foreach ($accounts as $account): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $account->nama_petugas; ?></td>
                                <td><?= $account->username; ?></td>
                                <td><?= $account->level_name ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal_<?= $account->id_petugas; ?>">Edit</button>
                                    <a href="<?= base_url('dashboard_admin/delete_akun/' . $account->id_petugas); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?');">Delete</a>
                                </td>
                            </tr>

                            <!-- Modal Edit Akun -->
                            <div class="modal fade" id="editModal_<?= $account->id_petugas; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Akun</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?= base_url('dashboard_admin/edit_akun'); ?>" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="id_petugas" value="<?= $account->id_petugas; ?>">

                                                <div class="mb-3">
                                                    <label for="nama_petugas" class="form-label">Nama Petugas</label>
                                                    <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="<?= $account->nama_petugas; ?>" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" value="<?= $account->username; ?>" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password (Kosongkan jika tidak ingin diubah)</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password baru (opsional)">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="id_level" class="form-label">Level</label>
                                                    <select class="form-control" id="id_level" name="id_level" required>
                                                        <option value="1" <?= $account->id_level == 1 ? 'selected' : ''; ?>>Administrator</option>
                                                        <option value="2" <?= $account->id_level == 2 ? 'selected' : ''; ?>>Petugas</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">Tidak ada data akun yang ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>