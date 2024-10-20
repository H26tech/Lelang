<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="container">
                <h2>Register Admin / Petugas</h2>
                <form action="<?= base_url('Dashboard_admin/register_akun') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_petugas">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" placeholder="Masukkan Nama Lengkap" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                    </div>

                    <div class="form-group">
                        <label for="id_level">Level</label>
                        <select class="form-control" id="id_level" name="id_level" required>
                            <option value="">Pilih Level</option>
                            <?php foreach ($levels as $level): ?>
                                <option value="<?= $level->id_level ?>"><?= $level->level ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>

        </div>
    </div>
</div>