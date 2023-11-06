<?= $this->extend('layouts/main_guru'); ?>
<?= $this->section('content'); ?>

<section class="content py-2">
    <?= $this->include('component/alerts') ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Ujian</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputPassword1">Nama Ujian</label>
                <input type="text" name="nama_ujian" class="form-control" value="<?= $ujian['nama_ujian'] ?>"
                readonly>
            </div>
            <div class="form-group">
                <label for="nama_materi">Materi</label>
                <input type="text" name="materi" class="form-control" value="<?= $materi ?>" readonly>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSoal"
                        aria-expanded="true" aria-controls="collapseSoal"> <i class="fas fa-chevron-right mx-2"></i>
                        Soal Ujian
                    </button>
                </h3>
            </div>
            <div id="collapseSoal" class="collapse">
                <div class="card-body">
                    <?php foreach (json_decode($ujian['soal_ujian'], true) as $index => $soal) : ?>
                        <div class="form-group">
                            <label for="inputCity">Soal Ujian <?= $index + 1 ?></label>
                            <textarea rows="1" class="form-control" readonly><?= $soal['soal_ujian'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Jawaban</label>
                            <div class="d-flex justify-content-end">
                                <div class="form-check mx-2">
                                    <input class="form-check-input" type="radio" disabled>
                                    <input class="form-control jawaban" value="<?= $soal['jawaban_a'] ?>" readonly>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input" type="radio" disabled>
                                    <input class="form-control jawaban" value="<?= $soal['jawaban_b'] ?>" readonly>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input" type="radio" disabled>
                                    <input class="form-control jawaban" value="<?= $soal['jawaban_c'] ?>" readonly>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input" type="radio" disabled>
                                    <input class="form-control jawaban" value="<?= $soal['jawaban_d'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Kunci Jawaban</label>
                            <input type="text" class="form-control" value="<?= $soal['kunci_jawaban'] ?>" readonly>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="<?= base_url('guru/ujian') ?>" type="button" class="btn btn-warning">Kembali</a>
    </div>
</div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var collapseButton = document.querySelector('[data-target="#collapseSoal"]');
        var chevronIcon = collapseButton.querySelector('i');

        collapseButton.addEventListener('click', function () {
            chevronIcon.classList.toggle('fa-chevron-right');
            chevronIcon.classList.toggle('fa-chevron-down');
        });
    });
</script>

<?= $this->endSection(); ?>
