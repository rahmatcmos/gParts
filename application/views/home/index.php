<div id="home">
	<div id="sub_head" style="text-align:center">
		<h3>DATA PART MINIMUM PER TANGGAL</h3>
	</div>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th width="50px">Kode Part</th>
				<th width="240px">Nama Part</th>
				<th width="170px">Spek Detail</th>
				<th width="80px">Lokasi Rack</th>
				<th width="70px">Jumlah Minimum</th>
				<th width="70px">Jumlah Stock</th>
			</tr>
		</thead>
	</table>
	<marquee height="250px" scrolldelay="330" direction="up" onmousedown="this.stop()" onmouseup="this.start()">
		<table class="table table-striped table-condensed" style="height:200px">
			<tbody>
				<?php foreach ($part_minim as $part): ?>
					<tr>
						<td width="50px"><?php echo $part->kd_part ?></td>
						<td width="240px"><?php echo $part->nama_part ?></td>
						<td width="170px"><?php echo $part->spec_detail ?></td>
						<td align="center" width="80px"><?php echo $part->lokasi_rak ?></td>
						<td align="center" width="70px"><?php echo $part->jml_min ?> <?php echo set_satuan($part->sat_jml_min) ?></td>
						<td align="center" width="70px" style="color:red"><?php echo $part->jml_stok ?> <?php echo set_satuan($part->sat_jml_stok) ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</marquee>
	<div id="detail" style="border:1px solid #ccc;border-radius:5px;margin-top:20px">
		<p style="text-align:left;margin:5px">
			Total jumlah part saat ini : <strong><?php echo $count_part; ?></strong> jenis part <?php echo anchor('home/search/', 'Detail', array('class'=>"btn btn-primary btn-mini")); ?><br>
			Jumlah part yang minim saat init ada <strong><?php echo $count_minim_part ?></strong> jenis part 
			
		</p>
	</div>
</div>