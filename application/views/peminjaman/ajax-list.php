<?php 
	$no = 0;
	foreach ($data_filtered as $data) {
		$no++;
?>
<tr>
	<td><strong><?=$no?></strong></td>
	<td>
		<a data-toggle='tooltip' title='Edit Data' data-placement='right' href="<?=site_url('peminjaman/edit/' . $data->id)?>" class='btn btn-edit btn-round btn-fab btn-default d-inline'>
			<i class="fas fa-edit" style="width: 28px; font-size: 10pt; position: relative; top: -4px; left: 1px"></i>
		</a><br/>
		<a data-toggle='tooltip' title='Hapus Data' data-placement='right' href="<?=site_url('peminjaman/delete/' . $data->id)?>" class='btn btn-delete btn-round btn-fab btn-danger d-inline'>
			<i class="fas fa-trash" style="width: 28px; font-size: 10pt; position: relative; top: -4px; left: 0px"></i>
		</a>
	</td>

	<td><?=$data->nama_siswa?></td>
	<td><?=$data->nis?></td>
	<td><?=$data->no_panggil?></td>
	<td><?=$data->judul_buku?></td>
	<td><?=$data->pengarang?></td>
	<td><?=$data->isbn?></td>
	<td style="font-weight: bold"><?=date('d-m-Y', strtotime($data->tanggal))?><br/><?=$data->waktu?></td>
	<td style="font-weight: bold"><?=date('d-m-Y', strtotime($data->kembali))?></td>
</tr>
<?php 
	}
	if ($no <= 0) {
?>
<tr><td colspan='99' class='text-center'>Tidak ada data</td></tr>
<?php 
	}
?>