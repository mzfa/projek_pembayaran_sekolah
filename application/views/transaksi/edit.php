<form action="<?= base_url('user/ubah') ?>" method="post">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText02" class="h5">Nama Lengkap</label>
                <input type="text" class="form-control" required value="<?= $user[0]['nama'] ?>" name="nama" id="exampleInputText02" placeholder="Nama Lengkap">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText005" class="h5">Username</label>
                <input type="text" required value="<?= $user[0]['username'] ?>" name="username" class="form-control" id="exampleInputText005" placeholder="Username">
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText2" class="h5">Role</label>
                <select required name="role" class="form-control" data-style="py-0">
                    <option <?php if($user[0]['role'] == 'admin') echo 'selected'; ?> value="admin">Admin</option>
                    <option <?php if($user[0]['role'] == 'keuangan') echo 'selected'; ?> value="keuangan">Keuangan</option>
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <label for="exampleInputText005" class="h5">Ubah Password <p class="text-danger">*isi jika ingin diubah</p></label>
                <input type="password" name="password" class="form-control" id="exampleInputText005" placeholder="Password">
            </div>
        </div>
        <input type="hidden" name="id" value="<?= $user[0]['user_id'] ?>">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-ceter justify-content-center mt-4">
                <button class="btn btn-primary mr-3" type="submit">Save</button>
                <div class="btn btn-primary" data-dismiss="modal">Cancel</div>
            </div>
        </div>
    </div>
</form>