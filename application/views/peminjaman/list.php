<?php $this->view('material-dashboard/header')?>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-2 col-md-1">
                <label>Halaman</label>
                <input type="number" id="filter-page" value="1" min="1" class="form-control">
            </div>
            <div class="form-group col-2 col-md-1">
                <label>Item/Page</label>
                <input type="number" id="filter-limit" value="10" min="10" class="form-control">
            </div>
            <div class="form-group col-8 col-md-10">
                <label>Cari Nama Siswa</label>
                <div class="input-group">
                    <input type="text" id="filter-nama_siswa" class="form-control">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-primary btn-fab btn-round"><i class="fas fa-search" style="font-size: 12pt; position: relative; top: -2px"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <h4 class="card-header">Transaksi Peminjaman</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <td>nama_siswa</td>
                            <td>nis</td>
                            <td>no_panggil</td>
                            <td>judul_buku</td>
                            <td>pengarang</td>
                            <td>isbn</td>
                            <td>Tgl/waktu</td>
                            <td>kembali</td>
                        </tr>
                    </thead>
                    <tbody id="peminjaman-load">
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col-12 -->
</div> <!-- end div.card -->

<?php $this->view('material-dashboard/js_script')?>

<script type="text/javascript">

    // Menampikan notifikasi
    <?php 
        $notif = $this->input->get('notif');
        if (isset($notif)) {
            $message = $this->input->get('message');
            $type = $this->input->get('type');
            $icon = $this->input->get('icon');
    ?>

    buat_notifikasi( {
        message: '' + <?="'" . $message . "'"?>, 
        icon: '' + <?="'" . $icon . "'"?>, 
        type: '' + <?="'" . $type . "'"?>
    })

    <?php 
        }
    ?>


    var peminjamanFilter = {
        limit: 10,
        page: 1,
    }

    $("#filter-page").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            peminjamanFilter.page = value;
        }    
        else {
            $(this).val(1)
            delete peminjamanFilter.page;
        }
        refresh_peminjaman()
    })
    $("#filter-limit").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            peminjamanFilter.limit = value;
        }    
        else {
            $(this).val(10)
            peminjamanFilter.limit = 10;
        }
        refresh_peminjaman()
    })
    $("#filter-nama_siswa").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            peminjamanFilter.nama_siswa = value;
        }    
        else {
            delete peminjamanFilter.nama_siswa;
        }
        refresh_peminjaman()
    })

    function refresh_peminjaman() {
        $.ajax({
            url: '<?=site_url('peminjaman/ajax_daftar_peminjaman')?>',
            type: 'GET',
            dataType: 'html',
            data: peminjamanFilter,
        })
        .done(function(data) {
            $.getScript('<?=site_url('assets/custom/js/default.js')?>')
            if (data != '') {
                $('#peminjaman-load').html(data)

                eventSetelahLoad();
            }
            else {
                $('#peminjaman-load').html(`<tr><td colspan='99' class='text-center'>Tidak ada data</td></tr>`);
            }
        })
    }

    function eventSetelahLoad() {
        $('.btn-delete').click(function(e) {
            if (!confirm('Anda yakin?, data yang dihapus tidak bisa dikembalikan.')) {
                e.preventDefault();
            }       
        });
    }

    refresh_peminjaman()
   
</script>
<?php $this->view('material-dashboard/footer')?>