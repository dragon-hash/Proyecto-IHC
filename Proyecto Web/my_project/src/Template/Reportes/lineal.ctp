<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
require_once("conexion/conexion.php");
?>
<style type="text/css">
#container, #sliders {
    min-width: 310px; 
    max-width: 800px;
    margin: 0 auto;
}
#container {
    height: 400px; 
}
        </style>
<script src="/~batman/my_project/js/high/highcharts.js"></script>
<script src="/~batman/my_project/js/high/export-data.js"></script>
<script src="/~batman/my_project/js/high/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



        <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'areaspline'
    },
    title: {
        text: "<?= __('Quantity of replacement parts by category') ?>"
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 150,
        y: 100,
        floating: true,
        borderWidth: 1,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
    },
    xAxis: {
        categories: [
            <?php
            $sql = "select * from categories";
            $result = mysqli_query($connection,$sql);
            while($registro = mysqli_fetch_array($result)){
        ?>
            '<?php echo $registro['name']?>', 
        <?php
            }
        ?>
        ],
        
    },
    yAxis: {
        title: {
            text: "<?= __('Quantity')?>"
        }
    },
    tooltip: {
        shared: true,
        valueSuffix: ' units'
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
	name: "<?= __('Replacements')?>",
        data: [
        <?php
            $sql = "select id from categories";
            $result = mysqli_query($connection,$sql);

            while($registro = mysqli_fetch_array($result)){
                $sql2 = "select id from replacements where category_id=".$registro['id'];
                $result2 = mysqli_query($connection,$sql2);
                $rowcount=mysqli_num_rows($result2);
            ?>
                <?php echo $rowcount?>, 
            <?php
                }
            ?>

        ]
    }]
});
        </script>
    </body>
</html>
