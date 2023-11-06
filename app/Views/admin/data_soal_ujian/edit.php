<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<section class="content">
    <?= $this->include('component/alerts') ?>
    <div class="card-body">
        <form action="<?= base_url('admin/ujian/update/'.$soalUjian['id_soal_ujian']) ?>" method="post"
            enctype="multipart/form-data">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Data Ujain
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Ujian</label>
                                <input type="text" name="nama_ujian" class="form-control" placeholder="Nama Ujian"
                                    value="<?= $soalUjian['nama_ujian'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_materi">Materi</label>
                                <select class="form-control" name="id_materi">
                                    <option value="" selected>Pilih Materi</option>
                                    <?php foreach ($materi as $item): ?>
                                    <option value="<?= $item['id_materi'] ?>"
                                        <?php if($item['id_materi'] == $soalUjian['id_materi']) echo 'selected' ?>>
                                        <?= $item['nama_materi'] ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                Soal Ujian
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <?php foreach ($soal as $index => $item): ?>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputCity">Soal Ujian <?= $index + 1 ?></label>
                                    <textarea rows="1" class="form-control" name="soal_ujian<?= $index + 1 ?>"
                                        placeholder="Isi Soal Disini" required><?= $item['soal_ujian'] ?></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputState">Jawaban</label>
                                    <div class="d-flex justify-content-end">
                                        <div class="form-check mx-2">
                                            <input class="form-check-input" type="radio" disabled
                                                name="jawaban<?= $index + 1 ?>"
                                                <?php if ($item['kunci_jawaban'] == 'A') echo 'checked' ?>>
                                            <input class="form-control jawaban" name="jawaban_a_<?= $index + 1 ?>"
                                                value="<?= $item['jawaban_a'] ?>" onclick="updateKunciJawaban()"
                                                required>
                                        </div>
                                        <div class="form-check mx-2">
                                            <input class="form-check-input" type="radio" disabled
                                                name="jawaban<?= $index + 1 ?>"
                                                <?php if ($item['kunci_jawaban'] == 'B') echo 'checked' ?>>
                                            <input class="form-control jawaban" name="jawaban_b_<?= $index + 1 ?>"
                                                value="<?= $item['jawaban_b'] ?>" onclick="updateKunciJawaban()"
                                                required>
                                        </div>
                                        <div class="form-check mx-2">
                                            <input class="form-check-input" type="radio" disabled
                                                name="jawaban<?= $index + 1 ?>"
                                                <?php if ($item['kunci_jawaban'] == 'C') echo 'checked' ?>>
                                            <input class="form-control jawaban" name="jawaban_c_<?= $index + 1 ?>"
                                                value="<?= $item['jawaban_c'] ?>" onclick="updateKunciJawaban()"
                                                required>
                                        </div>
                                        <div class="form-check mx-2">
                                            <input class="form-check-input" type="radio" disabled
                                                name="jawaban<?= $index + 1 ?>"
                                                <?php if ($item['kunci_jawaban'] == 'D') echo 'checked' ?>>
                                            <input class="form-control jawaban" name="jawaban_d_<?= $index + 1 ?>"
                                                value="<?= $item['jawaban_d'] ?>" onclick="updateKunciJawaban()"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Kunci Jawaban</label>
                                    <select id="kuncijawaban_<?= $index + 1 ?>" class="form-control kuncijawaban"
                                        name="kunci_jawaban_<?= $index + 1 ?>" required>
                                        <?php $jawabanOptions = ['A', 'B', 'C', 'D']; ?>
                                        <?php foreach ($jawabanOptions as $jawabanOption): ?>
                                        <?php $selected = ($item['kunci_jawaban'] == $jawabanOption) ? 'selected' : ''; ?>
                                        <option value="<?= $jawabanOption ?>" <?= $selected ?>>
                                            <?= $item['jawaban_' . strtolower($jawabanOption)] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>
                            <?php endforeach; ?>

                            <hr>

                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('admin/ujian') ?>" type="button" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</section>

<script>
function updateKunciJawaban() {
    var kunciJawabanSelects = document.getElementsByClassName('kuncijawaban');
    var formControlInputs = document.getElementsByClassName('form-control jawaban');

    for (var i = 0; i < kunciJawabanSelects.length; i++) {
        var kunciJawabanSelect = kunciJawabanSelects[i];
        kunciJawabanSelect.innerHTML = '<option selected disabled>Pilih Jawaban</option>';
    }

    for (var i = 0; i < formControlInputs.length; i++) {
        var jawaban = formControlInputs[i].value;
        if (jawaban !== '') {
            var kunciJawabanOption = document.createElement('option');
            kunciJawabanOption.value = jawaban;
            kunciJawabanOption.text = jawaban;

            var formGroup = formControlInputs[i].closest('.form-row');
            var kunciJawabanSelect = formGroup.querySelector('.kuncijawaban');
            kunciJawabanSelect.appendChild(kunciJawabanOption);
        }
    }
}
</script>

<?= $this->endSection(); ?>