<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
require_once("conexion/conexion.php");
?>

<script src="/~batman/my_project/js/high/highcharts.js"></script>
<script src="/~batman/my_project/js/high/export-data.js"></script>
<script src="/~batman/my_project/js/high/exporting.js"></script>


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
        text: "<?= __('Clients more frequently')?>"
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

            $sql0 = "select id from roles where name = 'Cliente'";
            $result0 = mysqli_query($connection,$sql0);
            $registro0 = mysqli_fetch_array($result0);

			$sql = "select * from users where role_id = ".$registro0['id'];
			$result = mysqli_query($connection,$sql);
			while($registro = mysqli_fetch_array($result)){
		?>
		{
            name: '<?php echo $registro['name']?>',
            //_--------------
            <?php $sql2 = "select id from factures where user_id=".$registro['id'];
                $result2 = mysqli_query($connection,$sql2);
                $rowcount=mysqli_num_rows($result2);
            ?>
            //_--------------
            y: <?php echo $rowcount?>,
        }, 
		<?php }
			
			?>
		
		]
    }]
});
		</script>
	</body>
</html>
