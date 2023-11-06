<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<section class="content py-4">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8 mx-auto">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Siswa</h3>
                    </div>
                    <form action="<?= base_url('admin/siswa/add') ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">NIS</label>
                                <input type="number" name="nis" class="form-control" id="exampleInputPassword1" placeholder="NIS" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Jenis Kelamin</label>
                                <select class="form-control" name="jk" id="exampleFormControlSelect1">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" id="exampleInputPassword1" placeholder="Tanggal Lahir" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Alamat</label>
                                <textarea rows="3" name="alamat" type="text" class="form-control" id="exampleInputPassword1" placeholder="Alamat Lengkap" required></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('admin/siswa') ?>" type="button" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>