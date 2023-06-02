<form action="<?= base_url('jenispembayaran/ubah') ?>" method="post">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText005" class="h5">Username</label>
                <input type="text" required value="<?= $jenis_pembayaran[0]['nama_jenis_bayar'] ?>" name="nama_jenis_bayar" class="form-control" id="exampleInputText005" placeholder="Username">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText005" class="h5">Keterangan</label>
                <input type="text" required value="<?= $jenis_pembayaran[0]['keterangan'] ?>" name="keterangan" class="form-control" id="exampleInputText005" placeholder="Username">
            </div>
        </div>
        <input type="hidden" name="id" value="<?= $jenis_pembayaran[0]['jenis_pembayaran_id'] ?>">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-ceter justify-content-center mt-4">
                <button class="btn btn-primary mr-3" type="submit">Save</button>
                <div class="btn btn-primary" data-dismiss="modal">Cancel</div>
            </div>
        </div>
    </div>
</form>