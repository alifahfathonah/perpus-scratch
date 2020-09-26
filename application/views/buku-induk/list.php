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
                <label>Cari judul buku</label>
                <div class="input-group">
                    <input type="text" id="filter-judul_buku" class="form-control">
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
            <h4 class="card-header">Data Buku Induk</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th>Judul buku</th>
                            <th>Tanggal penerimaan</th>
                            <th>No panggil</th>
                            <th>No register</th>
                            <th>Nomor induk</th>
                            <th>Kode ddc</th>
                            <th>Pengarang</th>
                            <th>Tahun terbit</th>
                            <th>Penerbit</th>
                            <th>Kota_terbit</th>
                            <th>Subjek</th>
                            <th>Kategori</th>
                            <th>Isbn</th>
                            <th>Donatur</th>
                            <th>Jumlah eksemplar</th>
                            <th>Halaman</th>
                            <th>Ukuran</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody id="buku_induk-load">
                        
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


    var bukuIndukFilter = {
        limit: 10,
        page: 1,
    }

    $("#filter-page").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            bukuIndukFilter.page = value;
        }    
        else {
            $(this).val(1)
            delete bukuIndukFilter.page;
        }
        refresh_buku_induk()
    })
    $("#filter-limit").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            bukuIndukFilter.limit = value;
        }    
        else {
            $(this).val(10)
            bukuIndukFilter.limit = 10;
        }
        refresh_buku_induk()
    })
    $("#filter-judul_buku").on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            bukuIndukFilter.judul_buku = value;
        }    
        else {
            delete bukuIndukFilter.judul_buku;
        }
        refresh_buku_induk()
    })

    function refresh_buku_induk() {
        $.ajax({
            url: '<?=site_url('bukuinduk/ajax_daftar_buku')?>',
            type: 'GET',
            dataType: 'html',
            data: bukuIndukFilter,
        })
        .done(function(data) {
            $.getScript('<?=site_url('assets/custom/js/default.js')?>')
            if (data != '') {
                $('#buku_induk-load').html(data)

                eventSetelahLoad();
            }
            else {
                $('#buku_induk-load').html(`<tr><td colspan='99' class='text-center'>Tidak ada data</td></tr>`);
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

    refresh_buku_induk()
   
</script>
<?php $this->view('material-dashboard/footer')?>