<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
require_once("conexion/conexion.php");
?>
<style type="text/css">
#container {
	min-width: 310px;
	max-width: 800px;
	margin: 0 auto
}
		</style>

<script src="/~batman/my_project/js/high/highcharts.js"></script>
<script src="/~batman/my_project/js/high/sunburst.js"></script>
<script src="/~batman/my_project/js/high/exporting.js"></script>


<div id="container" style="max-width: 700px; margin: 0 auto"></div>

<script type="text/javascript">
var data = [{
    'id': '0.0',
    'parent': '',
    'name': "<?= __('Replacements')?>"
},
       <?php
            $sql = "select * from categories";
            $result = mysqli_query($connection,$sql);
	    $i=1;
	    $j=1;
            while($registro = mysqli_fetch_array($result)){
        ?>{
		    'id': '1.<?php echo $i?>',
		    'parent': '0.0',
		    'name': "<?php echo $registro['name']?>"
	},
		    <?php
		   
 	            $sql2 = "select name,quantity from replacements where category_id=".$registro['id'];
		    $result2 = mysqli_query($connection,$sql2);

		    while($productos = mysqli_fetch_array($result2)){
		    	?>
		        {
			    'id': '2.<?php echo $j?>',
			    'parent': '1.<?php echo $i?>',
			    'name': "<?php echo $productos['name']?>",
			    'value': <?php echo $productos['quantity']?>,
			},
		    <?php
			$j++;
		        }
		    ?>
        <?php
            $i++;
	    $j=1;
	    }
        ?>
];

// Splice in transparent for the center circle
Highcharts.getOptions().colors.splice(0, 0, 'transparent');


Highcharts.chart('container', {

    chart: {
        height: '100%'
    },

    title: {
	text: "<?= __('Report of part')?>"
    },
    subtitle: {
	text: "<?= __('Classified by categories')?>"
    },
    series: [{
        type: "sunburst",
        data: data,
        allowDrillToNode: true,
        cursor: 'pointer',
        dataLabels: {
            format: '{point.name}',
            filter: {
                property: 'innerArcLength',
                operator: '>',
                value: 16
            }
        },
        levels: [{
            level: 1,
            levelIsConstant: false,
            dataLabels: {
                filter: {
                    property: 'outerArcLength',
                    operator: '>',
                    value: 64
                }
            }
        }, {
            level: 2,
            colorByPoint: true
        },
        {
            level: 3,
            colorVariation: {
                key: 'brightness',
                to: -0.5
            }
        }, {
            level: 4,
            colorVariation: {
                key: 'brightness',
                to: 0.5
            }
        }]

    }],
    tooltip: {
        headerFormat: "",
        pointFormat: "<?= __('Parts of <b>{point.name}</b> is <b>{point.value}</b>')?>"
    }
});
		</script>
	</body>
</html>
