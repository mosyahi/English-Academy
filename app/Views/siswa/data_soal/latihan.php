<?= $this->extend('layouts/main_siswa'); ?>
<?= $this->section('content'); ?>

<section class="content py-2">
    <?= $this->include('component/alerts') ?>
    <div class="card-danger sticky-top">
        <div id="timer" style="background-color: white; padding: 10px; text-align: center;"></div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Soal Latihan</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputPassword1">Nama Latihan</label>
                <input type="text" name="nama_latihan" class="form-control" value="<?= $latihan['nama_latihan'] ?>"
                readonly>
            </div>
            <div class="form-group">
                <label for="nama_materi">Materi</label>
                <input type="text" name="materi" class="form-control" value="<?= $materi ?>" readonly>
            </div>
            <form id="latihanForm" action="<?= base_url('siswa/evaluasi_latihan/'.$latihan['id_soal_latihan']) ?>"
                method="post">

                <?php
                $soalArray = json_decode($latihan['soal'], true);
                shuffle($soalArray); 
                ?>

                <?php foreach ($soalArray as $index => $soal) : ?>
                    <div class="form-group">
                        <label for="inputCity">Soal Latihan <?= $index + 1 ?></label>
                        <textarea rows="3" class="form-control" readonly><?= $soal['nomor_soal'] ?><?= $soal['soal'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputState">Jawaban</label>
                        <div class="d-flex justify-content-start">
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

<div class="modal fade" id="refreshModal" tabindex="-1" role="dialog" aria-labelledby="refreshModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="refreshModalLabel">Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Refresh halaman akan menghapus seluruh jawaban Anda. Apakah Anda yakin?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="refreshConfirmBtn">Ya, Refresh</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Ambil elemen timer
    var timerElement = document.getElementById('timer');

// Tentukan waktu pengerjaan dalam detik
    var waktuPengerjaan;

// Fungsi untuk mengupdate tampilan timer
    function updateTimer() {
    // Konversi detik menjadi menit dan detik
        var menit = Math.floor(waktuPengerjaan / 60);
        var detik = waktuPengerjaan % 60;

    // Tampilkan waktu pengerjaan dalam format menit:detik
        timerElement.innerHTML = 'Sisa waktu: ' + menit + ' menit ' + detik + ' detik';
    }

// Cek apakah halaman sedang di-reload
    if (!localStorage.getItem('halamanDiReload')) {
    waktuPengerjaan = 3600; // Inisialisasi waktu hanya jika halaman tidak di-reload
    localStorage.removeItem('halamanDiReload'); // Hapus tanda halaman di-reload
} else {
    // Halaman di-reload, muat waktu yang tersisa dari localStorage
    waktuPengerjaan = parseInt(localStorage.getItem('waktuTersisa'));
}

// Set tanda halaman di-reload di localStorage saat halaman dimuat
localStorage.setItem('halamanDiReload', 'true');

window.addEventListener('beforeunload', function (event) {
        // Tampilkan pesan konfirmasi saat akan merefresh
    var confirmationMessage = '';
    (event || window.event).returnValue = confirmationMessage; 
    return confirmationMessage;
});

// Fungsi untuk memeriksa apakah semua soal telah terisi
function isAllQuestionsAnswered() {
    var allQuestionsAnswered = true;
    var radioButtons = document.querySelectorAll('input[type="radio"]');
    radioButtons.forEach(function (radioButton) {
        if (!radioButton.checked) {
            allQuestionsAnswered = false;
        }
    });
    return allQuestionsAnswered;
}

// Tangani klik tombol "Submit"
document.getElementById('latihanForm').addEventListener('submit', function (event) {
    // Cek apakah semua soal telah terisi
    if (!isAllQuestionsAnswered()) {
        event.preventDefault(); // Hentikan pengiriman formulir

        // Tampilkan pesan SweetAlert
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan',
            text: 'Ada soal yang belum terisi. Mohon isi semua soal sebelum mengirimkan.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });

        // Ganti warna teks soal yang belum terisi menjadi merah
        var soalElements = document.querySelectorAll('textarea');
        soalElements.forEach(function (soalElement, index) {
            var radioButtonName = 'jawaban_' + (index + 1);
            var radioButtonGroup = document.querySelectorAll('input[name="' + radioButtonName + '"]');
            var isAnswered = false;
            radioButtonGroup.forEach(function (radioButton) {
                if (radioButton.checked) {
                    isAnswered = true;
                }
            });
            if (!isAnswered) {
                soalElement.style.color = 'red';
            }
        });
    }
});


// Hitung mundur waktu pengerjaan
var timer = setInterval(function () {
    waktuPengerjaan--;

    // Simpan waktu yang tersisa ke localStorage setiap detik
    localStorage.setItem('waktuTersisa', waktuPengerjaan);

    // Perbarui tampilan timer
    updateTimer();

    // Cek apakah waktu pengerjaan telah habis
    if (waktuPengerjaan <= 0) {
        // Hentikan timer
        clearInterval(timer);

        // Submit form secara otomatis
        document.getElementById('latihanForm').submit();
    } else if (waktuPengerjaan === 300) {
        // Aksi saat tersisa 5 menit
        // Tambahkan tanda berkedip merah pada sticky timer
        var isRed = false;
        var blinkTimer = setInterval(function () {
            isRed = !isRed;
            if (isRed) {
                timerElement.style.backgroundColor = 'red';
            } else {
                timerElement.style.backgroundColor = 'white';
            }
        }, 500); // Berganti setiap 0.5 detik (500 milidetik)

        // Hentikan aksi berkedip setelah 10 detik (5 kali berkedip)
        setTimeout(function () {
            clearInterval(blinkTimer);
            timerElement.style.backgroundColor = 'white';
        }, 5000); // Setelah 5 detik (5.000 milidetik)
    }
}, 1000); // Update setiap 1 detik (1000 milidetik)

// Perbarui tampilan timer saat halaman dimuat
updateTimer();
</script>


<?= $this->endSection(); ?>
