<div id="tambah_stock">
	<div id="kanban" class="well form-search">
		<input name="kode_order" type="text" class="input-medium kode_order" placeholder="Masukkan Kode Order">
		<button id="order_search" class="btn">Search</button>
	</div>
	<div id="inputs">
		<table class="table table-stripped">
			<thead>
				<tr>
					<th width="300px">Nama Part</th>
					<th>Jumlah Tambah</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="2"><em>Masukkan Kode Order</em></td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td><a href="javascript:void(0)" class="btn btn-primary disabled submit">Tambah</a></td>
					<td></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		var CI = {'base_url':'<?php echo base_url() ?>'}
		$("#order_search").click(function(){
			var kode_order = $('input[name="kode_order"]').val();
			if ($.isNumeric(kode_order)) {
				$.ajax({
			    	url: CI.base_url + 'parts/getOrderpart',
			    	type: 'get',
			    	dataType: 'json',
			    	data: {kd_order: kode_order},
			    	success: function(data) {
			    		$('tbody').empty();
			    		var input_part = '';
			    		if ($.isEmptyObject(data)) {
			    			input_part += '<td colspan="2"><em>Tidak Ada Order Dengan Kode '+kode_order+'</em></td>';
			    		} else {
			    			$.each(data, function(i, item) {
							   input_part += '<tr>'+
									'<td>'+item.nama_part+'</td>'+
									'<td><input type="text" class="input-mini jumlah" name="qty[]" kode="'+item.kd_part+'"></td>'+
								'</tr>';
							});
			    		}		
			    		$(input_part).fadeIn('slow').appendTo('tbody');	    		
			    	},
			    	error: function() {
			    		alert("Error while get order");
			    	}
			    });
				$('.submit').removeClass('disabled');
			} else {
				alert("Kode Order harus diisi");
			}
		});

		$('.submit').click(function(){
			var kode_order = $('input[name="kode_order"]').val();
 			var pesan = [];
 			$.ajax({
	    		url: CI.base_url + 'parts/updateOrderToTambah',
	    		type: 'post',
	    		dataType: 'json',
	    		data: {kode_order:kode_order},
	    		success: function(data) {
	    			if (data.result) {
	    				$.each($('.jumlah'), function() {
					    	var kd_part = $(this).attr('kode');
					    	var val = $(this).val();
					    	var part = kd_part +','+ val;
					        pesan.push(part);
					    });
					    for(var i = 0; i < pesan.length; i++) {
					    	var part = pesan[i].split(',');
					    	var kd_part = part[0];
					    	var jumlah = part[1];
					    	$.ajax({
					    		url: CI.base_url + 'parts/tambahPart',
					    		type: 'post',
					    		dataType: 'json',
					    		data: {kd_pesan : kode_order, kd_part:kd_part, jumlah:jumlah},
					    		success: function(data) {

					    		},
					    		error: function() {
						    		alert("Error while add part");
						    	}
					    	});
					    }
					    alert("Success");
	    			};
	    		},
	    		error: function() {
		    		alert("Error while add part");
		    	}
	    	});		    
		    return false;
		});
	});
</script>