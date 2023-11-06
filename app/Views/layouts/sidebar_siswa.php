<li class="nav-header">HOME</li>
<li class="nav-item">
    <a href="<?= base_url('siswa/dashboard') ?>" class="nav-link <?= ($activePageSiswa == 'dashboard') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Dashboard
            <span class="right badge badge-danger"></span>
        </p>
    </a>
</li>
<li class="nav-header">DATA MATERI</li>
<li class="nav-item">
    <a href="<?= base_url('siswa/materi') ?>" class="nav-link <?= ($activePageSiswa == 'materi') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-file"></i>
        <p>
            Materi Siswa
            <span class="right badge badge-danger"></span>
        </p>
    </a>
</li>
<li class="nav-header">DATA SOAL</li>
<li class="nav-item">
    <a href="<?= base_url('siswa/soal_siswa') ?>" class="nav-link <?= ($activePageSiswa == 'soal_siswa' || $activePageSiswa == 'soal_latihan' || $activePageSiswa == 'soal_ujian' || $activePageSiswa == 'evaluasi_latihan' || $activePageSiswa == 'evaluasi_ujian') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-marker"></i>
        <p>
            Soal Siswa
            <span class="right badge badge-danger"></span>
        </p>
    </a>
</li>

<li class="nav-header">DATA NILAI</li>
<li class="nav-item">
    <a href="<?= base_url('siswa/nilai') ?>" class="nav-link <?= ($activePageSiswa == 'nilai') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-poll-h"></i>
        <p>
            Nilai Siswa
            <span class="right badge badge-danger"></span>
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="<?= base_url('logout') ?>" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
            Logout
            <span class="right badge badge-danger"></span>
        </p>
    </a>
</li>