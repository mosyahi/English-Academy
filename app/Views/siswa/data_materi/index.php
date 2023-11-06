<?= $this->extend('layouts/main_siswa'); ?>
<?= $this->section('content'); ?>

<section class="content py-2">
    <div class="container-fluid">
        <?= $this->include('component/alerts') ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DATA MATERI</h3>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Materi</th>
                                    <th>Deskripsi</th>
                                    <th>File Materi</th>
                                    <th>Video</th>
                                    <th>Audio</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($materi as $index => $m) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= $m['nama_materi'] ?></td>
                                        <td><?= $m['deskripsi_materi'] ?></td>
                                        <td>
                                            <?php if ($m['file_materi']) : ?>
                                                <?= $m['file_materi'] ?>
                                                <a href="<?= base_url('siswa/materi/download/' . $m['id_materi'] . '/file_materi') ?>" class="btn btn-success btn-sm btn-circle">
                                                    <i class="nav-icon fas fa-download"></i>
                                                </a>
                                                <a href="<?= base_url('siswa/open/file_materi/' . $m['file_materi']) ?>" class="btn btn-primary btn-sm btn-circle">
                                                    <i class="nav-icon fas fa-eye"></i>
                                                </a>
                                            <?php else : ?>
                                                Tidak Ada
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($m['video_materi']) : ?>
                                                <?= $m['video_materi'] ?>
                                                <a href="<?= base_url('siswa/materi/download/' . $m['id_materi'] . '/video_materi') ?>" class="btn btn-success btn-sm btn-circle">
                                                    <i class="nav-icon fas fa-download"></i>
                                                </a>
                                                <a href="<?= base_url('siswa/open/video_materi/' . $m['video_materi']) ?>" class="btn btn-primary btn-sm btn-circle">
                                                    <i class="nav-icon fas fa-eye"></i>
                                                </a>
                                            <?php else : ?>
                                                Tidak Ada
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($m['audio_materi']) : ?>
                                                <?= $m['audio_materi'] ?>
                                                <a href="<?= base_url('siswa/materi/download/' . $m['id_materi'] . '/audio_materi') ?>" class="btn btn-success btn-sm btn-circle">
                                                    <i class="nav-icon fas fa-download"></i>
                                                </a>
                                                <a href="<?= base_url('siswa/open/audio_materi/' . $m['audio_materi']) ?>" class="btn btn-primary btn-sm btn-circle">
                                                    <i class="nav-icon fas fa-eye"></i>
                                                </a>
                                            <?php else : ?>
                                                Tidak Ada
                                            <?php endif; ?>
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
