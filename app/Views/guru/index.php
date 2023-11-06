<?= $this->extend('layouts/main_guru'); ?>
<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content" >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= count($materi) ?></h3>
                        <p>Data Materi</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-file"></i>
                    </div>
                    <a href="<?= base_url('guru/materi') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= count($latihan) ?></h3>
                        <p>Data Soal Latihan</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-marker"></i>
                    </div>
                    <a href="<?= base_url('guru/latihan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3><?= count($ujian) ?></h3>
                        <p>Data Soal Ujian</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-marker"></i>
                    </div>
                    <a href="<?= base_url('guru/ujian') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= count($cLatihan) ?> - <?= count($cUjian) ?></h3>
                        <p>Nilai Latihan - Nilai Ujian</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fas fa-poll-h"></i>
                    </div>
                    <a href="<?= base_url('guru/nilai') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <?= $this->endSection(); ?>