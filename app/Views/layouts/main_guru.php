<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= env('app.name') ?> <?= $title ?></title>

    <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url() ?>plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>dist/css/adminlte.min.css?v=3.2.0">
    <script nonce="750915b8-b80b-4029-9390-a1231f14330a">
        (function(w, d) {
            ! function(bg, bh, bi, bj) {
                bg[bi] = bg[bi] || {};
                bg[bi].executed = [];
                bg.zaraz = {
                    deferred: [],
                    listeners: []
                };
                bg.zaraz.q = [];
                bg.zaraz._f = function(bk) {
                    return function() {
                        var bl = Array.prototype.slice.call(arguments);
                        bg.zaraz.q.push({
                            m: bk,
                            a: bl
                        })
                    }
                };
                for (const bm of ["track", "set", "debug"]) bg.zaraz[bm] = bg.zaraz._f(bm);
                    bg.zaraz.init = () => {
                        var bn = bh.getElementsByTagName(bj)[0],
                        bo = bh.createElement(bj),
                        bp = bh.getElementsByTagName("title")[0];
                        bp && (bg[bi].t = bh.getElementsByTagName("title")[0].text);
                        bg[bi].x = Math.random();
                        bg[bi].w = bg.screen.width;
                        bg[bi].h = bg.screen.height;
                        bg[bi].j = bg.innerHeight;
                        bg[bi].e = bg.innerWidth;
                        bg[bi].l = bg.location.href;
                        bg[bi].r = bh.referrer;
                        bg[bi].k = bg.screen.colorDepth;
                        bg[bi].n = bh.characterSet;
                        bg[bi].o = (new Date).getTimezoneOffset();
                        if (bg.dataLayer)
                            for (const bt of Object.entries(Object.entries(dataLayer).reduce(((bu, bv) => ({
                                ...bu[1],
                                ...bv[1]
                            })), {}))) zaraz.set(bt[0], bt[1], {
                                scope: "page"
                            });
                            bg[bi].q = [];
                            for (; bg.zaraz.q.length;) {
                                const bw = bg.zaraz.q.shift();
                                bg[bi].q.push(bw)
                            }
                            bo.defer = !0;
                            for (const bx of [localStorage, sessionStorage]) Object.keys(bx || {}).filter((bz => bz.startsWith("_zaraz_"))).forEach((by => {
                                try {
                                    bg[bi]["z_" + by.slice(7)] = JSON.parse(bx.getItem(by))
                                } catch {
                                    bg[bi]["z_" + by.slice(7)] = bx.getItem(by)
                                }
                            }));
                                bo.referrerPolicy = "origin";
                                bo.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bg[bi])));
                                bn.parentNode.insertBefore(bo, bn)
                            };
                            ["complete", "interactive"].includes(bh.readyState) ? zaraz.init() : bg.addEventListener("DOMContentLoaded", zaraz.init)
                        }(w, d, "zarazData", "script");
                    })(window, document);
                </script>
            </head>

            <body class="hold-transition sidebar-mini">
                <div class="wrapper">

                    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                            </li>
                        </ul>

                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item">
                                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                                    <i class="fas fa-search"></i>
                                </a>
                                <div class="navbar-search-block">
                                    <form class="form-inline">
                                        <div class="input-group input-group-sm">
                                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-navbar" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                                    <i class="fas fa-expand-arrows-alt"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>


                    <aside class="main-sidebar sidebar-dark-primary elevation-4">

                        <a href="<?= base_url('guru/dashboard') ?>" class="brand-link">
                            <img src="<?= base_url() ?>dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                            <span class="brand-text font-weight-light">English Camp</span>
                        </a>

                        <div class="sidebar">

                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                <div class="image">
                                    <img src="<?= base_url() ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                                </div>
                                <div class="info">
                                    <a href="<?= base_url('guru/dashboard') ?>" class="d-block"><?= session()->get('username') ?></a>
                                </div>
                            </div>

                            <div class="form-inline">
                                <div class="input-group" data-widget="sidebar-search">
                                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-sidebar">
                                            <i class="fas fa-search fa-fw"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                    <!-- sidebar -->
                                    <?= $this->include('layouts/sidebar_guru'); ?>
                                </ul>
                            </nav>
                        </div>
                    </aside>
                    <div class="content-wrapper">
                        <?= $this->renderSection('content'); ?>
                    </div>
                    <footer class="main-footer">
                        <div class="float-right d-none d-sm-inline">
                            Ang DImas Muchhh Muchhhh
                        </div>
                        <strong>Copyright &copy; 2023 <a href="#">Ang Dimas Kimochi :*</a>.</strong> All rights reserved.
                    </footer>
                </div>
            </div>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
    </div>
    <?= $this->include('layouts/modal'); ?>
    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/dist/js/adminlte.min.js?v=3.2.0"></script>
    <script src="<?= base_url() ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>