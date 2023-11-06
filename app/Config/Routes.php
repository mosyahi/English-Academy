<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// HOME
$routes->get('/', 'Home::index');

//AUTH
$routes->get('/login', 'Auth\LoginController::index');
$routes->post('/login', 'Auth\LoginController::processLogin');
$routes->get('/logout', 'Auth\LoginController::logout');

//ADMIN
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::index');

    //data guru
    $routes->get('guru', 'Admin\GuruController::index');
    $routes->get('guru/new', 'Admin\GuruController::tambah');
    $routes->post('guru/add', 'Admin\GuruController::prosesTambah');
    $routes->get('guru/edit/(:num)', 'Admin\GuruController::edit/$1');
    $routes->post('guru/update/(:num)', 'Admin\GuruController::update/$1');
    $routes->get('guru/delete/(:num)', 'Admin\GuruController::delete/$1');

    //data siswa
    $routes->get('siswa', 'Admin\SiswaController::index');
    $routes->get('siswa/new', 'Admin\SiswaController::tambah');
    $routes->post('siswa/add', 'Admin\SiswaController::prosesTambah');
    $routes->get('siswa/edit/(:num)', 'Admin\SiswaController::edit/$1');
    $routes->post('siswa/update/(:num)', 'Admin\SiswaController::update/$1');
    $routes->get('siswa/delete/(:num)', 'Admin\SiswaController::delete/$1');

    //data users
    $routes->get('users', 'Admin\UserController::index');
    $routes->get('users/new', 'Admin\UserController::tambah');
    $routes->post('users/add', 'Admin\UserController::addUsers');
    $routes->get('users/edit/(:num)', 'Admin\UserController::edit/$1');
    $routes->post('users/update/(:num)', 'Admin\UserController::update/$1');
    $routes->get('users/delete/(:num)', 'Admin\UserController::delete/$1');

    //data materi
    $routes->get('materi', 'Admin\MateriController::index');
    $routes->get('materi/new', 'Admin\MateriController::create');
    $routes->post('materi/add', 'Admin\MateriController::store');
    $routes->get('materi/edit/(:num)', 'Admin\MateriController::edit/$1');
    $routes->post('materi/update/(:num)', 'Admin\MateriController::update/$1');
    $routes->get('materi/delete/(:num)', 'Admin\MateriController::delete/$1');
    $routes->get('materi/download/(:num)/(:segment)', 'Admin\MateriController::downloadFile/$1/$2');
    $routes->get('open/file_materi/(:segment)', 'Admin\MateriController::viewFile/$1');
    $routes->get('open/video_materi/(:segment)', 'Admin\MateriController::viewVideo/$1');
    $routes->get('open/audio_materi/(:segment)', 'Admin\MateriController::viewAudio/$1');

    //data soal ujian
    $routes->get('ujian', 'Admin\SoalUjianController::index');
    $routes->get('ujian/new', 'Admin\SoalUjianController::new');
    $routes->post('ujian/add', 'Admin\SoalUjianController::add');
    $routes->get('ujian/edit/(:num)', 'Admin\SoalUjianController::edit/$1');
    $routes->post('ujian/update/(:num)', 'Admin\SoalUjianController::update/$1');
    $routes->get('ujian/lihat/(:num)', 'Admin\SoalUjianController::lihat/$1');
    $routes->get('ujian/delete/(:num)', 'Admin\SoalUjianController::delete/$1');

    //data soal latihan
    $routes->get('latihan', 'Admin\SoalLatihanController::index');
    $routes->get('latihan/new', 'Admin\SoalLatihanController::new');
    $routes->post('latihan/add', 'Admin\SoalLatihanController::add');
    $routes->get('latihan/edit/(:num)', 'Admin\SoalLatihanController::edit/$1');
    $routes->post('latihan/update/(:num)', 'Admin\SoalLatihanController::update/$1');
    $routes->get('latihan/lihat/(:num)', 'Admin\SoalLatihanController::lihat/$1');
    $routes->get('latihan/delete/(:num)', 'Admin\SoalLatihanController::delete/$1');

    //data nilai
    $routes->get('nilai', 'Admin\NilaiController::index');
    $routes->get('nilai/new', 'Admin\NilaiController::new');
    $routes->post('nilai/add', 'Admin\NilaiController::add');
    $routes->get('latihan/lihat/(:num)', 'Admin\NilaiController::lihat/$1');
    $routes->get('nilai/delete/(:num)', 'Admin\NilaiController::delete/$1');
});

//GURU
$routes->group('guru', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Guru\DashboardGuruController::index');

    //data materi
    $routes->get('materi', 'Guru\MateriGuruController::index');
    $routes->get('materi/new', 'Guru\MateriGuruController::create');
    $routes->post('materi/add', 'Guru\MateriGuruController::store');
    $routes->get('materi/edit/(:num)', 'Guru\MateriGuruController::edit/$1');
    $routes->post('materi/update/(:num)', 'Guru\MateriGuruController::update/$1');
    $routes->get('materi/delete/(:num)', 'Guru\MateriGuruController::delete/$1');
    $routes->get('materi/download/(:num)/(:segment)', 'Guru\MateriGuruController::downloadFile/$1/$2');
    $routes->get('open/file_materi/(:segment)', 'Guru\MateriGuruController::viewFile/$1');
    $routes->get('open/video_materi/(:segment)', 'Guru\MateriGuruController::viewVideo/$1');
    $routes->get('open/audio_materi/(:segment)', 'Guru\MateriGuruController::viewAudio/$1');

    //data soal ujian
    $routes->get('ujian', 'Guru\UjianGuruController::index');
    $routes->get('ujian/new', 'Guru\UjianGuruController::new');
    $routes->post('ujian/add', 'Guru\UjianGuruController::add');
    $routes->get('ujian/edit/(:num)', 'Guru\UjianGuruController::edit/$1');
    $routes->post('ujian/update/(:num)', 'Guru\UjianGuruController::update/$1');
    $routes->get('ujian/lihat/(:num)', 'Guru\UjianGuruController::lihat/$1');
    $routes->get('ujian/delete/(:num)', 'Guru\UjianGuruController::delete/$1');

    //data soal latihan
    $routes->get('latihan', 'Guru\LatihanGuruController::index');
    $routes->get('latihan/new', 'Guru\LatihanGuruController::new');
    $routes->post('latihan/add', 'Guru\LatihanGuruController::add');
    $routes->get('latihan/edit/(:num)', 'Guru\LatihanGuruController::edit/$1');
    $routes->post('latihan/update/(:num)', 'Guru\LatihanGuruController::update/$1');
    $routes->get('latihan/lihat/(:num)', 'Guru\LatihanGuruController::lihat/$1');
    $routes->get('latihan/delete/(:num)', 'Guru\LatihanGuruController::delete/$1');

    //data nilai
    $routes->get('nilai', 'Guru\NilaiGuruController::index');
    $routes->get('nilai/new', 'Guru\NilaiGuruController::new');
    $routes->post('nilai/add', 'Guru\NilaiGuruController::add');
    $routes->get('latihan/lihat/(:num)', 'Guru\NilaiGuruController::lihat/$1');
    $routes->get('nilai/delete/(:num)', 'Guru\NilaiGuruController::delete/$1');
});

//SISWA
$routes->group('siswa', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Siswa\DashboardSiswaController::index');

    //data materi
    $routes->get('materi', 'Siswa\MateriSiswaController::index');
    $routes->get('materi/new', 'Siswa\MateriSiswaController::create');
    $routes->post('materi/add', 'Siswa\MateriSiswaController::store');
    $routes->get('materi/edit/(:num)', 'Siswa\MateriSiswaController::edit/$1');
    $routes->post('materi/update/(:num)', 'Siswa\MateriSiswaController::update/$1');
    $routes->get('materi/delete/(:num)', 'Siswa\MateriSiswaController::delete/$1');
    $routes->get('materi/download/(:num)/(:segment)', 'Siswa\MateriSiswaController::downloadFile/$1/$2');
    $routes->get('open/file_materi/(:segment)', 'Siswa\MateriSiswaController::viewFile/$1');
    $routes->get('open/video_materi/(:segment)', 'Siswa\MateriSiswaController::viewVideo/$1');
    $routes->get('open/audio_materi/(:segment)', 'Siswa\MateriSiswaController::viewAudio/$1');

    //data soal
    $routes->get('soal_siswa', 'Siswa\SoalSiswaController::index');
    $routes->get('soal_siswa/new', 'Siswa\SoalSiswaController::new');
    $routes->post('soal_siswa/add', 'Siswa\SoalSiswaController::add');
    // $routes->get('latihan/mulai/(:num)', 'Siswa\SoalSiswaController::mulaiLatihan/$1');
    // $routes->get('ujian/mulai/(:num)', 'Siswa\SoalSiswaController::mulaiUjian/$1');

    $routes->get('latihan/(:segment)', 'Siswa\SoalSiswaController::mulaiLatihan/$1');
    $routes->post('evaluasi_latihan/(:segment)', 'Siswa\SoalSiswaController::evaluasiLatihan/$1');

    $routes->get('ujian/(:segment)', 'Siswa\SoalSiswaController::mulaiUjian/$1');
    $routes->post('evaluasi_ujian/(:segment)', 'Siswa\SoalSiswaController::evaluasiUjian/$1');


    //data nilai
    $routes->get('nilai', 'Siswa\NilaiSiswaController::index');
    $routes->get('nilai/new', 'Siswa\NilaiSiswaController::new');
    $routes->post('nilai/add', 'Siswa\NilaiSiswaController::add');
    $routes->get('latihan/lihat/(:num)', 'Siswa\NilaiSiswaController::lihat/$1');

    //data soal latihan
    // $routes->get('latihan', 'Siswa\LatihanSiswaController::index');
    // $routes->get('latihan/new', 'Siswa\LatihanSiswaController::new');
    // $routes->post('latihan/add', 'Siswa\LatihanSiswaController::add');
    // $routes->get('latihan/lihat/(:num)', 'Siswa\LatihanSiswaController::lihat/$1');

});

$routes->get('/check-session', function () {
    echo session()->get('id_siswa');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}