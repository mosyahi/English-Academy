<?= $this->extend('layouts/main_guru'); ?>
<?= $this->section('content'); ?>

<section class="content py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Materi</h3>
                    </div>
                    <form action="<?= base_url('guru/materi/update/' . $materi['id_materi']) ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_materi">Nama Materi</label>
                                <input type="text" class="form-control" id="nama_materi" name="nama_materi" placeholder="Nama Materi" value="<?= $materi['nama_materi'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_materi">Deskripsi</label>
                                <textarea rows="2" class="form-control" id="deskripsi_materi" name="deskripsi_materi" placeholder="Deskripsi"><?= $materi['deskripsi_materi'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File Materi</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="file_materi" type="file" class="custom-file-input" id="exampleInputFile" onchange="updateFileName(this)">
                                        <label class="custom-file-label" for="exampleInputFile" id="fileLabel"><?= $materi['file_materi'] ?></label>
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
                                        <input name="video_materi" type="file" class="custom-file-input" id="exampleInputVideo">
                                        <label class="custom-file-label" for="exampleInputVideo"><?= $materi['video_materi'] ?></label>
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
                                        <input name="audio_materi" type="file" class="custom-file-input" id="exampleInputAudio">
                                        <label class="custom-file-label" for="exampleInputAudio"><?= $materi['audio_materi'] ?></label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('guru/materi') ?>" type="button" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function updateFileName(input) {
        let fileName = input.files[0].name;
        let fileLabel = document.getElementById('fileLabel');
        fileLabel.textContent = fileName;
    }
</script>

<?= $this->endSection(); ?>
