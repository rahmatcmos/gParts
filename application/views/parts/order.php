<script type="text/javascript">
	var CI = {'base_url':'<?php echo base_url() ?>'}	
	var order_part = function(kd_part) {
		$.ajax({
			url: CI.base_url+'parts/get_part_by_kd',
			type: 'get',
			dataType: 'json',
			data: {kd_part: kd_part},
			success: function(data){
				var kd_part = data.kd_part;
				var nama_part = data.nama_part;
				var spec_detail = data.spec_detail;
				var data_body = "Kode part : "+kd_part+"<br/>Nama part : "+nama_part+"<br/>Speck Detail : "+spec_detail+"<hr/>";
				data_body += "<input type='text' class='input-medium' name='jumlah_order' placeholder='Masukkan jumlah part'>";
				$("#order_part_jumlah").attr("kd_part", kd_part);
				$("#order_part_jumlah").children(".modal-body").html(data_body);
				$("#order_part_jumlah").modal();
			}
		})
	}

	$(function(){
		$("#order_part_action").click(function(){
			var kd_part = $("#order_part_jumlah").attr("kd_part");
			var jumlah = $("#order_part_jumlah").find("input[name='jumlah_order']").val();
			// console.log(jumlah);
			$.ajax({
			  type: 'POST',
			  url: CI.base_url+'carts/save_cart',
			  data: {kd_part:kd_part, jumlah:jumlah},
			  dataType: 'json',
			  success: function(data){
			  	if (data.return == true) {
			  		$("#order_part_jumlah").find("button").attr("class","close").trigger("click");	
			  		alert("Order Part Success");
			  		// $("#order_sparepart").find("a[name='"+kd_part+"']").addClass('disabled').removeClass('btn-success').addClass('btn-danger');		  		
			  		// location.reload();
			  	};
			  },
			  error: function() {
			  	alert("Cannot Order Part");
			  }
			});
		});

	});

</script>

<!-- modal div -->
<div class="modal hide" id="order_part_jumlah">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Order Part</h3>
  </div>
  <div class="modal-body">
    <i>An Error Occured</i>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
    <a href="#" class="btn btn-primary" id="order_part_action">Order</a>
  </div>
</div>

<div id="order_sparepart">
	<h2 style="text-align:center">ALL DATA SPARE PART WITH MINUMUM STOCK</h2>
	<div class="pencarian">
		<div class="well">
			<?php echo form_open('parts/order', array('class'=>'form-search pull-left', 'method'=>'get')); ?>
			<?php echo form_input(array('name'=>'pencarian', 'class'=>'input-medium search-query')); ?>
				<select name="by" id="" class="input-medium">
					<option value="">-- Search By --</option>
					<option value="kd_part">Kode Part</option>
					<option value="nama_part">Nama Part</option>
					<option value="spec_detail">Detail Speck</option>
					<option value="zone">Zone</option>
					<option value="lokasi_rak">Lokasi Rack</option>
				</select>
				<button type="submit" class="btn">Search</button>
			<?php echo form_close() ?>
		</div>
	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Part</th>
				<th>Spek Detail</th>
				<th>Lokasi Rack</th>
				<th>Lama Order</th>
				<th>Jumlah Min</th>
				<th>Jumlah Stock</th>
				<th>Lokasi Order</th>
				<th>Usia Pakai</th>
				<th>Keterangan</th>
				<th>ORDER</th>
			</tr>
		</thead>
		<tbody>
			<?php if ($part_minim): ?>
				<?php $i = (1+$this->uri->segment(3)); foreach ($part_minim as $part): ?>
				<tr>
					<td><?php echo $i++ ?></td>
					<td><?php echo $part->nama_part ?></td>
					<td><?php echo $part->spec_detail ?></td>
					<td><?php echo $part->lokasi_rak ?></td>
					<td><?php echo $part->time_order ?> <?php echo set_satuan($part->sat_time_order) ?></td>
					<td><?php echo $part->jml_min ?> <?php echo set_satuan($part->sat_jml_min) ?></td>
					<td style="color:red"><?php echo $part->jml_stok ?> <?php echo set_satuan($part->sat_jml_stok) ?></td>
					<td><?php echo set_lokasiorder($part->tlo) ?></td>
					<td><?php echo $part->periode_penggantian ?> <?php echo set_satuan($part->sat_periode_penggantian) ?></td>
					<td><?php echo $part->ket ?></td>
					<td><a name="<?php echo $part->kd_part ?>" href="javascript:void(0)" class="btn btn-mini btn-success" onclick="order_part('<?php echo set_satuan($part->kd_part) ?>')">ADD</a></td>
				</tr>
				<?php endforeach ?>
			<?php else: ?>
				<tr>
					<td colspan="11"><em>No Data Available</em></td>
				</tr>
			<?php endif ?>
		</tbody>
	</table>
	<div class="pull-left">
		<?php echo anchor('carts/show_cart', "<i class='icon-print icon-white'></i> Simpan dan Cetak", array('class'=>'btn btn-success show_cart', 'target'=>'_blank')); ?>
	</div>
	<?php echo $this->pagination->create_links(); ?>
</div>