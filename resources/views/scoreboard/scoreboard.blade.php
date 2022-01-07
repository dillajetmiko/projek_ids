@extends("layout.mainlayout")

@section("page_title","IDS")

@section("title","Home")

@section("custom_css")

@endsection

@section("breadcrumb")
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Home</li>
@endsection

@section("content")
<!-- Default box -->
<div class="card">
  <div class="card-header">
		<h3 class="card-title"><strong>My Google Info</strong></h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fas fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
			<i class="fas fa-times"></i></button>
		</div>
  </div>
  <div class="card-body">
		<div class="col d-flex align-items-center justify-content-center">
			<div class="table-responsive col-md-8">
			<center><h1 style="color: black">FUTSAL</h1></center>
				<table style="border:3px solid black" class="table table-active text-center table-borderless">
					<thead>

						<tr>
							<td style="background-color:grey" style="width: 20%" align="center">
								<h1 style="color: white">HOME</h1>
								<h4 style="color:white" id="home">TEAM A</h4>
							</td>
							<td style="background-color:grey">
								<h2 style="color:white">BABAK</h2>
								<h1 style="color:white" id="period">1</h1></td>
							<td style="background-color:grey">
								<h1 style="color:white">AWAY</h1>
								<h4 style="color:white" id="away">TEAM B</h4>
							</td>
						</tr>
						<tr>
							<td align="center">
								<div id="home_score" style="font-size:60px;">
									0
								</div>
							</td>
							<td style="width: 20%">
								<h1 style="color:red">SCORE</h1>
							</td>
							<td align="center">
								<div id="away_score" style="font-size: 60px;">
									0
								</div>
							</td>
						</tr>
						<tr>
							<td align="center">
								<h1 style="color:red">FOUL</h1>
								<div id="home_foul" style="font-size:60px;">
									0
								</div>
							</td>
							<td style="width: 20%">
								<h1>TIME</h1>
								<div id="time" style="display:table-cell; background-color:#fff; border: 3px solid black; width: 180px; height: 60px; vertical-align: middle; text-align: center; font-size: 42px;">
										00:00
								</div>
								<!-- <h1 style="color:red">FOUL</h1> -->
							</td>
							<td align="center">
								<h1 style="color:red">FOUL</h1>
								<div id="away_foul" style="font-size: 60px;">
									0
								</div>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<!-- h1>TIME</h1>
								<div id="time" style="display:table-cell; background-color:#fff; border: 3px solid black; width: 180px; height: 60px; vertical-align: middle; text-align: center; font-size: 42px;">
										00:00
								</div> -->
							</td>
							<td></td>
						</tr>
						
					</thead>
				</table>
			</div>
		</div>
	</div>
  <!-- /.card-body -->
  <div class="card-footer">
	
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

@section("scripts")
<script>
// 20 minutes
var time_in_minutes = 10;
var current_time = Date.parse(new Date());
var deadline = new Date(current_time + time_in_minutes*60*1000);


function time_remaining(endtime){
	var t = Date.parse(endtime) - Date.parse(new Date());
	var seconds = Math.floor( (t/1000) % 60 );
	var minutes = Math.floor( (t/1000/60) % 60 );
	return {'total':t, 'minutes':minutes, 'seconds':seconds};
}

var timeinterval;
function run_clock(id,endtime){
	var clock = document.getElementById(id);
	function update_clock(){
		var t = time_remaining(endtime);
		clock.innerHTML = t.minutes+':'+t.seconds;
		if(t.total<=0){ clearInterval(timeinterval); }
	}
	update_clock(); 
	timeinterval = setInterval(update_clock,1000);
}
run_clock('time',deadline);


var paused = false; 
var time_left; 

function pause_clock(){
	if(!paused){
		paused = true;
		clearInterval(timeinterval); 
		time_left = time_remaining(deadline).total;
		// console.log("time left: "+time_left);
	}
}

function resume_clock(){
	if(paused){
		paused = false;

		deadline = new Date(Date.parse(new Date()) + time_left);

		run_clock('time',deadline);
	}
}

function reset_clock(){
	document.getElementById("time").innerHTML = "20:0";
	if(!paused){
		paused = true;
		clearInterval(timeinterval); 
		time_left = 1199000;
	}
}

function sound_play(aud){
	var loaded = false;
	var audio = new Audio();

	audio.addEventListener('loadeddata', function() {
		loaded = true;
		audio.play();
	}, false);

	audio.src = aud;
}

if(typeof(EventSource) !== "undefined") {
	var source = new EventSource("{{ url('/messages') }}");
	source.addEventListener('message', event => {

		// Scoreboard
		let data = JSON.parse(event.data);
		if(data[0].home == ""){
			document.getElementById("home").innerHTML = "HOME TEAM";
		}
		else{
			document.getElementById("home").innerHTML = data[0].home;
		}
		if(data[0].away == ""){
			document.getElementById("away").innerHTML = "AWAY TEAM";
		}
		else{
			document.getElementById("away").innerHTML = data[0].away;
		}
		document.getElementById("period").innerHTML = data[0].period;
		document.getElementById("home_score").innerHTML = data[0].home_score;
		document.getElementById("away_score").innerHTML = data[0].away_score;
		document.getElementById("home_foul").innerHTML = data[0].home_foul;
		document.getElementById("away_foul").innerHTML = data[0].away_foul;
		document.getElementById('period').innerHTML = data[0].period;
		let countdown = data[0].countdown;
		// console.log(data);
		// console.log(s);
		if(countdown == 1){
			resume_clock();
		}
		if(countdown == 0){
			pause_clock();
		}
		if(countdown == 3){
			reset_clock();
		}
			
		// Audio
		let status = data[0].status;
		let aud = data[0].path;

		console.log('status: '+status);
		console.log('path :'+aud);

		if(status != 0){
			// aud = '/storage'+aud;
			sound_play(aud);
		}
	});
}
</script>
<!-- <script src="{{ asset('/asset/scoreboard.js') }}"></script> -->
@endsection