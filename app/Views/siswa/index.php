<?= $this->extend('layouts/main_siswa'); ?>
<?= $this->section('content'); ?>

<section class="content py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="alert alert-secondary col-md-12" role="alert">
                <h4 class="alert-heading">Selamat Datang <b><?= session()->get('username') ?></b>!</h4>
                <p>English Academy Apps adalah sebuah aplikasi belajar mengenai materi-materi bahasa inggris. Ada beberapa metoe pembelajaran bahasa inggris disini yaitu metode teks, metode video dan metode audio. :*</p>
                <hr>
                <p class="mb-0">Already To Play?</p>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>