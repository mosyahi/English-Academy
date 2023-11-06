<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<section class="content py-2">
    <div class="container-fluid">
        <?= $this->include('component/alerts') ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DATA USER</h3>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Rule</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1; ?>
                                <?php foreach ($dataUser as $item) : ?>
                                    <tr>
                                        <td><?= $counter++ ?></td>
                                        <td><?= $item['username'] ?></td>
                                        <td><?= str_repeat('*', min(strlen($item['password']), 10)) ?></td>
                                        <td><?= $item['role'] ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/users/edit/' . $item['id']) ?>" class="btn btn-warning btn-sm btn-circle">
                                                <i class="nav-icon fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('admin/users/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm btn-circle" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                                <i class="nav-icon fas fa-trash"></i>
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
</section>
<?= $this->endSection(); ?>