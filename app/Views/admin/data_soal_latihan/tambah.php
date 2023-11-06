<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<section class="content">
    <?= $this->include('component/alerts') ?>
    <div class="card-body">
        <form action="<?= base_url('admin/latihan/add') ?>" method="post" enctype="multipart/form-data">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Data Latihan
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama Latihan</label>
                                <input type="text" name="nama_latihan" class="form-control" placeholder="Nama Latihan"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="nama_materi">Materi</label>
                                <select class="form-control" name="id_materi">
                                    <option value="" selected>Pilih Materi</option>
                                    <?php foreach ($materi as $item): ?>
                                    <option value="<?= $item['id_materi'] ?>"><?= $item['nama_materi'] ?></option>
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
                                Soal Latihan
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputState">Jumlah Soal</label>
                                <input type="number" class="form-control" name="jumlah_soal" id="jumlah_soal" min="1"
                                    max="10" required>
                                <small class="text-danger" id="jumlah-soal-warning" style="display: none;">Jumlah soal
                                    tidak boleh melebihi 100.</small>
                            </div>

                            <div id="form-soal-container"></div>

                            <hr>

                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('admin/latihan') ?>" type="button" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
</section>

<script>
document.getElementById('jumlah_soal').addEventListener('input', function() {
    var jumlahSoal = parseInt(this.value);
    var formSoalContainer = document.getElementById('form-soal-container');
    var jumlahSoalWarning = document.getElementById('jumlah-soal-warning');

    formSoalContainer.innerHTML = ''; // Menghapus konten sebelumnya
    jumlahSoalWarning.style.display = 'none'; // Menyembunyikan peringatan

    if (jumlahSoal > 100) {
        jumlahSoalWarning.style.display = 'block'; // Menampilkan peringatan
        return;
    }

    for (var i = 1; i <= jumlahSoal; i++) {
        var formSoal = `
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputCity">Soal Latihan ${i}</label>
                    <textarea rows="1" class="form-control" name="soal_${i}" placeholder="Isi Soal Disini" required></textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputState">Jawaban</label>
                    <div class="d-flex justify-content-end">
                        <div class="form-check mx-2">
                            <input class="form-check-input" type="radio" name="jawaban${i}" disabled>
                            <input class="form-control jawaban" name="jawaban_a_${i}" value="A" onclick="updateKunciJawaban()" placeholder="Jawaban A. ....." required>
                        </div>
                        <div class="form-check mx-2">
                            <input class="form-check-input" type="radio" name="jawaban${i}" disabled>
                            <input class="form-control jawaban" name="jawaban_b_${i}" value="B" onclick="updateKunciJawaban()" placeholder="Jawaban B. ....." required>
                        </div>
                        <div class="form-check mx-2">
                            <input class="form-check-input" type="radio" name="jawaban${i}" disabled>
                            <input class="form-control jawaban" name="jawaban_c_${i}" value="C" onclick="updateKunciJawaban()" placeholder="Jawaban C. ....." required>
                        </div>
                        <div class="form-check mx-2">
                            <input class="form-check-input" type="radio" name="jawaban${i}" disabled>
                            <input class="form-control jawaban" name="jawaban_d_${i}" value="D" onclick="updateKunciJawaban()" placeholder="Jawaban D. ....." required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputState">Kunci Jawaban</label>
                    <select id="kuncijawaban_${i}" class="form-control kuncijawaban" name="kunci_jawaban_${i}" required>
                        <option selected disabled>Pilih Jawaban</option>
                    </select>
                </div>
            </div>
        `;

        formSoalContainer.innerHTML += formSoal; // Menambahkan form soal ke dalam container
    }
});

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