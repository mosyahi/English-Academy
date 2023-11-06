<?= $this->extend('layouts/main_guru'); ?>
<?= $this->section('content'); ?>

<section class="content py-2">
    <div class="container-fluid">
        <?= $this->include('component/alerts') ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DATA LATIHAN</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Materi</th>
                                    <th>Nama Latihan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1; ?>
                                <?php foreach ($soalLatihan as $sLatihan) : ?>
                                    <tr>
                                        <td><?= $counter++ ?></td>
                                        <td><?= $sLatihan['nama_materi'] ?></td>
                                        <td><?= $sLatihan['nama_latihan'] ?></td>
                                        <td>
                                            <a href="<?= base_url('guru/latihan/lihat/' . $sLatihan['id_soal_latihan']) ?>" class="btn btn-primary btn-sm btn-circle"> <i class="nav-icon fas fa-eye"></i>
                                            </a>
                                            <a href="<?= base_url('guru/latihan/edit/' . $sLatihan['id_soal_latihan']) ?>"
                                            class="btn btn-warning btn-sm btn-circle"> <i
                                                class="nav-icon fas fa-edit"></i></a>
                                                <a href="<?= base_url('guru/latihan/delete/' . $sLatihan['id_soal_latihan']) ?>" class="btn btn-danger btn-sm btn-circle" onclick="return confirm('Apakah Anda yakin ingin menghapus data latihan ini?')">
                                                    <i class="nav-icon fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?= $this->endSection(); ?>