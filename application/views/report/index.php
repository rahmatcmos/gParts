<?php $highcart = site_url("application/views/layouts/parts_toyota/js/highcart/") ?>
<script src="<?php echo $highcart ?>/highcharts.js"></script>
<script src="<?php echo $highcart ?>/exporting.js"></script>
<script type="text/javascript">
	function tanggal_sekarang() {
		var monthNames = new Array("January","February","March","April","May","June","July",
                           "August","September","October","November","December");

		var dt = new Date();
		var y  = dt.getYear();

		// Y2K compliant
		if (y < 1000) y +=1900;

		var tanggal = dt.getDate() + " " + monthNames[dt.getMonth()] + " " + y;
		return tanggal;
	}

	$(function () {
	    var chart;
	    $(document).ready(function() {
	        chart = new Highcharts.Chart({
	            chart: {
	                renderTo: 'container',
	                type: 'column'
	            },
	            title: {
	                text: 'Data Rekap Transaksi'
	            },
	            subtitle: {
	                text: tanggal_sekarang()
	            },
	            xAxis: {
	                categories: [
	                    'Jan',
	                    'Feb',
	                    'Mar',
	                    'Apr',
	                    'May',
	                    'Jun',
	                    'Jul',
	                    'Aug',
	                    'Sep',
	                    'Oct',
	                    'Nov',
	                    'Dec'
	                ]
	            },
	            yAxis: {
	                min: 0,
	                title: {
	                    text: 'Jumlah'
	                }
	            },
	            legend: {
	                layout: 'vertical',
	                backgroundColor: '#FFFFFF',
	                align: 'left',
	                verticalAlign: 'top',
	                x: 100,
	                y: 70,
	                floating: true,
	                shadow: true
	            },
	            tooltip: {
	                formatter: function() {
	                    return ''+
	                        this.x +': '+ this.y;
	                }
	            },
	            plotOptions: {
	                column: {
	                    pointPadding: 0.2,
	                    borderWidth: 0
	                }
	            },
	                series: [{
	                name: 'Tambah',
	                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
	    
	            }, {
	                name: 'Ambil',
	                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
	    
	            }]
	        });
	    });
	    
	});
</script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>