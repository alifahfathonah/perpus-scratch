<?php $this->view('material-dashboard/header')?>

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">Tambah data transaksi</h4>
    </div>
    <div class="card-body">
        <form action="<?=site_url('peminjaman/edit/' .$data_edit->id. '/submit')?>" id="form-peminjaman" method='post'>
            <div class="row">
                <div class="form-group col-6">
                    <label class="pl-5">tanggal</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-calendar-alt'></i></span>
                        </div>
                        <input type="date" value="<?=date('Y-m-d')?>" name="tanggal" value="<?=$data_edit->tanggal?>" class='form-control' readonly>
                    </div>
                </div>
                <div class="form-group col-6">
                    <label class="pl-5">waktu</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-clock'></i></span>
                        </div>
                        <input type="time" value="<?=date('H:m:s')?>" name="waktu" value="<?=$data_edit->waktu?>" class='form-control' readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col"><h4 class="card-title mt-5">Data Siswa</h4><hr/></div>
            </div>
            <div class="row">
                <div class="form-group col-4 form-group-nis has-danger label-floating">
                    <label class="control-label pl-5">nis</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-key'></i></span>
                        </div>
                        <input type="text" name="nis" value="<?=$data_edit->nis?>" class='form-control'>
                        <span class="form-control-feedback">
                            <i class="fas"></i>
                        </span>
                    </div>
                    <span class="pl-5 form-text text-muted font-italic"></span>
                </div>
                <div class="form-group col-8">
                    <label class="pl-5">nama_siswa</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-user'></i></span>
                        </div>
                        <input type="text" name="nama_siswa" value="<?=$data_edit->nama_siswa?>" class='form-control' readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col"><h4 class="card-title mt-5">Data Buku</h4><hr/></div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 form-group-buku">
                    <label class="pl-5">no_panggil</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-hand-pointer'></i></span>
                        </div>
                        <input type="text" name="no_panggil" value="<?=$data_edit->no_panggil?>" class='form-control'>
                        <span class="form-control-feedback"><i class="fas"></i></span>
                    </div>
                    <span class="form-text text-muted font-italic pl-5"></span>
                </div>
                <div class="form-group col-md-3">
                    <label class="pl-5">isbn</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-journal-whills'></i></span>
                        </div>
                        <input type="text" name="isbn" value="<?=$data_edit->isbn?>" class='form-control' readonly>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label class="pl-5">pengarang</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-at'></i></span>
                        </div>
                        <input type="text" name="pengarang" value="<?=$data_edit->pengarang?>" class='form-control' readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label class="pl-5">judul_buku</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-heading'></i></span>
                        </div>
                        <input type="text" name="judul_buku" value="<?=$data_edit->judul_buku?>" class='form-control' readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <label class="pl-5">kembali</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class='fas fa-exchange-alt'></i></span>
                        </div>
                        <input type="date" name="kembali" value="<?=$data_edit->kembali?>" class='form-control'>
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


    // Pengambilan data siswa

    berhasil_ambil_siswa = true;
    function get_siswa(nis) {
        $.ajax({
            url: '<?=site_url('peminjaman/ajax_get_siswa')?>',
            type: 'GET',
            dataType: 'json',
            data: {nis: nis},
        })
        .done(function(data) {
            if (data != null) {
                $(".form-group-nis").removeClass('has-danger')
                $(".form-group-nis").addClass('has-success')
                $(".form-group-nis .form-control-feedback i").removeClass('fa-times')
                $(".form-group-nis .form-control-feedback i").addClass('fa-check')

                $(".form-group-nis .form-text").removeClass('text-danger')
                $(".form-group-nis .form-text").addClass('text-success')
                $(".form-group-nis .form-text").html('berhasil mengambil data siswa berdasarkan nis ini')

                $("input[name='nama_siswa']").val(data.nama)

                berhasil_ambil_siswa = true
            }
            else {
                $(".form-group-nis").addClass('has-danger')
                $(".form-group-nis").removeClass('has-success')
                $(".form-group-nis .form-control-feedback i").addClass('fa-times')
                $(".form-group-nis .form-control-feedback i").removeClass('fa-check')

                $(".form-group-nis .form-text").addClass('text-danger')
                $(".form-group-nis .form-text").removeClass('text-success')
                $(".form-group-nis .form-text").html('tidak ada data siswa yang cocok dengan nis ini')

                $("input[name='nama_siswa']").val('');

                berhasil_ambil_siswa = false
            }
        })
        .fail(function() {
            berhasil_ambil_siswa = false

            $(".form-group-nis").addClass('has-danger')
            $(".form-group-nis").removeClass('has-success')
            $(".form-group-nis .form-control-feedback i").addClass('fa-times')
            $(".form-group-nis .form-control-feedback i").removeClass('fa-check')

            $(".form-group-nis .form-text").addClass('text-danger')
            $(".form-group-nis .form-text").removeClass('text-success')
            $(".form-group-nis .form-text").html('<strong>Error:</strong> tidak dapat mengambil data siswa')

            buat_notifikasi({
                type: 'danger',
                message: '<strong>Error : </strong>Tidak bisa mengambil data siswa',
                icon: 'fas fa-times'
            })
        })
    }

    $("input[name='nis']").on('change', function(e) {
        get_siswa($(this).val());
    })

    $("input[name='nis']").on('keydown', function(e) {
        if (e.keyCode == 13) {
            e.preventDefault()
            $(this).trigger('change')
        }
    })





    berhasil_ambil_buku = true;
    function get_buku(no_panggil) {
        $.ajax({
            url: '<?=site_url('peminjaman/ajax_get_buku')?>',
            type: 'GET',
            dataType: 'json',
            data: {no_panggil: no_panggil},
        })
        .done(function(data) {
            if (data != null) {
                $(".form-group-buku").removeClass('has-danger')
                $(".form-group-buku").addClass('has-success')
                $(".form-group-buku .form-control-feedback i").removeClass('fa-times')
                $(".form-group-buku .form-control-feedback i").addClass('fa-check')

                $(".form-group-buku .form-text").removeClass('text-danger')
                $(".form-group-buku .form-text").addClass('text-success')
                $(".form-group-buku .form-text").html('berhasil mengambil data buku berdasarkan nomor panggil ini')

                $("input[name='isbn']").val(data.isbn)
                $("input[name='pengarang']").val(data.pengarang)
                $("input[name='judul_buku']").val(data.judul_buku)

                berhasil_ambil_buku = true
            }
            else {
                $(".form-group-buku").addClass('has-danger')
                $(".form-group-buku").removeClass('has-success')
                $(".form-group-buku .form-control-feedback i").addClass('fa-times')
                $(".form-group-buku .form-control-feedback i").removeClass('fa-check')

                $(".form-group-buku .form-text").addClass('text-danger')
                $(".form-group-buku .form-text").removeClass('text-success')
                $(".form-group-buku .form-text").html('tidak ada data buku yang cocok dengan nomor panggil ini')

                $("input[name='isbn']").val('')
                $("input[name='pengarang']").val('')
                $("input[name='judul_buku']").val('')

                berhasil_ambil_buku = false
            }
        })
        .fail(function() {
            berhasil_ambil_buku = false

            $(".form-group-nis").addClass('has-danger')
            $(".form-group-nis").removeClass('has-success')
            $(".form-group-nis .form-control-feedback i").addClass('fa-times')
            $(".form-group-nis .form-control-feedback i").removeClass('fa-check')

            $(".form-group-nis .form-text").addClass('text-danger')
            $(".form-group-nis .form-text").removeClass('text-success')
            $(".form-group-nis .form-text").html('<strong>Error:</strong> tidak dapat mengambil data buku')

            buat_notifikasi({
                type: 'danger',
                message: '<strong>Error : </strong>Tidak bisa mengambil data buku',
                icon: 'fas fa-times'
            })
        })
    }


    $("input[name='no_panggil']").on('change', function(e) {
        get_buku($(this).val());
    })

    $("input[name='no_panggil']").on('keydown', function(e) {
        if (e.keyCode == 13) {
            e.preventDefault()
            $(this).trigger('change')
        }
    })



    $("#form-peminjaman").submit(function(e) {
        
        if (!berhasil_ambil_siswa) {
            e.preventDefault();
            alert('Masukkan data siswa terlebih dahulu ajg')
            return
        }
        if (!berhasil_ambil_buku) {
            e.preventDefault();
            alert('Masukkan data buku terlebih dahulu ajg')
            return
        }
        if ($("input[name='kembali']").val() == '') {
            e.preventDefault();
            alert('Masukkan tanggal kembali terlebih dahulu ajg')
            return
        }

        if (!confirm('Lakukan transaksi peminjaman?')) {
            e.preventDefault();
        }
    });
</script>
<?php $this->view('material-dashboard/footer')?>