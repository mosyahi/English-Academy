<li class="nav-header">HOME</li>
<li class="nav-item">
    <a href="<?= base_url('guru/dashboard') ?>"
        class="nav-link <?= ($activePageGuru == 'dashboard') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Dashboard
            <span class="right badge badge-danger"></span>
        </p>
    </a>
</li>
<li class="nav-header">DATA MATERI</li>
<li
    class="nav-item <?= ($activePageGuru == 'materi' || $activePageGuru == 'tambah_materi' || $activePageGuru == 'edit_materi') ? 'active' : '' ?>">
    <a href="#"
        class="nav-link <?= ($activePageGuru == 'materi' || $activePageGuru == 'tambah_materi' || $activePageGuru == 'edit_materi') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-file"></i>
        <p>
            Data Materi
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('guru/materi') ?>"
                class="nav-link <?= ($activePageGuru == 'materi') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Materi</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('guru/materi/new') ?>"
                class="nav-link <?= ($activePageGuru == 'tambah_materi') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Form Tambah</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-header">DATA SOAL</li>
<li
    class="nav-item <?= ($activePageGuru == 'soal_latihan' || $activePageGuru == 'tambah_soal_latihan' || $activePageGuru == 'edit_latihan') ? 'active' : '' ?>">
    <a href="#"
        class="nav-link <?= ($activePageGuru == 'soal_latihan' || $activePageGuru == 'tambah_soal_latihan' || $activePageGuru == 'edit_latihan') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-marker"></i>
        <p>
            Data Soal Latihan
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('guru/latihan') ?>"
                class="nav-link <?= ($activePageGuru == 'soal_latihan') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Soal Latihan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('guru/latihan/new') ?>"
                class="nav-link <?= ($activePageGuru == 'tambah_soal_latihan') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Form Tambah</p>
            </a>
        </li>
    </ul>
</li>
<li
    class="nav-item <?= ($activePageGuru == 'soal_ujian' || $activePageGuru == 'tambah_soal_ujian' || $activePageGuru == 'edit_ujian') ? 'active' : '' ?>">
    <a href="#"
        class="nav-link <?= ($activePageGuru == 'soal_ujian' || $activePageGuru == 'tambah_soal_ujian' || $activePageGuru == 'edit_ujian') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-marker"></i>
        <p>
            Data Soal Ujian
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('guru/ujian') ?>"
                class="nav-link <?= ($activePageGuru == 'soal_ujian') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Soal Ujian</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('guru/ujian/new') ?>"
                class="nav-link <?= ($activePageGuru == 'tambah_soal_ujian') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Form Tambah</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-header">DATA NILAI</li>
<li class="nav-item">
    <a href="<?= base_url('guru/nilai') ?>"
        class="nav-link <?= ($activePageGuru == 'nilai_latihan') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-poll-h"></i>
        <p>
            Data Nilai Siswa
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