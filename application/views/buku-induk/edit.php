<?php $this->view('material-dashboard/header')?>

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">Edit buku</h4>
    </div>
    <div class="card-body">
        <form action="<?=site_url('bukuinduk/edit/' .$data_edit->id. '/submit')?>" id="form-buku_edit" method='post'>
            <div class="row">
                <div class="form-group col-6">
                    <label>judul_buku</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-journal-whills"></i>
                            </span>
                        </div>
                        <input type="text" name="judul_buku" class='form-control' value='<?=$data_edit->judul_buku?>'>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label>nomor_induk</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                        <input type="text" name="nomor_induk" class='form-control' value='<?=$data_edit->nomor_induk?>'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label>tanggal_penerimaan</label>
                    <input type="date" name="tanggal_penerimaan" class='form-control' value='<?=$data_edit->tanggal_penerimaan?>'>
                </div>
                <div class="form-group col-sm-4">
                    <label>no_panggil</label>
                    <input type="text" name="no_panggil" class='form-control' value='<?=$data_edit->no_panggil?>'>
                </div>
                <div class="form-group col-sm-4">
                    <label>no_register</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-registered"></i>
                            </span>
                        </div>
                        <input type="text" name="no_register" class='form-control' value='<?=$data_edit->no_register?>'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label>kode_ddc</label>
                    <input type="text" name="kode_ddc" class='form-control' value='<?=$data_edit->kode_ddc?>'>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label>pengarang</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-at"></i>
                            </span>
                        </div>
                        <input type="text" name="pengarang" class='form-control' value='<?=$data_edit->pengarang?>'>
                    </div>
                </div>

                <div class="form-group col-sm-2">
                    <label>tahun_terbit</label>
                    <input type="text" name="tahun_terbit" class='form-control' value='<?=$data_edit->tahun_terbit?>'>
                </div>

                <div class="form-group col-sm-4">
                    <label>penerbit</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-bullhorn"></i>
                            </span>
                        </div>
                        <input type="text" name="penerbit" class='form-control' value='<?=$data_edit->penerbit?>'>
                    </div>
                </div>
                <div class="form-group col-sm-2">
                    <label>kota_terbit</label>
                    <input type="text" name="kota_terbit" class='form-control' value='<?=$data_edit->kota_terbit?>'>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label>subjek</label>
                    <input type="text" name="subjek" class='form-control' value='<?=$data_edit->subjek?>'>
                </div>
                <div class="form-group col-6">
                    <label>kategori</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-tag"></i>
                            </span>
                        </div>
                        <input type="text" name="kategori" class='form-control' value='<?=$data_edit->kategori?>'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label>isbn</label>
                    <input type="text" name="isbn" class='form-control' value='<?=$data_edit->isbn?>'>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label>donatur</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-hand-holding"></i>
                            </span>
                        </div>
                        <input type="text" name="donatur" class='form-control' value='<?=$data_edit->donatur?>'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label>jumlah_eksemplar</label>
                    <input type="number" name="jumlah_eksemplar" class='form-control' value='<?=$data_edit->jumlah_eksemplar?>'>
                </div>
                <div class="form-group col-sm-4">
                    <label>halaman</label>
                    <input type="number" name="halaman" class='form-control' value='<?=$data_edit->halaman?>'>
                </div>
                <div class="form-group col-sm-4">
                    <label>ukuran</label>
                    <input type="text" name="ukuran" class='form-control' value='<?=$data_edit->ukuran?>'>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label>harga</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <strong>Rp.</strong>
                            </span>
                        </div>
                        <input type="text" name="harga" class='form-control' value='<?=$data_edit->harga?>'>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="submit" name="submit" class="btn btn-primary btn-block">
                </div>
            </div>
        </form>
    </div> <!-- end col-12 -->
</div> <!-- end div.card -->

<?php $this->view('material-dashboard/js_script')?>

<script type="text/javascript">
    $("#form-buku_edit").submit(function(e) {
        if (!confirm('Edit buku?')) {
            e.preventDefault();
        }
    });
</script>
<?php $this->view('material-dashboard/footer')?>