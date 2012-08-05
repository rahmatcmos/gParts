<div id="edit_part">
	<div class="input-append well">
		<input id="searchinput" class="input-xlarge" type="text" placeholder="Masukkan Nama Part">
		<button id="submitSearch" class="btn" type="button">Search</button>
	</div>
	<?php echo form_open('parts/update', array('class'=>'form-horizontal', 'id'=>'formUpdate')); ?>
	<!-- <div class="form-horizontal"> -->
		<?php echo form_hidden('kd_part', ''); ?>
		<fieldset>
			<legend>Edit Data Part</legend>
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
				<button id="submitUpdate" type="submit" class="btn btn-primary">Save changes</button>
				<!-- <button class="btn">Cancel</button> -->
			</div>
		</fieldset>
	<!-- </div> -->
	<?php echo form_close(); ?>
</div>	
<script type="text/javascript">
	var CI = {'base_url':'<?php echo base_url() ?>'}
	var autocomplete = $('#searchinput').typeahead()
        .on('keyup', function(ev){

            ev.stopPropagation();
            ev.preventDefault();

            //filter out up/down, tab, enter, and escape keys
            if( $.inArray(ev.keyCode,[40,38,9,13,27]) === -1 ){

                var self = $(this);
                
                //set typeahead source to empty
                self.data('typeahead').source = [];

                //active used so we aren't triggering duplicate keyup events
                if( !self.data('active') && self.val().length > 0){

                    self.data('active', true);

                    //Do data request. Insert your own API logic here.
                    $.getJSON(CI.base_url+'parts/lookup_part',{
                        part: $(this).val()
                    }, function(data) {
                    	// console.log(data);
                        //set this to true when your callback executes
                        self.data('active',true);

                        //Filter out your own parameters. Populate them into an array, since this is what typeahead's source requires



                        //set your results into the typehead's source
                        self.data('typeahead').source = data;

                        //trigger keyup on the typeahead to make it search
                        self.trigger('keyup');

                        //All done, set to false to prepare for the next remote query.
                        self.data('active', false);

                    });

                }
            }
        });
	
	$("#submitSearch").click(function(){
		$.ajax({ 
		   url: CI.base_url+'parts/get_part', 
           type: 'get',
           dataType:'json',
           data: {part: $("#searchinput").val()},
           success: function(data) {
           		if (! $.isEmptyObject(data)) {
           			$('input[name="kd_part"]').val(data.kd_part);
           			$('input#nama_part').val(data.nama_part);
	           		$('input#spec_detail').val(data.spec_detail);
	           		$('input#zone').val(data.zone);
	           		$('input#lokasi_rak').val(data.lokasi_rak);
	           		$('input#jml_min').val(data.jml_min);
	           		$('select#sat_jml_min').val(data.sat_jml_min);
	           		$('input#tlo').val(data.tlo);
	           		$('input#time_order').val(data.time_order);
	           		$('select#sat_time_order').val(data.sat_time_order);
	           		$('input#periode_penggantian').val(data.periode_penggantian);
	           		$('select#sat_periode_penggantian').val(data.sat_periode_penggantian);
	           		$('input#jml_stok').val(data.jml_stok);
	           		$('select#sat_jml_stok').val(data.sat_jml_stok);
	           		$('textarea#ket').val(data.ket);
           		}else {
           			alert("Tidak ada data part : "+$('#searchinput').val());
           		}
           }
        });
	});

	$("#formUpdate").submit(function(){
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
           			alert('Data Successfully Updated');
           		} else {
           			alert('Data failed to Update');
           		}
           },
           error: function() {
           		alert('Data failed to Update');
           }
        });
        return false;
	});
</script>