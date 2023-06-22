
        <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Uang Masuk</h5>
                                    <span class="badge badge-primary">Hari Ini</span>
                                </div>
                                <h3>Rp. <span class="counter"><?= number_format($hari_ini[0]['total']) ?></span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Uang Masuk</h5>
                                    <span class="badge badge-info">Bulan ini</span>
                                </div>
                                <h3>Rp. <span class="counter"><?= number_format($bulan_ini[0]['total']) ?></span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>User</h5>
                                    <span class="badge badge-warning">Total User</span>
                                </div>
                                <h3><span class="counter"><?= number_format($user[0]['total']) ?></span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <div class="top-block d-flex align-items-center justify-content-between">
                                    <h5>Siswa</h5>
                                    <span class="badge badge-success">Total Siswa</span>
                                </div>
                                <h3><span class="counter"><?= number_format($siswa[0]['total']) ?></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page end  -->
            </div>
        </div>