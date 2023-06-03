<?php 
$bayaran = 0;
    if($jenis == 1){
        $bayaran = number_format($siswa[0]['biaya_awal']);
    }elseif($jenis == 2){
        $bayaran = number_format($siswa[0]['daftar_ulang']);
    }
    elseif($jenis == 3){
        $bayaran = number_format($siswa[0]['biaya_spp']);
    }
?>


<form action="<?= base_url('transaksi/simpan_bayaran') ?>" method="post">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText02" class="h5">Nama Siswa</label>
                <input type="text" class="form-control" required readonly name="nama_siswa" value="<?= $siswa[0]['nama_siswa'] ?>" id="exampleInputText02" placeholder="Nama Siswa">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText02" class="h5">Total Biaya</label>
                <input type="text" class="form-control" required readonly name="total_biaya" value="Rp. <?= $bayaran ?>" id="exampleInputText02" placeholder="Nama Siswa">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText02" class="h5">Periode</label>
                <input type="number" class="form-control" required readonly name="periode" value="<?= $periode ?>" id="exampleInputText02" placeholder="Periode">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText02" class="h5">Total Bayar</label>
                <input type="number" class="form-control" required name="total_bayar" id="exampleInputText02" placeholder="Total Bayar">
            </div>
        </div>
        <input type="hidden" name="siswa_id" value="<?= $id ?>">
        <input type="hidden" name="jenis_pembayaran_id" value="<?= $jenis ?>">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-ceter justify-content-center mt-4">
                <button class="btn btn-primary mr-3" type="submit">Save</button>
                <div class="btn btn-primary" data-dismiss="modal">Cancel</div>
            </div>
        </div>
    </div>
</form>