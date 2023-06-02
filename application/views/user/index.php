<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Data User &nbsp;<a href="#" class="btn btn-primary" data-target="#tambah" data-toggle="modal">Tambah</a></h4> 
                        </div>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('pesan'); ?>
                        <div class="table-responsive">
                            <table id="datatable" class="table data-table table-striped">
                                <thead>
                                    <tr class="ligth">
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($user as $item) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item['username'] ?></td>
                                            <td><?= $item['role'] ?></td>
                                            <td>
                                                <a href="#" onclick="return edit(<?= $item['user_id'] ?>)" class="btn btn-warning">Ubah</a>
                                                <a href="" class="btn btn-danger">Hapus</a>
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
                    <form action="<?= base_url('user/tambah') ?>" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText02" class="h5">Nama Lengkap</label>
                                    <input type="text" class="form-control" required name="nama" id="exampleInputText02" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText005" class="h5">Username</label>
                                    <input type="text" required name="username" class="form-control" id="exampleInputText005" placeholder="Username">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText005" class="h5">Password</label>
                                    <input type="password" required name="password" class="form-control" id="exampleInputText005" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="exampleInputText2" class="h5">Role</label>
                                    <select required name="role" class="selectpicker form-control" data-style="py-0">
                                        <option value="admin">Admin</option>
                                        <option value="keuangan">Keuangan</option>
                                    </select>
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
                url: "<?= base_url('user/edit') ?>/" + id,
                // data:{'id':id}, 
                success: function(tampil) {

                    // console.log(tampil); 
                    $('#tampildata').html(tampil);
                    $('#edit').modal('show');
                }
            })
        }
    </script>