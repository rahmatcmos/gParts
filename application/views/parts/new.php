<div id="edit_part">
	<?php echo form_open('parts/create', array('class'=>'form-horizontal', 'id'=>'formNew')); ?>
	<!-- <div class="form-horizontal" id="tambah_item"> -->
		<fieldset>
			<legend>Tambah Item Baru</legend>
			<div class="control-group">
				<?php echo form_label('Kode Part','kd_part',array('class'=>'control-label')) ?>
				<div class="controls">
					<?php echo form_input(array('name'=>'kd_part', 'id'=>'kd_part', 'class'=>'input-medium')); ?>
					<p class="help-block" style="font-size:x-small"><em>format : x-xxx-xxxx</em></p>
				</div>
			</div>
			<div class="control-group">
				<?php echo form_label('Nama Part','nama_part',array('class'=>'control-label')) ?>
				<div class="controls">
					<?php echo form_input(array('name'=>'nama_part', 'id'=>'nama_part', 'class'=>'input-xlarge')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo form_label('Spec Detail', 'spec_detail', array('class'=>'control-label')) ?>
				<div class="controls">
					<?php echo form_input(array('name'=>'spec_detail', 'id'=>'spec_detail', 'class'=>'input-xlarge')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo form_label('Zona', 'zone', array('class'=>'control-label')) ?>
				<div class="controls">
					<?php echo form_input(array('name'=>'zone', 'id'=>'zone', 'class'=>'input-medium')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo form_label('Lokasi Rak', 'lokasi_rak', array('class'=>'control-label')) ?>
				<div class="controls">
					<?php echo form_input(array('name'=>'lokasi_rak', 'id'=>'lokasi_rak', 'class'=>'input-medium')); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo form_label('Jumlah Minimal', 'jml_min', array('class'=>'control-label')) ?>
				<div class="controls">
					<?php echo form_input(array('name'=>'jml_min', 'id'=>'jml_min', 'class'=>'input-mini')) ?>
					<?php 
						$options_sat_jml_min = array(
							''		=> '---',
							'1'		=> 'PCS',
							'2' 	=> 'Unit',
							'3' 	=> 'Set',
							'4'		=> 'Meter',
							'5'		=> 'Pack',
							'10'	=> 'Lot'
						); 
					?>
					<?php echo form_dropdown('sat_jml_min', $options_sat_jml_min, '', 'id="sat_jml_min" class="input-mini"'); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo form_label('Lokasi Pesan', 'tlo', array('class'=>'control-label')) ?>
				<div class="controls">
					<?php 
						$options_tlo = array(
							''	=> '---',
							'1' => 'Lokal',
							'0'	=> 'Import'
						);
					?>
					<?php echo form_dropdown('tlo', $options_tlo, '', 'id="tlo" class="input-medium"'); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo form_label('Lama Pengiriman', 'time_order', array('class'=>'control-label')) ?>
				<div class="controls">
					<?php echo form_input(array('name'=>'time_order','class'=>'input-mini','id'=>'time_order')); ?>
					<?php 
						$options_time_order = array(
							''		=> '---',
							'6'		=> 'Hari',
							'7'		=> 'Minggu',
							'8'		=> 'Bulan',
							'9'		=> 'Tahun'
						);
					?>
					<?php echo form_dropdown('sat_time_order', $options_time_order, '', 'class="input-medium" id="sat_time_order"'); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo form_label('Periode Penggantian', 'periode_penggantian', array('class'=>'control-label')) ?>
				<div class="controls">
					<?php echo form_input(array('name'=>'periode_penggantian','class'=>'input-mini','id'=>'periode_penggantian')); ?>
					<?php 
						$options_periode_penggantian = array(
							''		=> '---',
							'8'		=> 'Bulan',
							'9'		=> 'Tahun'
						);
					?>
					<?php echo form_dropdown('sat_periode_penggantian', $options_periode_penggantian, '', 'class="input-medium" id="sat_periode_penggantian"'); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo form_label('Jumlah Stok Awal', 'jml_stok', array('class'=>'control-label')) ?>
				<div class="controls">
					<?php echo form_input(array('name'=>'jml_stok','class'=>'input-mini','id'=>'jml_stok')); ?>
					<?php 
						$options_jml_stok = array(
							''		=> '---',
							'1'		=> 'PCS',
							'2' 	=> 'Unit',
							'3' 	=> 'Set',
							'4'		=> 'Meter',
							'5'		=> 'Pack',
							'10'	=> 'Lot'
						); 
					?>
					<?php echo form_dropdown('sat_jml_stok', $options_jml_stok, '', 'class="input-mini" id="sat_jml_stok"'); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo form_label('Keterangan', 'ket', array('class'=>'control-label')) ?>
				<div class="controls">
					<?php echo form_textarea(array('name'=>'ket','class'=>'input-xlarge', 'rows'=>3, 'id'=>'ket')); ?>
				</div>
			</div>
			<div class="form-actions">
				<button id="submitNew" type="submit" class="btn btn-primary">Tambah</button>
				<!-- <button class="btn">Cancel</button> -->
			</div>
		</fieldset>
	<!-- </div> -->
	<?php echo form_close(); ?>
</div>	
<script type="text/javascript">
	// var CI = {'base_url':'<?php echo base_url() ?>'}
	
	$("#formNew").submit(function(){

   		var post_data = $(this).serialize();  
	    var form_action = $(this).attr("action");  
	    var form_method = $(this).attr("method"); 

		$.ajax({ 
		   url: form_action, 
           type: form_method,
           dataType: 'json',
           data: post_data,
           success: function(datas) {
           		console.log(datas.saved);
           		if (datas.saved == true) {
           			alert('Data Successfully Saved');
           		} else {
           			alert('Data failed to save');
           		}
           },
           error: function() {
           		alert('Data failed to save');
           }
        });
        return false;
	});
</script>