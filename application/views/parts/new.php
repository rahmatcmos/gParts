<div id="edit_part">
	<!-- <?php echo form_open('parts/update', array('class'=>'form-horizontal')); ?> -->
	<div class="form-horizontal" id="tambah_item">
		<fieldset>
			<legend>Tambah Item Baru</legend>
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
				<?php echo form_label('Stock Saat Ini', 'jml_stok', array('class'=>'control-label')) ?>
				<div class="controls">
					<?php echo form_input(array('name'=>'jml_stok','class'=>'input-mini','id'=>'jml_stok', 'disabled'=>'disabled')); ?>
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
					<?php echo form_dropdown('sat_jml_stok', $options_jml_stok, '', 'class="input-mini" id="sat_jml_stok" disabled="disabled" '); ?>
				</div>
			</div>
			<div class="control-group">
				<?php echo form_label('Keterangan', 'ket', array('class'=>'control-label')) ?>
				<div class="controls">
					<?php echo form_textarea(array('name'=>'ket','class'=>'input-xlarge', 'rows'=>3, 'id'=>'ket')); ?>
				</div>
			</div>
			<div class="form-actions">
				<button id="submitNew" type="submit" class="btn btn-primary">Save changes</button>
				<!-- <button class="btn">Cancel</button> -->
			</div>
		</fieldset>
	</div>
	<!-- <?php echo form_close(); ?> -->
</div>	
<script type="text/javascript">
	var CI = {'base_url':'<?php echo base_url() ?>'}
	
	$("#submitNew").click(function(){
		var nama_part = $('input#nama_part').val();
   		var spec_detail = $('input#spec_detail').val();
   		var zone = $('input#zone').val();
   		var lokasi_rak = $('input#lokasi_rak').val();
   		var jml_min = $('input#jml_min').val();
   		var sat_jml_min = $('select#sat_jml_min').val();
   		var tlo = $('input#tlo').val();
   		var time_order = $('input#time_order').val();
   		var sat_time_order = $('select#sat_time_order').val();
   		var periode_penggantian = $('input#periode_penggantian').val();
   		var sat_periode_penggantian = $('select#sat_periode_penggantian').val();
   		var jml_stok = $('input#jml_stok').val();
   		var sat_jml_stok = $('select#sat_jml_stok').val();
   		var ket = $('textarea#ket').val();

		$.ajax({ 
		   url: CI.base_url+'parts/create', 
           type: 'post',
           dataType: 'json',
           data: {nama_part:nama_part,spec_detail:spec_detail,zone:zone,
           	lokasi_rak:lokasi_rak,jml_min:jml_min,sat_jml_min:sat_jml_min,tlo:tlo,time_order:time_order,
           	sat_time_order:sat_time_order, periode_penggantian:periode_penggantian, sat_periode_penggantian:sat_periode_penggantian,
           	jml_stok:jml_stok,sat_jml_stok:sat_jml_stok,ket:ket
           },
           success: function(datas) {
           		console.log(datas.saved);
           		if (datas.saved == true) {
           			alert('Data Successfully Saved');
           		} else {
           			alert('Data failed to save');
           		}
           }
        });
	});
</script>