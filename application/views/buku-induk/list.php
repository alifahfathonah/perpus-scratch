<?php $this->view('material-dashboard/header')?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">Selamat datang di halaman buku induk</h3>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="places-buttons">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <h4 class="card-title">
                        Notifications Places
                        <p class="category">Click to view notifications</p>
                    </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="md.showNotification('top','left')">Top Left</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="md.showNotification('top','center')">Top Center</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="md.showNotification('top','right')">Top Right</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="md.showNotification('bottom','left')">Bottom Left</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="md.showNotification('bottom','center')">Bottom Center</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-block" onclick="md.showNotification('bottom','right')">Bottom Right</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col-12 -->
</div> <!-- end div.card -->

<?php $this->view('material-dashboard/js_script')?>

<script type="text/javascript">
    buat_notifikasi({
        type: 'success',
        message: 'Awokawokawokawwww Yaa',
        icon: 'fas fa-home'
    })
</script>
<?php $this->view('material-dashboard/footer')?>