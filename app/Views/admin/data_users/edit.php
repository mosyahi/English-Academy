<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<section class="content py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit User</h3>
                    </div>
                    <form action="<?= base_url('admin/users/update/' . $user['id']) ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $user['username'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Rule</label>
                                <select name="role" class="form-control" required>
                                    <option value="">Pilih Rule</option>
                                    <option value="admin" <?= ($user['role'] == 'admin') ? 'selected' : '' ?>>Admin</option>
                                    <option value="guru" <?= ($user['role'] == 'guru') ? 'selected' : '' ?>>Guru</option>
                                    <option value="siswa" <?= ($user['role'] == 'siswa') ? 'selected' : '' ?>>Siswa</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('admin/users') ?>" type="button" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>