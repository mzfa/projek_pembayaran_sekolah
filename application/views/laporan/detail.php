<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">
                                <table class="table">
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td><?= $siswa[0]['nama_siswa'] ?></td>
                                        <td>&nbsp;</td>
                                        <th>No Telp</th>
                                        <td><?= $siswa[0]['no_telp'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Periode Masuk</th>
                                        <td><?= $siswa[0]['periode_masuk'] ?></td>
                                        <td>&nbsp;</td>
                                        <th>Tanggal Masuk</th>
                                        <td><?= $siswa[0]['tanggal_masuk'] ?></td>
                                    </tr>
                                </table>
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
                                        <th>Periode Pembayaran</th>
                                        <th>Jenis Pembayaran</th>
                                        <th>Status Pembayaran</th>
                                        <th>Total Bayar</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $siswa_id = $siswa[0]['siswa_id'];
                                    $no = 1;
                                    $periode_sekarang = date('Ym');
                                    $periode_masuk = $siswa[0]['periode_masuk'];
                                    $status_transaksi = true;
                                    $tahun = (int) substr($periode_masuk,0,4);
                                    $bulan = (int) substr($periode_masuk,4);
                                    $tahun_sekarang = (int) date('Y');
                                    $bulan_sekarang = (int) date('m');
                                    $periode_bulan=(int) substr($periode_masuk,4);
                                    $periode_tahun=(int) substr($periode_masuk,0,4);
                                    $periode_bayaran = 0;
                                    while ($status_transaksi) { 
                                        $tahun_daftar = (int) substr($periode_masuk,0,4);
                                        $bulan_daftar = (int) substr($periode_masuk,4);
                                        // echo $bulan;
                                        if($bulan == $bulan_sekarang){
                                            if($tahun == $tahun_sekarang){
                                                // echo "sini";
                                                $periode_bulan = sprintf("%02s", $bulan);
                                                $periode_tahun = sprintf("%02s", $tahun);
                                                $status_transaksi = false;
                                            }else{
                                                if($bulan < 12){
                                                    $periode_tahun = sprintf("%02s", $tahun);
                                                    $periode_bulan = sprintf("%02s", $bulan);
                                                    $bulan += 1;
                                                }else{
                                                    $periode_bulan = sprintf("%02s", $bulan);
                                                    $periode_tahun = sprintf("%02s", $tahun);
                                                    $tahun += 1;
                                                    $bulan = 1;
                                                }
                                            }
                                        }else{
                                            if($bulan < 12){
                                                $periode_tahun = sprintf("%02s", $tahun);
                                                $periode_bulan = sprintf("%02s", $bulan);
                                                $bulan += 1;
                                            }else{
                                                $periode_bulan = sprintf("%02s", $bulan);
                                                $periode_tahun = sprintf("%02s", $tahun);
                                                $tahun += 1;
                                                $bulan = 1;
                                                // echo $tahun;
                                            }
                                        }


                                        // if($periode_masuk == $periode_sekarang){
                                        //     $status_transaksi = false;
                                        // }
                                         
                                        if($no == 20){
                                            $status_transaksi = false;
                                        }       
                                        $periode_fix = $periode_tahun.$periode_bulan;
                                        $jenis_pembayaran = "";          
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $periode_fix ?></td>
                                            <td>
                                                <?php
                                                    if($periode_fix == $periode_masuk){
                                                        $jenis_pembayaran = 1;
                                                        echo "Biaya Awal Tahun";
                                                    }elseif($periode_bulan == '06'){
                                                        $jenis_pembayaran = 2;
                                                        echo "Daftar Ulang";
                                                    }else{
                                                        $jenis_pembayaran = 3;
                                                        echo "SPP";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                
                                                <?php
                                                    $cek_lunas = $this->db->query("SELECT * FROM transaksi WHERE siswa_id='$siswa_id' AND periode_transaksi='$periode_fix'")->result_array();
                                                    $total_bayar = 0;
                                                    if(!empty($cek_lunas[0])){
                                                        // echo $cek_lunas[0]['total']
                                                        echo '<span class="badge badge-success">Sudah Bayar</span>';
                                                        $total_bayar = $cek_lunas[0]['total_bayar'];
                                                    }else{
                                                        echo '<span class="badge badge-danger">Belum Bayar</span>';
                                                    }
                                                ?>
                                            </td>
                                            <td>Rp. <?= number_format($total_bayar) ?></td>
                                            <td>
                                                <?php if($total_bayar == 0){ ?>
                                                    <a href="#" onclick="return bayar('<?= $siswa_id ?>','<?= $periode_fix ?>','<?= $jenis_pembayaran ?>')" class="btn btn-success">Detail</a>
                                                <?php }else{ ?>
                                                    <a target="_blank" href="<?= base_url('transaksi/cetak_bukti/'.$siswa_id.'/'.$periode_fix.'/'.$jenis_pembayaran.'/') ?>" class="btn btn-success">Cetak Bukti</a>
                                                <?php } ?>
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
        function bayar(id, periode, jenis) {
            $.ajax({
                type: 'get',
                url: "<?= base_url('transaksi/bayar') ?>/" + id + '/' + periode + '/' + jenis,
                // data:{'id':id}, 
                success: function(tampil) {

                    // console.log(tampil); 
                    $('#tampildata').html(tampil);
                    $('#edit').modal('show');
                }
            })
        }
    </script>