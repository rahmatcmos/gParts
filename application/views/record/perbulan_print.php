<div id="record_perbulan">
	<div id="sub_head" style="">
		<h2>DATA REKAP LOG PART BULAN - <?php echo strtoupper(bulan($bulan)) ?> - <?php echo $tahun ?></h2>
	</div>
	<table class="table table-bordered" border="1px" cellpadding="5px" cellspacing="0px">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Part</th>
				<th>Tanggal</th>
				<th>Waktu</th>
				<th>Tambah</th>
				<th>Ambil</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 1 ?>
			<?php foreach ($records as $record): ?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $record->nama_part ?></td>
					<td><?php echo $record->tanggal ?></td>
					<td><?php echo $record->waktu ?> WIB</td>
					<?php if ($record->jenis_pesan == 'tambah'): ?>
						<td><?php echo $record->jml ?></td>
						<td>-</td>
					<?php else: ?>
						<td>-</td>
						<td><?php echo $record->jml ?></td>
					<?php endif ?>
					
				</tr>
				<?php $i += 1 ?>
			<?php endforeach ?>
		</tbody>
	</table>
</div>