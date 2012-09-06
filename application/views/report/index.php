<?php $highcart = site_url("application/views/layouts/parts_toyota/js/highcart/") ?>
<script src="<?php echo $highcart ?>/highcharts.js"></script>
<script src="<?php echo $highcart ?>/modules/exporting.js"></script>
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

	var CI = {'base_url':'<?php echo base_url() ?>'}
	var getChartYear = function(year) {
		var report;
		var report = {
		    chart: {
	                renderTo: 'report_parts',
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
		    series: []
		};

		// Load the data from the XML file 
		$.get(CI.base_url+ 'report/year/'+ year, function(xml) {
			
			// Split the lines
			var $xml = $(xml);
					
			// push series
			$xml.find('series').each(function(i, series) {
				var seriesName = $(series).find('name').text();
				var seriesOptions = {
					name: $(series).find('name').text(),
					type: 'column',
					data: []
				};
				
				// push data points
				$(series).find('data').each(function(i, point) {
					value = $(point).text().split(',');
					for (var i = 0; i < value.length; i++) {
						seriesOptions.data.push(
							parseInt(value[i])
						);
					};
				});
				
				// add it to the options
				report.series.push(seriesOptions);
			});
			var chart = new Highcharts.Chart(report);
		});
	}
</script>
<form class="form-inline" id="getReport">
  	<select id="yearRecord" class="input-small pad01">
		<option value="0">- Year -</option>
		<option value="2012">2012</option> 
		<option value="2011">2011</option>
		<option value="2010">2010</option>
		<option value="2009">2009</option>
		<option value="2008">2008</option>
		<option value="2007">2007</option>
		<option value="2006">2006</option>
	</select>
  	<button type="submit" class="btn">submit</button>
</form>
<hr>
<div id="report_parts" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
<script type="text/javascript">
	$(function(){
		$("#getReport").submit(function(){
			var year = $("#yearRecord").val();
			getChartYear(year);
			return false;
		});
	});
	
</script>