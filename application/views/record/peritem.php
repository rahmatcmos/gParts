<div id="record_peritem">
	<div class="pencarian">
		<div class="well">
			<form class="form-search pull-left">
				<input type="text" class="input-xlarge search-query" id="searchinput" placeholder="Masukkan Nama Part">
				<button type="submit" id="submitSearch" class="btn">Lihat</button>
			</form>
		</div>
	</div>
	<div id="sub_head" style="text-align:center">
		<h2>DATA REKAP TRANSAKSI</h2>
		<?php if ($part): ?>
			<p>- <?php echo $part ?> - <?php echo date('d m Y') ?></p>
		<?php else: ?>
			<p><?php echo date('d F Y') ?></p>
		<?php endif ?>
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
	<a href="javascript:void(0)" class="btn btn-success pull-right" onclick="cetak('<?php echo $part ?>')"><i class="icon-print icon-white"></i> Cetak</a>
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
			var search = $("#searchinput").val();
			var part = search.split('->');
			var nama_part = $.trim(part[0])
			var CI = {'base_url':'<?php echo base_url() ?>'}
			var url = CI.base_url + 'record/peritem?part='+ encodeURIComponent(nama_part);
			$(location).attr('href',url);
	        return false;
		});

		$(function(){
			cetak = function(part) {
				if (part) {
					window.location = CI.base_url+"record/peritem_print?part="+part;	
				} else {
					window.location = CI.base_url+"record/peritem_print";
				}
				
			}
		});
</script>