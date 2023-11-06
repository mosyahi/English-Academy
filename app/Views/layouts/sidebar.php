<li class="nav-header">HOME</li>
<li class="nav-item">
    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= ($activePage == 'dashboard') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-home"></i>
        <p>
            Dashboard
            <span class="right badge badge-danger"></span>
        </p>
    </a>
</li>
<li class="nav-header">DATA MASTER</li>
<li class="nav-item <?= ($activePage == 'guru' || $activePage == 'tambah_guru' || $activePage == 'edit_guru') ? 'active' : '' ?>">
    <a href="#" class="nav-link <?= ($activePage == 'guru' || $activePage == 'tambah_guru' || $activePage == 'edit_guru') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-chalkboard-teacher"></i>
        <p>
            Data Guru
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('admin/guru') ?>" class="nav-link <?= ($activePage == 'guru') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Guru</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('admin/guru/new') ?>" class="nav-link <?= ($activePage == 'tambah_guru') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Form Tambah</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item <?= ($activePage == 'siswa' || $activePage == 'tambah_siswa' || $activePage == 'edit_siswa') ? 'active' : '' ?>">
    <a href="#" class="nav-link <?= ($activePage == 'siswa' || $activePage == 'tambah_siswa' || $activePage == 'edit_siswa') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user-graduate"></i>
        <p>
            Data Siswa
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('admin/siswa') ?>" class="nav-link <?= ($activePage == 'siswa') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Siswa</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('admin/siswa/new') ?>" class="nav-link <?= ($activePage == 'tambah_siswa') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Form Tambah</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item <?= ($activePage == 'users' || $activePage == 'tambah_users' || $activePage == 'edit_users') ? 'active' : '' ?>">
    <a href="#" class="nav-link <?= ($activePage == 'users' || $activePage == 'tambah_users' || $activePage == 'edit_users') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-user"></i>
        <p>
            Data Users
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('admin/users') ?>" class="nav-link <?= ($activePage == 'users') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('admin/users/new') ?>" class="nav-link <?= ($activePage == 'tambah_users') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Form Tambah</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-header">DATA MATERI</li>
<li class="nav-item <?= ($activePage == 'materi' || $activePage == 'tambah_materi' || $activePage == 'edit_materi') ? 'active' : '' ?>">
    <a href="#" class="nav-link <?= ($activePage == 'materi' || $activePage == 'tambah_materi' || $activePage == 'edit_materi') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-file"></i>
        <p>
            Data Materi
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('admin/materi') ?>" class="nav-link <?= ($activePage == 'materi') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Materi</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('admin/materi/new') ?>" class="nav-link <?= ($activePage == 'tambah_materi') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Form Tambah</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-header">DATA SOAL</li>
<li class="nav-item <?= ($activePage == 'soal_latihan' || $activePage == 'tambah_soal_latihan' || $activePage == 'edit_latihan' || $activePage == 'detail_latihan') ? 'active' : '' ?>">
    <a href="#" class="nav-link <?= ($activePage == 'soal_latihan' || $activePage == 'tambah_soal_latihan' || $activePage == 'edit_latihan' || $activePage == 'detail_latihan') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-marker"></i>
        <p>
            Data Soal Latihan
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('admin/latihan') ?>" class="nav-link <?= ($activePage == 'soal_latihan') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Soal Latihan</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('admin/latihan/new') ?>" class="nav-link <?= ($activePage == 'tambah_soal_latihan') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Form Tambah</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item <?= ($activePage == 'soal_ujian' || $activePage == 'tambah_soal_ujian' || $activePage == 'edit_ujian') ? 'active' : '' ?>">
    <a href="#" class="nav-link <?= ($activePage == 'soal_ujian' || $activePage == 'tambah_soal_ujian' || $activePage == 'edit_ujian') ? 'active' : '' ?>">
        <i class="nav-icon fas fa-marker"></i>
        <p>
            Data Soal Ujian
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?= base_url('admin/ujian') ?>" class="nav-link <?= ($activePage == 'soal_ujian') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Soal Ujian</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url('admin/ujian/new') ?>" class="nav-link <?= ($activePage == 'tambah_soal_ujian') ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Form Tambah</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-header">DATA NILAI</li>
<li class="nav-item">
    <a href="<?= base_url('admin/nilai') ?>" class="nav-link <?= ($activePage == 'nilai') ? 'active' : '' ?>">
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