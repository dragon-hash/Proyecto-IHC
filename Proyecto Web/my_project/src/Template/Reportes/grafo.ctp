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
<script src="/~batman/my_project/js/high/networkgraph.js"></script>
<script src="/~batman/my_project/js/high/exporting.js"></script>

<div id="container"></div>



		<script type="text/javascript">
// Add the nodes option through an event call. We want to start with the parent
// item and apply separate colors to each child element, then the same color to
// grandchildren.
Highcharts.addEvent(
    Highcharts.seriesTypes.networkgraph,
    'afterSetOptions',
    function (e) {
        var colors = Highcharts.getOptions().colors,
            i = 0,
            nodes = {};
        e.options.data.forEach(function (link) {

            if (link[0] === 'Mechanics') {
                nodes['Mechanics'] = {
                    id: 'Mechanics',
                    marker: {
                        radius: 20
                    }
                };
                nodes[link[1]] = {
                    id: link[1],
                    marker: {
                        radius: 10
                    },
                    color: colors[i++]
                };
            } else if (nodes[link[0]] && nodes[link[0]].color) {
                nodes[link[1]] = {
                    id: link[1],
                    color: nodes[link[0]].color
                };
            }
        });

        e.options.nodes = Object.keys(nodes).map(function (id) {
            return nodes[id];
        });
    }
);

Highcharts.chart('container', {
    chart: {
        type: 'networkgraph',
        height: '100%'
    },
    title: {
	text: "<?= __('Report of personnel')?>"
    },
    subtitle: {
        text: "<?= __('Classified by service')?>"
    },
    plotOptions: {
        networkgraph: {
            keys: ['from', 'to'],
            layoutAlgorithm: {
                enableSimulation: true
            }
        }
    },
    series: [{
        dataLabels: {
            enabled: true
        },
        data: [
		<?php
 	            $sql = "select id,name from services";
		    $result = mysqli_query($connection,$sql);
		    while($servicios = mysqli_fetch_array($result)){
		    	?>
			    ['Mechanics', "<?php echo $servicios['name']?>"],
				<?php
		 	            $sql2 = "select name,surname from mechanics where service_id=".$servicios['id'];
				    $result2 = mysqli_query($connection,$sql2);
				    while($mecanicos = mysqli_fetch_array($result2)){
				    	?>
					    ["<?php echo $servicios['name']?>", "<?php echo $mecanicos['name']." ".$mecanicos['surname']?>"],
				    <?php
					}
				    ?>
		    <?php
		        }
		    ?>
           
        ]
    }]
});


		</script>
    </body>
</html>
