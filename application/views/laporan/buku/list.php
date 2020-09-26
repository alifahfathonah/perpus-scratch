<?php $this->view('material-dashboard/header')?>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <button style="position: absolute; right: 0" onclick="window.print()" type="button" data-toggle='tooltip' title='Cetak laporan' class="btn btn-primary btn-fab rounded-circle d-print-none">
                    <i class="fas fa-print fa-xs"></i>
                </button>
                <h3 class="text-center mb-5">LAPORAN DATA BUKU</h3>
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
                                <th>tanggal_penerimaan</th>
                                <th>no_panggil</th>
                                <th>no_register</th>
                                <th>nomor_induk</th>
                                <th>kode_ddc</th>
                                <th>pengarang</th>
                                <th>judul_buku</th>
                                <th>tahun_terbit</th>
                                <th>penerbit</th>
                                <th>kota_terbit</th>
                                <th>subjek</th>
                                <th>kategori</th>
                                <th>isbn</th>
                                <th>donatur</th>
                                <th>jumlah_eksemplar</th>
                                <th>halaman</th>
                                <th>ukuran</th>
                                <th>harga</th>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 0;
                                foreach ($data_buku as $buku) {
                                    $no++;
                            ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$buku->tanggal_penerimaan?></td>
                                <td><?=$buku->no_panggil?></td>
                                <td><?=$buku->no_register?></td>
                                <td><?=$buku->nomor_induk?></td>
                                <td><?=$buku->kode_ddc?></td>
                                <td><?=$buku->pengarang?></td>
                                <td><?=$buku->judul_buku?></td>
                                <td><?=$buku->tahun_terbit?></td>
                                <td><?=$buku->penerbit?></td>
                                <td><?=$buku->kota_terbit?></td>
                                <td><?=$buku->subjek?></td>
                                <td><?=$buku->kategori?></td>
                                <td><?=$buku->isbn?></td>
                                <td><?=$buku->donatur?></td>
                                <td><?=$buku->jumlah_eksemplar?></td>
                                <td><?=$buku->halaman?></td>
                                <td><?=$buku->ukuran?></td>
                                <td><?=$buku->harga?></td>
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