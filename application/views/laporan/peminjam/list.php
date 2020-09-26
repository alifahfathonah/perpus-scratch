<?php $this->view('material-dashboard/header')?>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <button style="position: absolute; right: 0" onclick="window.print()" type="button" data-toggle='tooltip' title='Cetak laporan' class="btn btn-primary btn-fab rounded-circle d-print-none">
                    <i class="fas fa-print fa-xs"></i>
                </button>
                <h3 class="text-center mb-5">LAPORAN DATA PEMINJAM</h3>
                <div class="table-responsive">
                    <style type="text/css">
                        table tr td {
                            padding: 0 !important;
                        }
                    </style>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>nis</th>
                                <th>nama_siswa</th>
                                <th>no_panggil</th>
                                <th>judul_buku</th>
                                <th>pengarang</th>
                                <th>isbn</th>
                                <th>tanggal</th>
                                <th>waktu</th>
                                <th>kembali</th>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 0;
                                foreach ($data_peminjam as $peminjam) {
                                    $no++;
                            ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$peminjam->nis?></td>
                                <td><?=$peminjam->nama_siswa?></td>
                                <td><?=$peminjam->no_panggil?></td>
                                <td><?=$peminjam->judul_buku?></td>
                                <td><?=$peminjam->pengarang?></td>
                                <td><?=$peminjam->isbn?></td>
                                <td><?=$peminjam->tanggal?></td>
                                <td><?=$peminjam->waktu?></td>
                                <td><?=$peminjam->kembali?></td>
                            </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col-12 -->
</div> <!-- end div.card -->

<?php $this->view('material-dashboard/js_script')?>

<script type="text/javascript">
</script>
<?php $this->view('material-dashboard/footer')?>