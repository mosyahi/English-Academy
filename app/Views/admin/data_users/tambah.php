<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<section class="content py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah User</h3>
                    </div>
                    <form action="<?= base_url('admin/users/add') ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="">Pilih Role</option>
                                    <option value="admin">Admin</option>
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