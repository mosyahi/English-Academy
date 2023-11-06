<?= $this->extend('layouts/main_siswa') ?>

<?= $this->section('content') ?>
<section class="content py-2">
    <div class="container-fluid">
        <?= $this->include('component/alerts') ?>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Nama Siswa</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body text-center">
                     <h5><?= $namaSiswa ?></h5>
                 </div>
             </div>
         </div>
         <div class="col-md-4">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Nama Latihan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body text-center">
                    <h5><?= $latihan['nama_latihan'] ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Nilai Latihan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body text-center">
                    <h5><?= number_format($hasilEvaluasi['nilai'], 2); ?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">Jawaban</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach ($hasilEvaluasi['jawaban'] as $key => $value) : ?>
                            <div class="col-4">
                                <label for="<?= $key; ?>"><?= $key; ?>:</label>
                                <input class="form-control" type="text" id="jawaban_<?= $key; ?>" name="jawaban_<?= $key; ?>" value="<?= $value; ?>" disabled>
                                <br>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a href="<?= base_url('siswa/soal_siswa') ?>" type="button" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?= $this->endSection() ?>
