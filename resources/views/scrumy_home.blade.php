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
							var boardUrl = '{{URL::to('board')}}';

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
<script  src="{{ asset('/custom_js/home.js') }}?v={{ config('app.script_version') }}"></script>
@endsection
