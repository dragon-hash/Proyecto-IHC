<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
require_once("conexion/conexion.php");
?>
<style type="text/css">
#container {
    height: 400px; 
    min-width: 310px; 
    max-width: 800px;
    margin: 0 auto;
}
        </style>
<script src="/~batman/my_project/js/high/highcharts.js"></script>
<script src="/~batman/my_project/js/high/export-data.js"></script>
<script src="/~batman/my_project/js/high/exporting.js"></script>
<script src="/~batman/my_project/js/high/highcharts-3d.js"></script>


<div id="container" style="height: 400px"></div>


<script type="text/javascript">

Highcharts.chart('container', { 
    chart: {
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 25,
            depth: 70
        }
    },
    title: {
        text: "<?= __('Number of mechanics hired by service')?>"
    },
    
    plotOptions: {
        column: {
            depth: 25
        }
    },
    xAxis: {
        categories: [
        <?php
            $sql = "select * from services";
            $result = mysqli_query($connection,$sql);
            while($registro = mysqli_fetch_array($result)){
        ?>
            '<?php echo $registro['name']?>', 
        <?php
            }
        ?>

        ],
        labels: {
            skew3d: true,
            style: {
                fontSize: '16px'
            }
        }
    },
    yAxis: {
        title: {
            text: null
        }
    },
    series: [{
        name: "<?= __('Number of Mechanics') ?>",
        data: [
            <?php
            $sql = "select id from services";
            $result = mysqli_query($connection,$sql);

            while($registro = mysqli_fetch_array($result)){
                $sql2 = "select id from mechanics where service_id=".$registro['id'];
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
