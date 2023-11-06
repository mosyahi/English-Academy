<?= $this->extend('layouts/main_nilai'); ?>
<?= $this->section('content'); ?>

<section class="content py-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DATA NILAI Latihan</h3>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Nama Latihan</th>
                                    <th>Nilai Latihan</th>
                                    <th>Presensi</th>
                                    <th>Aksi</th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataNilaiLatihan as $nilai) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $nilai['namaSiswa'] ?></td>
                                    <td><?= $nilai['namaLatihan'] ?></td>
                                    <td><?= $nilai['nilaiLatihan'] ?></td>
                                    <td><?= $nilai['presensi'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-sm btn-circle">
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DATA NILAI UJIAN</h3>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Nama Ujian</th>
                                    <th>Nilai Ujian</th>
                                    <th>Presensi</th>
                                    <th>Aksi</th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($dataNilaiUjian as $nilai) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $nilai['namaSiswa'] ?></td>
                                    <td><?= $nilai['namaUjian'] ?></td>
                                    <td><?= $nilai['nilaiUjian'] ?></td>
                                    <td><?= $nilai['presensi'] ?></td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-sm btn-circle">
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