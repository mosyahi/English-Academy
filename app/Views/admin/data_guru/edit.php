<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<section class="content py-4">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8 mx-auto">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Guru</h3>
                    </div>
                    <form method="post" action="<?= base_url('admin/guru/update/' . $guru['id_guru']) ?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" value="<?= $guru['nama'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">NIP</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" value="<?= $guru['nip'] ?>" name="nip" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('admin/guru') ?>" type="button" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>