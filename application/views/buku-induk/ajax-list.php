<?php 
	$no = 0;
	foreach ($data_filtered as $data) {
		$no++;
?>
<tr>
	<td><strong><?=$no?></strong></td>
	<td>
		<a data-toggle='tooltip' title='Edit Data' data-placement='right' href="<?=site_url('bukuinduk/edit/' . $data->id)?>" class='btn btn-edit btn-round btn-fab btn-default d-inline'>
			<i class="fas fa-edit" style="width: 28px; font-size: 10pt; position: relative; top: -4px; left: 1px"></i>
		</a>
		<a data-toggle='tooltip' title='Hapus Data' data-placement='right' href="<?=site_url('bukuinduk/delete/' . $data->id)?>" class='btn btn-delete btn-round btn-fab btn-danger d-inline'>
			<i class="fas fa-trash" style="width: 28px; font-size: 10pt; position: relative; top: -4px; left: 0px"></i>
		</a>
	</td>
	<td><?=$data->judul_buku?></td>
	<td><?=date('d-F-Y', strtotime($data->tanggal_penerimaan))?></td>
	<td><?=$data->no_panggil?></td>
	<td><?=$data->no_register?></td>
	<td><?=$data->nomor_induk?></td>
	<td><?=$data->kode_ddc?></td>
	<td><?=$data->pengarang?></td>
	<td><?=$data->tahun_terbit?></td>
	<td><?=$data->penerbit?></td>
	<td><?=$data->kota_terbit?></td>
	<td><?=$data->subjek?></td>
	<td><?=$data->kategori?></td>
	<td><?=$data->isbn?></td>
	<td><?=$data->donatur?></td>
	<td><?=$data->jumlah_eksemplar?></td>
	<td><?=$data->halaman?></td>
	<td><?=$data->ukuran?></td>
	<td class="font-weight-bold">Rp. <?=number_format($data->harga, 0, '', '.')?></td>
</tr>
<?php 
	}
	if ($no <= 0) {
?>
<tr><td colspan='99' class='text-center'>Tidak ada data</td></tr>
<?php 
	}
?>