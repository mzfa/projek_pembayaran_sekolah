<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Data Siswa &nbsp;<a href="#" class="btn btn-primary" data-target="#tambah" data-toggle="modal">Tambah</a></h4> 
                        </div>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('pesan'); ?>
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>NIS</th>
                                        <th>No Telepon</th>
                                        <th>Periode Masuk</th>
                                        <th>Biaya Masuk</th>
                                        <th>Biaya SPP</th>
                                        <th>Daftar Ulang</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($siswa as $item) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item['nama_siswa'] ?></td>
                                            <td><?= $item['nis'] ?></td>
                                            <td><?= $item['no_telp'] ?></td>
                                            <td><?= $item['periode_masuk'] ?></td>
                                            <td>Rp. <?= number_format($item['biaya_spp']) ?></td>
                                            <td>Rp. <?= number_format($item['biaya_awal']) ?></td>
                                            <td>Rp. <?= number_format($item['daftar_ulang']) ?></td>
                                            <td>
                                                <a href="#" onclick="return edit(<?= $item['siswa_id'] ?>)" class="btn btn-warning">Ubah</a>
                                                <a href="<?= base_url('siswa/hapus/'.$item['siswa_id']) ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade bd-example-modal-lg" role="dialog" aria-modal="true" id="tambah">
        <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-block text-center pb-3 border-bttom">
                    <h3 class="modal-title" id="exampleModalCenterTitle">New Task</h3>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('siswa/tambah') ?>" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText02" class="h5">Nama Siswa</label>
                                    <input type="text" class="form-control" required name="nama_siswa" id="exampleInputText02" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText005" class="h5">nis</label>
                                    <input type="text" required name="nis" class="form-control" id="exampleInputText005" placeholder="NIS">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText005" class="h5">Alamat</label>
                                    <input type="text" required name="alamat_siswa" class="form-control" id="exampleInputText005" placeholder="Alamat">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText005" class="h5">No Telp</label>
                                    <input type="text" required name="no_telp" class="form-control" id="exampleInputText005" placeholder="No Telp">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText005" class="h5">Periode Masuk</label>
                                    <input type="text" required name="periode_masuk" class="form-control" id="exampleInputText005" placeholder="Periode Masuk">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText005" class="h5">Biaya Awal</label>
                                    <input type="number" required name="biaya_awal" class="form-control" id="exampleInputText005" placeholder="Biaya Awal">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText005" class="h5">Biaya SPP</label>
                                    <input type="number" required name="biaya_spp" class="form-control" id="exampleInputText005" placeholder="Biaya SPP">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText005" class="h5">Daftar Ulang</label>
                                    <input type="number" required name="daftar_ulang" class="form-control" id="exampleInputText005" placeholder="Daftar Ulang">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText005" class="h5">Tanggal Masuk</label>
                                    <input type="date" required name="tanggal_masuk" class="form-control" id="exampleInputText005" placeholder="Tanggal Masuk">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex flex-wrap align-items-ceter justify-content-center mt-4">
                                    <button class="btn btn-primary mr-3" type="submit">Save</button>
                                    <div class="btn btn-primary" data-dismiss="modal">Cancel</div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <div class="modal fade bd-example-modal-lg" role="dialog" aria-modal="true" id="edit">
        <div class="modal-dialog  modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-block text-center pb-3 border-bttom">
                    <h3 class="modal-title" id="exampleModalCenterTitle">New Task</h3>
                </div>
                <div class="modal-body">
                    <div id="tampildata"></div>
                </div>
            </div>
        </div>
    </div> 

    <script>
        function edit(id) {
            $.ajax({
                type: 'get',
                url: "<?= base_url('siswa/edit') ?>/" + id,
                // data:{'id':id}, 
                success: function(tampil) {

                    // console.log(tampil); 
                    $('#tampildata').html(tampil);
                    $('#edit').modal('show');
                }
            })
        }
    </script>