<div id="delete_part">
	<div class="pencarian">
		<div class="well">
			<?php echo form_open($controller.'/delete', array('class'=>'form-search pull-left', 'method'=>'get')); ?>
			<?php echo form_input(array('name'=>'pencarian', 'class'=>'input-medium search-query')); ?>
				<select name="by" id="search_parts_by" class="input-medium">
					<option value="">-- Search By --</option>
					<option value="kd_part">Kode Part</option>
					<option value="nama_part">Nama Part</option>
					<option value="stock_minimum">Stock Minimum</option>
					<option value="zone">Zone</option>
					<option value="lokasi_rak">Lokasi Rack</option>
				</select>
				<button type="submit" class="btn">Search</button>
			<?php echo form_close() ?>
			<div class="tanggal pull-right"><?php echo date('d M Y') ?></div>
		</div>
	</div>
	<table class="table table-bordered table-condensed" >
		<thead>
			<tr>
				<th width="30px">No</th>
				<th width="70px">Kode Part</th>
				<th width="240px">Nama Part</th>
				<th width="170px">Spek Detail</th>
				<th width="80px">Lokasi Rack</th>
				<th width="70px">Jumlah Minimum</th>
				<th width="70px">Jumlah Stock</th>
				<th width="70px">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($part_minim): ?>
				<?php $i = (1+$this->uri->segment(3)); foreach ($part_minim as $part): ?>
				<?php $min_stok_color = ($part->jml_stok < $part->jml_min) ? "style='color:red'" : ''; ?>
				<tr>
					<td width="30px"><?php echo $i++ ?></td>
					<td width="70px"><?php echo $part->kd_part ?></td>
					<td width="240px"><?php echo $part->nama_part ?></td>
					<td width="170px"><?php echo $part->spec_detail ?></td>
					<td align="center" width="80px"><?php echo $part->lokasi_rak ?></td>
					<td align="center" width="70px"><?php echo $part->jml_min ?> <?php echo set_satuan($part->sat_jml_min) ?></td>
					<td align="center" width="70px" <?php echo $min_stok_color; ?> >
						<?php echo $part->jml_stok ?> <?php echo set_satuan($part->sat_jml_stok) ?>
					</td>
					<td>
						<a href="javascript:void(0)" class="btn btn-danger delete_part" onclick='delete_part("<?php echo $part->kd_part ?>")'><i class='icon-trash icon-white'></i> Delete</a>
					</td>
				</tr>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td colspan="7"><em>No Data Available</em></td>
				</tr>
			<?php endif ?>
			
		</tbody>
	</table>
	<?php echo $this->pagination->create_links(); ?>
</div>
<script type="text/javascript">
	var CI = {'base_url':'<?php echo base_url() ?>'}

	
		delete_part = function(kd_part) {
			if (confirm("Are you sure want to delete this part?")) {
				$.ajax({
					type: 'get',
					url: CI.base_url + 'parts/delete',
					dataType: 'json',
					data: {kd_part: kd_part},
					success: function(data) {
						console.log(data.result);
						if (data.result) {alert("Data '"+kd_part+"' Berhasil dihapus");location.reload()};
					}
				});
			} else {
				return false;
			}
		}
	
</script> 	