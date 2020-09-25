
// ---------------------------------------------------
// Menonaktifkan Perfect Scrollbar 
// (karena scrolling menjadi tidak smooth)
// ---------------------------------------------------
$('.main-panel').perfectScrollbar('destroy');

// ---------------------------------------------------
// Mengaktifkan Tooltip
// ---------------------------------------------------
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

// ---------------------------------------------------
// Membuat Bootstrap Notify
// ---------------------------------------------------
function buat_notifikasi(notifikasi) {
	$.notify({
		icon: notifikasi.icon,
		message: notifikasi.message
	},
	{
		type: notifikasi.type,
		timer: 3000,
		placement: {
			from: 'top',
			align: 'right'
		}
	});
	
}