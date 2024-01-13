<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<?php include "header1.php" ?>
</head>
<body>
<section class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div>
            <hr style="background-color:#393d42; height:2px;">
					  <h3 class="page-title">ETAT DE STOCKS</h3>
            <hr style="background-color:#393d42; height:2px;">
				</div>
					<div class="row">
						<div class="col-lg">
							<div class="card">
								<div class="card-header">
                      <div id="chart"></div>                         
				        </div>			
			        </div>
		        </div>
	      </div>
</section>
<script src="/assets/js/morris.min.js"></script>
<script src="/assets/js/raphael-min.js"></script>
<script>
  var serries = JSON.parse('<?php echo $chart_data; ?>');
  console.log(serries);
  var data = serries,
    config = {
      data: data,
      xkey: ['design'],
      ykeys: ['stock'],
      labels: ['Nombre de stock'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['gray','red']
  };
 
 config.element='chart';
 Morris.Bar(config);

</script>
</body>
</html>