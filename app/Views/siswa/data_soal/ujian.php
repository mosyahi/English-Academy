<?= $this->extend('layouts/main_siswa'); ?>
<?= $this->section('content'); ?>

<section class="content py-2">
    <?= $this->include('component/alerts') ?>
    <div class="card-danger sticky-top">
        <div id="timer" style="background-color: white; padding: 10px; text-align: center;"></div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Soal Ujian</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputPassword1">Nama Ujian</label>
                <input type="text" name="nama_ujian" class="form-control" value="<?= $ujian['nama_ujian'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nama_materi">Materi</label>
                <input type="text" name="materi" class="form-control" value="<?= $materi ?>" readonly>
            </div>
            <form id="ujianForm" action="<?= base_url('siswa/evaluasi_ujian/'.$ujian['id_soal_ujian']) ?>"
                method="post">

                <?php
                $soalUjianArray = json_decode($ujian['soal_ujian'], true);
                shuffle($soalUjianArray); // Mengacak array soal ujian
                ?>

                <?php foreach ($soalUjianArray as $index => $soal) : ?>
                    <div class="form-group">
                        <label for="inputCity">Soal Ujian <?= $index + 1 ?></label>
                        <textarea rows="3" class="form-control" readonly><?= $soal['soal_ujian'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Jawaban</label>
                        <div class="d-flex justify-content-end">
                            <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="jawaban_<?= $index + 1 ?>"
                                value="<?= $soal['jawaban_a'] ?>">
                                <label class="form-check-label"><?= $soal['jawaban_a'] ?></label>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="jawaban_<?= $index + 1 ?>"
                                value="<?= $soal['jawaban_b'] ?>">
                                <label class="form-check-label"><?= $soal['jawaban_b'] ?></label>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="jawaban_<?= $index + 1 ?>"
                                value="<?= $soal['jawaban_c'] ?>">
                                <label class="form-check-label"><?= $soal['jawaban_c'] ?></label>
                            </div>
                            <div class="form-check mx-2">
                                <input class="form-check-input" type="radio" name="jawaban_<?= $index + 1 ?>"
                                value="<?= $soal['jawaban_d'] ?>">
                                <label class="form-check-label"><?= $soal['jawaban_d'] ?></label>
                            </div>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>

<script>
    // Ambil elemen timer
    var timerElement = document.getElementById('timer');

    // Tentukan waktu pengerjaan dalam detik
    var waktuPengerjaan = 3600; 

    // Hitung mundur waktu pengerjaan
    var timer = setInterval(function() {
        waktuPengerjaan--;

        // Konversi detik menjadi menit dan detik
        var menit = Math.floor(waktuPengerjaan / 60);
        var detik = waktuPengerjaan % 60;

        // Tampilkan waktu pengerjaan dalam format menit:detik
        timerElement.innerHTML = 'Sisa waktu: ' + menit + ' menit ' + detik + ' detik';

        // Cek apakah waktu pengerjaan telah habis
        if (waktuPengerjaan <= 0) {
            // Hentikan timer
            clearInterval(timer);

            // Submit form secara otomatis
            document.getElementById('ujianForm').submit();
        } else if (waktuPengerjaan === 300) {
            // Aksi saat tersisa 5 menit
            // Tambahkan tanda berkedip merah pada sticky timer
            var isRed = false;
            var blinkTimer = setInterval(function() {
                isRed = !isRed;
                if (isRed) {
                    timerElement.style.backgroundColor = 'red';
                } else {
                    timerElement.style.backgroundColor = 'white';
                }
        }, 500); // Berganti setiap 0.5 detik (500 milidetik)

            // Hentikan aksi berkedip setelah 10 detik (5 kali berkedip)
            setTimeout(function() {
                clearInterval(blinkTimer);
                timerElement.style.backgroundColor = 'white';
            }, 5000);
        }
    }, 1000); 
</script>


<?= $this->endSection(); ?>