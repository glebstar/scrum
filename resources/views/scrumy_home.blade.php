@extends('app')

@section('content')
<input type="hidden" id="aUser" value="{{ $user }}">
<input type="hidden" id="aUser" value="{{ $user }}">
<div class="col-md-12">
	<div class="row">
			<div class="panel panel-primary">
					<div class="panel-heading scrumy-panel">Projects</div>
					<div class="panel-body charts_container" id= "charts_container">

						<script type="text/javascript">
							$a =  document.getElementById("aUser").value;
							var data2 = <?php echo json_encode($user); ?>;
								for (var i = 0; i < data2.length; i++) {
									var para = document.createElement("a");
									para.id = "productivity_chart".concat(i);
									para.setAttribute("class","productivity_chart");
									para.setAttribute("href","{{ url('board') }}/" + data2[i]['project_id']);
									document.getElementById("charts_container").appendChild(para);
								}
						</script>
					</div>
			</div>		
	</div>
</div>
<footer>
	<div class="footer">
			<div class="navfoot">
			</div>
	</div>
</footer>
<script type="text/javascript">
window.onload = function () {
	for (var i = 0; i < data2.length; i++) {
		var project_id = data2[i]['project_id'];
		var productivity_chart = "productivity_chart".concat(i);
			if(data2[i]['todo']!= 0 && data2[i]['doing']!= 0 && data2[i]['done']!= 0){
				var chart = new CanvasJS.Chart(productivity_chart, {

					title:{
						text: data2[i]['project_name']              
					},
					data: [              
					{
				// Change type to "doughnut", "line", "splineArea", etc.
						type: "doughnut",
						explodeOnClick : false,
				 		indexLabelPlacement: "inside",
				 		indexLabelFontSize: 14,
				 		indexLabelFontColor: "#fafafa",
						click: onClick,
						dataPoints: [
							{ label: "to-do",  y: data2[i]['todo'],indexLabel : data2[i]['todo']},
							{ label: "doing", y: data2[i]['doing'],indexLabel : data2[i]['doing']},
							{ label: "done", y: data2[i]['done'],indexLabel : data2[i]['done']}
						]
					}
					]
				});
			}	
			else {
				var chart = new CanvasJS.Chart(productivity_chart, {
					title:{
						text: data2[i]['project_name']              
					},
					legend: {
						cursor:"pointer",
						horizontalAlign: "left", // "center" , "right"
						verticalAlign: "center",  // "top" , "bottom"
						fontSize: 15,
						href: "{{URL::to('board')}}/" + project_id,
						itemclick: function(e){
							window.location = $(this).attr('href');
						}
					},
					data: [              
					{
				// Change type to "doughnut", "line", "splineArea", etc.
						type: "doughnut",
						showInLegend: true,
      					legendText: "clic to add card", 						
						explodeOnClick : false,
				 		indexLabelPlacement: "inside",
				 		indexLabelFontSize: 14,
				 		indexLabelFontColor: "#fafafa",
						click: onClick,
						dataPoints: [
							{ label: "to-do",  y: data2[i]['todo'],indexLabel : data2[i]['todo']},
							{ label: "doing", y: data2[i]['doing'],indexLabel : data2[i]['doing']},
							{ label: "done", y: data2[i]['done'],indexLabel : data2[i]['done']}
						]
					}
					]
				});
			}				
			chart.render();
	}	
}
function onClick(e){
	return false;
	//window.location="{{URL::to('board')}}";
}
</script>

@endsection
