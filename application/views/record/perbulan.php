<div id="record_perbulan">
	<div class="pencarian">
		<div class="well">
			<form class="form-search pull-left" id="search_record" method="get">
				<select name="tahun" id="tahun" class="input-small pad01">
					<option value='0'>- Tahun -</option>
					<option value="2012">2012</option> 
					<option value="2011">2011</option>
					<option value="2010">2010</option>
					<option value="2009">2009</option>
					<option value="2008">2008</option>
					<option value="2007">2007</option>
					<option value="2006">2006</option>
				</select>
				<select name="bulan" id="bulan" class="input-small pad01">
					<option value="0">- Bulan -</option>
					<option value="1">Januari</option>
					<option value="2">Februari</option>
					<option value="3">Maret</option>
					<option value="4">April</option>
					<option value="5">Mei</option>
					<option value="6">Juni</option>
					<option value="7">Juli</option>
					<option value="8">Agustus</option>
					<option value="9">Septeember</option>
					<option value="10">Oktober</option>
					<option value="11">November</option>
					<option value="12">Desember</option>
				</select>
				<button type="submit" class="btn">Lihat</button>
			</form>
		</div>
	</div>
	<div id="sub_head" style="text-align:center">
		<h2>DATA REKAP LOG PART BULAN - <?php echo strtoupper(bulan($bulan)) ?> - <?php echo $tahun ?></h2>
	</div>
	<table class="table table-bordered">
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
			<?php if (count($records) > 0) : ?>
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
			<?php else: ?>
				<tr><td colspan="6"><em>Tidak Ada Transaksi</em></td></tr>
			<?php endif ?>
			
		</tbody>
	</table>
	<a href="javascript:void(0)" class="btn btn-success pull-left" onclick="cetak(<?php echo $bulan ?>,<?php echo $tahun ?>)"><i class="icon-print icon-white"></i> Cetak</a>
</div>
<script type="text/javascript">
	$(function(){
		var CI = {'base_url':'<?php echo base_url() ?>'}
		cetak = function(bulan, tahun) {
			window.location = CI.base_url+"record/perbulan_print?bulan="+bulan+"&tahun="+tahun;
		}
	});
</script>