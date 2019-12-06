<?php
require_once("../../Controller/conexion/conexion.php");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>

		<style type="text/css">

		</style>
	</head>
	<body>
<script src="Highcharts-7.0.3/code/highcharts.js"></script>
<script src="Highcharts-7.0.3/code/modules/exporting.js"></script>
<script src="Highcharts-7.0.3/code/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>



		<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in January, 2018'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [
		<?php
			$sql = "select * from mechanics";
			$result = mysqli_query($connection,$sql);
			while($registro = mysqli_fetch_array($result)){
		?>
		{
            name: '<?php echo $registro['name']?>',
            y: <?php echo $registro['id']?>,
        }, 
		<?php }
			
			?>
		
		]
    }]
});
		</script>
	</body>
</html>
