			</div> <!-- Penutup dari content -->
		</div> <!-- Penutup dari main-panel -->
	</div> <!-- Penutup dari div.wrapper -->
	<!--   Core JS Files   -->
	<script src="<?=site_url('assets/materialdashboard/')?>/js/core/jquery.min.js" type="text/javascript"></script>
	<script src="<?=site_url('assets/materialdashboard/')?>/js/core/popper.min.js" type="text/javascript"></script>
	<script src="<?=site_url('assets/materialdashboard/')?>/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
	<script src="<?=site_url('assets/materialdashboard/')?>/js/plugins/perfect-scrollbar.jquery.min.js"></script>

	<!-- Chartist JS -->
	<script src="<?=site_url('assets/materialdashboard/')?>/js/plugins/chartist.min.js"></script>
	<!--  Notifications Plugin    -->
	<script src="<?=site_url('assets/materialdashboard/')?>/js/plugins/bootstrap-notify.js"></script>
	<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="<?=site_url('assets/materialdashboard/')?>/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
	<script src="<?=site_url('assets/materialdashboard/')?>/js/demo.js"></script>

	<script src="<?=site_url('assets/custom/')?>/js/default.js"></script>


	<?php 
		foreach ($ui_js as $js) {
	?>
	<script type="text/javascript" src="<?=site_url('assets/' .$js)?>"></script>
	<?php
		}
	?>
