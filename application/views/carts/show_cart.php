<h3>List Ordered Part</h3>
<span>
	Kode Pesan : <?php echo $kd_pesan ?> <br>
	Tanggal : <?php echo $tgl_pesan; ?>
</span>
<table class="table table-bordered">
	<thead>
		<tr style="background-color: rgb(51, 51, 51); color: white">
			<th>No</th>
			<th>Kode Part</th>
			<th>Nama Part</th>
			<th>Spec Detail</th>
			<th>Jumlah</th>	
		</tr>
	</thead>
	<tbody>
	<?php $i = 1; foreach ($items as $item): ?>
		<tr>
			<td><?php echo $i++ ?></td>
			<td><?php echo $item['kd_part'] ?></td>
			<td><?php echo $item['nama_part'] ?></td>
			<td><?php echo $item['spec_detail'] ?></td>
			<td><?php echo $item['qty'] ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
<script type="text/javascript">
	// print page
	print();
</script>