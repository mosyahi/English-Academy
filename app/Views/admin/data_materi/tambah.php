<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<section class="content py-4">
    <div class="container-fluid">
        <?= $this->include('component/alerts') ?>
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Materi</h3>
                    </div>
                    <form action="<?= base_url('admin/materi/add') ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_materi">Nama Materi</label>
                                <input type="text" class="form-control" id="nama_materi" name="nama_materi"
                                    placeholder="Nama Materi">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_materi">Deskripsi</label>
                                <textarea rows="2" class="form-control" id="deskripsi_materi" name="deskripsi_materi"
                                    placeholder="Deskripsi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="file_materi" type="file" class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih File</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputVideo">File Video</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="video_materi" type="file" class="custom-file-input"
                                            id="exampleInputVideo">
                                        <label class="custom-file-label" for="exampleInputVideo">Pilih Video</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAudio">File Audio</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="audio_materi" type="file" class="custom-file-input"
                                            id="exampleInputAudio">
                                        <label class="custom-file-label" for="exampleInputAudio">Pilih Audio</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('/materi') ?>" type="button" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<?= $this->endSection(); ?>