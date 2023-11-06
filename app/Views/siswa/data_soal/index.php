<?= $this->extend('layouts/main_siswa'); ?>
<?= $this->section('content'); ?>

<section class="content">
    <?= $this->include('component/alerts') ?>
    <div class="card-body">
        <form action="<?= base_url('siswa/latihan/add') ?>" method="post" enctype="multipart/form-data">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> <i class="fas fa-chevron-right mx-2"></i>
                                Data Soal Latihan
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table table-bordered table-hover text-center">
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
                                                <a href="<?= base_url('siswa/latihan/' . $sLatihan['id_soal_latihan']) ?>" class="btn btn-primary btn-sm btn-circle"> <i class="nav-icon fas fa-marker"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> <i class="fas fa-chevron-right mx-2"></i>
                                Data Soal Ujian
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table table-bordered table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Materi</th>
                                        <th>Nama Ujian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $counter = 1; ?>
                                    <?php foreach ($soalUjian as $sUjian) : ?>
                                        <tr>
                                            <td><?= $counter++ ?></td>
                                            <td><?= $sUjian['nama_materi'] ?></td>
                                            <td><?= $sUjian['nama_ujian'] ?></td>
                                            <td>
                                                <a href="<?= base_url('siswa/ujian/' . $sUjian['id_soal_ujian']) ?>" class="btn btn-primary btn-sm btn-circle"> <i class="nav-icon fas fa-marker"></i>
                                                </a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('siswa/latihan') ?>" type="button" class="btn btn-warning">Kembali</a>
                </div>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var collapseButton = document.querySelector('[data-target="#collapseOne"]');
            var collapseButton = document.querySelector('[data-target="#collapseTwo"]');
            var chevronIcon = collapseButton.querySelector('i');

            collapseButton.addEventListener('click', function () {
                chevronIcon.classList.toggle('fa-chevron-right');
                chevronIcon.classList.toggle('fa-chevron-down');
            });
        });
    </script>


    <?= $this->endSection(); ?>