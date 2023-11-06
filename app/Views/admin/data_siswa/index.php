<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<section class="content py-2">
    <div class="container-fluid">
        <?= $this->include('component/alerts') ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DATA SISWA</h3>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>JK</th>
                                    <th>Tgl_Lahir</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1; ?>
                                <?php foreach ($dataSiswa as $item) : ?>
                                    <tr>
                                        <td><?= $counter++ ?></td>
                                        <td><?= $item['nama'] ?></td>
                                        <td><?= $item['nis'] ?></td>
                                        <td><?= $item['jk'] ?></td>
                                        <td><?= $item['tgl_lahir'] ?></td>
                                        <td><?= $item['alamat'] ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/siswa/edit/' . $item['id_siswa']) ?>" class="btn btn-warning btn-sm btn-circle"> <i class="nav-icon fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('admin/siswa/delete/' . $item['id_siswa']) ?>" class="btn btn-danger btn-sm btn-circle" onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">
                                                <i class="nav-icon fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>