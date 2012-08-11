<div id="ambil_part">
	<div id="kanban" class="well form-search">
		<input name="kanban" type="text" class="input-medium kanban" placeholder="Jumlah Kanban">
		<button id="add" class="btn">Add</button>
	</div>
	<div id="inputs">
		<table class="table table-stripped">
			<thead>
				<tr>
					<th width="300px">Masukkan Nama Part</th>
					<th>Jumlah Ambil</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="2"><em>Masukkan berapa jumlah part yang akan diambil</em></td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<td><a href="javascript:void(0)" class="btn btn-primary disabled submit">Ambil</a></td>
					<td></td>
				</tr>
			</tfoot>
		</table>

	</div>
</div>
<script type="text/javascript">
	
	$(function(){
		var CI = {'base_url':'<?php echo base_url() ?>'}
		$("#add").click(function(){
			var input = $('input[name="kanban"]').val();
			if ($.isNumeric(input)) {
				var input_part = 
				'<tr>'+
					'<td><input type="text" class="input-xlarge nama_part" name="nama_part[]"></td>'+
					'<td><input type="text" class="input-mini jumlah" name="qty[]"></td>'+
				'</tr>';
				$('tbody').empty();
				for (var i = 0; i < input; i++) {
					$(input_part).fadeIn('slow').appendTo('tbody');
				};
				var autocomplete = $('input[name="nama_part[]"]').typeahead()
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
				$('.submit').removeClass('disabled');
			} else {
				alert("Jumlah kanban harus diisi dengan angka");
			}
			return false;
		});

		$('.submit').click(function(){
 
		    var nama_part = [];
		    $.each($('.nama_part'), function() {
		        nama_part.push($(this).val());
		    });
		    var jumlah = [];
		    $.each($('.jumlah'), function() {
		        jumlah.push($(this).val());
		    });

		    var add_part = []
		    for (var i = 0; i < nama_part.length; i++) {
		    	if (nama_part[i] == '' || jumlah[i] == '') {continue};
		    	add_part.push({nama_part: nama_part[i], qty: jumlah[i]})
		    };
		 
		    if(add_part.length == 0) {
		        alert("Part gagal diambil, periksa kembali");
		    }  
		 
		    // console.log(add_part);
		    $.ajax({
		    	url: CI.base_url + 'parts/ambil_part_save',
		    	type: 'post',
		    	dataType: 'json',
		    	data: {parts: add_part},
		    	success: function(data) {
		    		if (data.result) {alert("Berhasil ambil data")};
		    	},
		    	error: function() {
		    		alert("Error while saving get parts");
		    	}
		    });
		 
		    return false;
		});

	});
	
	
</script>