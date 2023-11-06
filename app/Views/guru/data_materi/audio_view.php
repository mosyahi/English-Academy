<?= $this->extend('layouts/main_guru'); ?>
<?= $this->section('content'); ?>

<section class="content py-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Audio Materi</h3>
                    </div>
                    <div class="card-body">
                        <audio controls>
                            <source src="<?= $audioPath ?>" type="audio/mpeg">
                                Your browser does not support the audio tag.
                            </audio>
                        </div>
                    </div>
                    <a href="<?= base_url('guru/materi') ?>" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </section>

    <?= $this->endSection(); ?>
