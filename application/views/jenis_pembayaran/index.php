<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Data Jenis Pembayaran &nbsp;
                                <!-- <a href="#" class="btn btn-primary" data-target="#tambah" data-toggle="modal">Tambah</a> -->
                            </h4> 
                        </div>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('pesan'); ?>
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>No</th>
                                        <th>Jenis Pembayaran</th>
                                        <th>Keterangan</th>
                                        <!-- <th>#</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jenis_pembayaran as $item) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item['nama_jenis_bayar'] ?></td>
                                            <td><?= $item['keterangan'] ?></td>
                                            <!-- <td>
                                                <?php if($item['jenis_pembayaran_id'] > 3) { ?>
                                                <a href="#" onclick="return edit(<?= $item['jenis_pembayaran_id'] ?>)" class="btn btn-warning">Ubah</a>
                                                <a href="<?= base_url('jenispembayaran/hapus/'.$item['jenis_pembayaran_id']) ?>" class="btn btn-danger">Hapus</a>
                                                <?php } ?>
                                            </td> -->
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
                    <h3 class="modal-title" id="exampleModalCenterTitle">Tambah Jenis Pembayaran</h3>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('jenispembayaran/tambah') ?>" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText02" class="h5">Nama Jenis Pembayaran</label>
                                    <input type="text" class="form-control" required name="nama_jenis_bayar" id="exampleInputText02" placeholder="Nama Jenis Pembayaran">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText02" class="h5">Keterangan</label>
                                    <input type="text" class="form-control" required name="keterangan" id="exampleInputText02" placeholder="Keterangan">
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
                url: "<?= base_url('jenispembayaran/edit') ?>/" + id,
                // data:{'id':id}, 
                success: function(tampil) {

                    // console.log(tampil); 
                    $('#tampildata').html(tampil);
                    $('#edit').modal('show');
                }
            })
        }
    </script>