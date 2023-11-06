<?= $this->extend('layouts/main_guru'); ?>
<?= $this->section('content'); ?>

<section class="content py-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Video Materi</h3>
                    </div>
                    <div class="card-body">
                        <video width="100%" controls>
                            <source src="<?= $videoPath ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <a href="<?= base_url('guru/materi') ?>" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    </section>

    <?= $this->endSection(); ?>
