<form action="<?= base_url('siswa/ubah') ?>" method="post">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText02" class="h5">Nama Siswa</label>
                <input type="text" class="form-control" required name="nama_siswa" value="<?= $siswa[0]['nama_siswa'] ?>" id="exampleInputText02" placeholder="Nama Lengkap">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText005" class="h5">nis</label>
                <input type="text" required name="nis" value="<?= $siswa[0]['nis'] ?>" class="form-control" id="exampleInputText005" placeholder="NIS">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText005" class="h5">Alamat</label>
                <input type="text" required name="alamat_siswa" value="<?= $siswa[0]['alamat_siswa'] ?>" class="form-control" id="exampleInputText005" placeholder="Alamat">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText005" class="h5">No Telp</label>
                <input type="text" required name="no_telp" value="<?= $siswa[0]['no_telp'] ?>" class="form-control" id="exampleInputText005" placeholder="No Telp">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText005" class="h5">Periode Masuk</label>
                <input type="text" required name="periode_masuk" value="<?= $siswa[0]['periode_masuk'] ?>" class="form-control" id="exampleInputText005" placeholder="Periode Masuk">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText005" class="h5">Biaya Awal</label>
                <input type="number" required name="biaya_awal" value="<?= $siswa[0]['biaya_awal'] ?>" class="form-control" id="exampleInputText005" placeholder="Biaya Awal">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText005" class="h5">Biaya SPP</label>
                <input type="number" required name="biaya_spp" value="<?= $siswa[0]['biaya_spp'] ?>" class="form-control" id="exampleInputText005" placeholder="Biaya SPP">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText005" class="h5">Daftar Ulang</label>
                <input type="number" required name="daftar_ulang" value="<?= $siswa[0]['daftar_ulang'] ?>" class="form-control" id="exampleInputText005" placeholder="Daftar Ulang">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText005" class="h5">Tanggal Masuk</label>
                <input type="date" required name="tanggal_masuk" value="<?= $siswa[0]['tanggal_masuk'] ?>" class="form-control" id="exampleInputText005" placeholder="Tanggal Masuk">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-ceter justify-content-center mt-4">
                <button class="btn btn-primary mr-3" type="submit">Save</button>
                <div class="btn btn-primary" data-dismiss="modal">Cancel</div>
            </div>
        </div>
        <input type="hidden" name="id" value="<?= $siswa[0]['siswa_id'] ?>">
    </div>
</form>