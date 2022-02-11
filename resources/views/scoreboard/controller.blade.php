@extends("layout.mainlayout")

@section("page_title","IDS")

@section("title","Scoreboard Controller")

@section("custom_css")

@endsection

@section("breadcrumb")
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Controller</li>
@endsection

@section("content")
<!-- Default box -->
<div class="card">
  <div class="card-header">
		<!-- <h3 class="card-title"><strong>Controller Scoreboard</strong></h3> -->

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
				<table class="table table-active text-center table-bordered">
					<thead>
						<tr>
							<td colspan="3">
								<h4>SCOREBOARD CONTROLLER</h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td align="center">
								<input type="text" id="home" name="home" class="form-control" value="" placeholder="Home"><hr>
								<h6>HOME SCORE</h6>
								<div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
									<div class="form-group mb-2">
										<button type="button" class="btn btn-outline-primary home_score_min" style="margin-right:5px">
											<i class="fas fa-minus"></i>
										</button>
										<div id="home_score" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
											0
										</div>
										<button type="button" class="btn btn-outline-primary home_score_plus" style="margin-left:5px">
											<i class="fas fa-plus"></i>
										</button>
									</div>
								</div>
								<hr>
								<h6>FOUL</h6>
								<div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
									<div class="form-group mb-2">
										<button type="button" class="btn btn-outline-primary home_foul_min" style="margin-right:5px">
											<i class="fas fa-minus"></i>
										</button>
										<div id="home_foul" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
											0
										</div>
										<button type="button" class="btn btn-outline-primary home_foul_plus" style="margin-left:5px">
											<i class="fas fa-plus"></i>
										</button>
									</div>
								</div></br>
							</td>

							<td>
								<button type="button" class="btn btn-warning reset_scoreboard">
										Reset
								</button>
								<button type="button" class="btn btn-primary update">
										Update
								</button>
								<hr>

								<h6>BABAK</h6>
								<div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
									<div class="form-group mb-2">
										<button type="button" class="btn btn-outline-primary min_period" style="margin-right:5px">
											<i class="fas fa-minus"></i>
										</button>
										<!-- <button type="button" class="btn btn-outline-primary min_period" style="margin-right:5px">
											-
										</button> -->
										<div id="period" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
											1
										</div>
										<button type="button" class="btn btn-outline-primary plus_period" style="margin-left:5px">
											<i class="fas fa-plus"></i>
										</button>
										<!-- <button type="button" class="btn btn-outline-primary plus_period" style=" margin-left:5px">
											+
										</button> -->
									</div>
								</div>
								<hr>

								<h6>Timer</h6>
								<button type="button" class="btn btn-warning reset_timer">
									Reset
								</button>
								<button type="button" class="btn btn-danger stop">
									Stop
								</button>
								<button type="button" class="btn btn-primary start">
									Start
								</button>
								<hr>

								<!-- <h6>Sound</h6>
								<input type="hidden" value="0" id="sound_status">
								<button type="button" class="btn btn-outline-dark sound1">
									Sound 1
								</button>
								<button type="button" class="btn btn-outline-dark sound2">
									Sound 2
								</button>
								<button type="button" class="btn btn-outline-dark sound3">
									Sound 3
								</button> -->
							</td>

							<td align="center">
								<input type="text" id="away" name="away" class="form-control" value="" placeholder="Away"><hr>
								<h6>AWAY SCORE</h6>
								<div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
									<div class="form-group mb-2">
										<button type="button" class="btn btn-outline-primary away_score_min" style="margin-right:5px">
											<i class="fas fa-minus"></i>
										</button>
										<div id="away_score" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
											0
										</div>
										<button type="button" class="btn btn-outline-primary away_score_plus" style="margin-left:5px">
											<i class="fas fa-plus"></i>
										</button>
									</div>
								</div><hr>
								<h6>FOUL</h6>
								<div class="form-inline" style="display: flex; justify-content: center; align-items: center;">
									<div class="form-group mb-2">
										<button type="button" class="btn btn-outline-primary away_foul_min" style="margin-right:5px">
											<i class="fas fa-minus"></i>
										</button>
										<div id="away_foul" style="display:table-cell; border: 5px solid black; width: 80px; height: 80px; vertical-align: middle; text-align: center; font-size: 48px;">
											0
										</div>
										<button type="button" class="btn btn-outline-primary away_foul_plus" style="margin-left:5px">
											<i class="fas fa-plus"></i>
										</button>
									</div>
								</div></br>
							</td>
						</tr> 
					</tbody>
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
<!-- <script src="{{ asset('/asset/scoreboard.js') }}"></script> -->
<script type=text/javascript>

    // Home Score
		$('.home_score_min').on('click', function(){
        var id = 1;
        let score = document.getElementById('home_score').innerHTML;
        // console.log(score);
        if(score > 0 ){
            document.getElementById('home_score').innerHTML = parseInt(score) - 1;
        }
				let home_score = document.getElementById('home_score').innerHTML;
        let away_score = document.getElementById('away_score').innerHTML;
        let home_foul = document.getElementById('home_foul').innerHTML;
        let away_foul = document.getElementById('away_foul').innerHTML;
        let home = document.getElementById('home').value;
        let away = document.getElementById('away').value;
        let period = document.getElementById('period').innerHTML;

        $.ajax({
            type:'POST',
            url:"{{ route('scoreboard.post') }}",
            // url:"/skor/update",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
								id : id,
                home : home,
                away : away,
                home_score : home_score,
                away_score : away_score,
                home_foul : home_foul,
                away_foul : away_foul,
                period : period
            },
         });
    });

		$('.home_score_plus').on('click', function(){
        var id = 1;
        let score = document.getElementById('home_score').innerHTML;
        // console.log(score);
        if(score >= 0){
            document.getElementById('home_score').innerHTML = parseInt(score) + 1;
        }
				let home_score = document.getElementById('home_score').innerHTML;
        let away_score = document.getElementById('away_score').innerHTML;
        let home_foul = document.getElementById('home_foul').innerHTML;
        let away_foul = document.getElementById('away_foul').innerHTML;
        let home = document.getElementById('home').value;
        let away = document.getElementById('away').value;
        let period = document.getElementById('period').innerHTML;

        $.ajax({
            type:'POST',
            url:"{{ route('scoreboard.post') }}",
            // url:"/skor/update",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
								id : id,
                home : home,
                away : away,
                home_score : home_score,
                away_score : away_score,
                home_foul : home_foul,
                away_foul : away_foul,
                period : period
            },
         });
    });

		// Home Foul
		$('.home_foul_min').on('click', function(){
        var id = 1;
        let score = document.getElementById('home_foul').innerHTML;
        // console.log(score);
        if(score > 0 ){
            document.getElementById('home_foul').innerHTML = parseInt(score) - 1;
        }
				let home_score = document.getElementById('home_score').innerHTML;
        let away_score = document.getElementById('away_score').innerHTML;
        let home_foul = document.getElementById('home_foul').innerHTML;
        let away_foul = document.getElementById('away_foul').innerHTML;
        let home = document.getElementById('home').value;
        let away = document.getElementById('away').value;
        let period = document.getElementById('period').innerHTML;

        $.ajax({
            type:'POST',
            url:"{{ route('scoreboard.post') }}",
            // url:"/skor/update",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
								id : id,
                home : home,
                away : away,
                home_score : home_score,
                away_score : away_score,
                home_foul : home_foul,
                away_foul : away_foul,
                period : period
            },
         });
    });

		$('.home_foul_plus').on('click', function(){
        var id = 1;
        let score = document.getElementById('home_foul').innerHTML;
        // console.log(score);
        if(score >= 0){
            document.getElementById('home_foul').innerHTML = parseInt(score) + 1;
        }
				let home_score = document.getElementById('home_score').innerHTML;
        let away_score = document.getElementById('away_score').innerHTML;
        let home_foul = document.getElementById('home_foul').innerHTML;
        let away_foul = document.getElementById('away_foul').innerHTML;
        let home = document.getElementById('home').value;
        let away = document.getElementById('away').value;
        let period = document.getElementById('period').innerHTML;

        $.ajax({
            type:'POST',
            url:"{{ route('scoreboard.post') }}",
            // url:"/skor/update",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
								id : id,
                home : home,
                away : away,
                home_score : home_score,
                away_score : away_score,
                home_foul : home_foul,
                away_foul : away_foul,
                period : period
            },
         });
    });


		// Away Score
		$('.away_score_min').on('click', function(){
        var id = 1;
        let score = document.getElementById('away_score').innerHTML;
        // console.log(score);
        if(score > 0 ){
            document.getElementById('away_score').innerHTML = parseInt(score) - 1;
        }
				let home_score = document.getElementById('home_score').innerHTML;
        let away_score = document.getElementById('away_score').innerHTML;
        let home_foul = document.getElementById('home_foul').innerHTML;
        let away_foul = document.getElementById('away_foul').innerHTML;
        let home = document.getElementById('home').value;
        let away = document.getElementById('away').value;
        let period = document.getElementById('period').innerHTML;

        $.ajax({
            type:'POST',
            url:"{{ route('scoreboard.post') }}",
            // url:"/skor/update",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
								id : id,
                home : home,
                away : away,
                home_score : home_score,
                away_score : away_score,
                home_foul : home_foul,
                away_foul : away_foul,
                period : period
            },
         });
    });

		$('.away_score_plus').on('click', function(){
        var id = 1;
        let score = document.getElementById('away_score').innerHTML;
        // console.log(score);
        if(score >= 0){
            document.getElementById('away_score').innerHTML = parseInt(score) + 1;
        }
				let home_score = document.getElementById('home_score').innerHTML;
        let away_score = document.getElementById('away_score').innerHTML;
        let home_foul = document.getElementById('home_foul').innerHTML;
        let away_foul = document.getElementById('away_foul').innerHTML;
        let home = document.getElementById('home').value;
        let away = document.getElementById('away').value;
        let period = document.getElementById('period').innerHTML;

        $.ajax({
            type:'POST',
            url:"{{ route('scoreboard.post') }}",
            // url:"/skor/update",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
								id : id,
                home : home,
                away : away,
                home_score : home_score,
                away_score : away_score,
                home_foul : home_foul,
                away_foul : away_foul,
                period : period
            },
         });
    });

		// Away Foul
		$('.away_foul_min').on('click', function(){
        var id = 1;
        let score = document.getElementById('away_foul').innerHTML;
        // console.log(score);
        if(score > 0 ){
            document.getElementById('away_foul').innerHTML = parseInt(score) - 1;
        }
				let home_score = document.getElementById('home_score').innerHTML;
        let away_score = document.getElementById('away_score').innerHTML;
        let home_foul = document.getElementById('home_foul').innerHTML;
        let away_foul = document.getElementById('away_foul').innerHTML;
        let home = document.getElementById('home').value;
        let away = document.getElementById('away').value;
        let period = document.getElementById('period').innerHTML;

        $.ajax({
            type:'POST',
            url:"{{ route('scoreboard.post') }}",
            // url:"/skor/update",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
								id : id,
                home : home,
                away : away,
                home_score : home_score,
                away_score : away_score,
                home_foul : home_foul,
                away_foul : away_foul,
                period : period
            },
         });
    });

		$('.away_foul_plus').on('click', function(){
        var id = 1;
        let score = document.getElementById('away_foul').innerHTML;
        // console.log(score);
        if(score >= 0){
            document.getElementById('away_foul').innerHTML = parseInt(score) + 1;
        }
				let home_score = document.getElementById('home_score').innerHTML;
        let away_score = document.getElementById('away_score').innerHTML;
        let home_foul = document.getElementById('home_foul').innerHTML;
        let away_foul = document.getElementById('away_foul').innerHTML;
        let home = document.getElementById('home').value;
        let away = document.getElementById('away').value;
        let period = document.getElementById('period').innerHTML;

        $.ajax({
            type:'POST',
            url:"{{ route('scoreboard.post') }}",
            // url:"/skor/update",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
								id : id,
                home : home,
                away : away,
                home_score : home_score,
                away_score : away_score,
                home_foul : home_foul,
                away_foul : away_foul,
                period : period
            },
         });
    });

		// Period
    $('.min_period').on('click', function(){
				var id = 1;
        let period = document.getElementById('period').innerHTML;
        if(period > 1){
            period = 1;
        }
        document.getElementById('period').innerHTML = period;
				let home_score = document.getElementById('home_score').innerHTML;
        let away_score = document.getElementById('away_score').innerHTML;
        let home_foul = document.getElementById('home_foul').innerHTML;
        let away_foul = document.getElementById('away_foul').innerHTML;
        let home = document.getElementById('home').value;
        let away = document.getElementById('away').value;
				let per = document.getElementById('period').innerHTML;

				$.ajax({
            type:'POST',
            url:"{{ route('scoreboard.post') }}",
            // url:"/skor/update",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
								id : id,
                home : home,
                away : away,
                home_score : home_score,
                away_score : away_score,
                home_foul : home_foul,
                away_foul : away_foul,
                period : per
            },
         });
    });

    $('.plus_period').on('click', function(){
				var id = 1;
				let period = document.getElementById('period').innerHTML;
        if(period < 2){
            period = 2;
        }
        document.getElementById('period').innerHTML = period;
				let home_score = document.getElementById('home_score').innerHTML;
        let away_score = document.getElementById('away_score').innerHTML;
        let home_foul = document.getElementById('home_foul').innerHTML;
        let away_foul = document.getElementById('away_foul').innerHTML;
        let home = document.getElementById('home').value;
        let away = document.getElementById('away').value;
				let per = document.getElementById('period').innerHTML;

				$.ajax({
            type:'POST',
            url:"{{ route('scoreboard.post') }}",
            // url:"/skor/update",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
								id : id,
                home : home,
                away : away,
                home_score : home_score,
                away_score : away_score,
                home_foul : home_foul,
                away_foul : away_foul,
                period : per
            },
         });
    });


		// <CONTROL>
    // Reset Scoreboard
    $('.reset_scoreboard').on('click', function(){
				var id = 1;
        document.getElementById('home_score').innerHTML = 0;
        document.getElementById('away_score').innerHTML = 0;
        document.getElementById('home_foul').innerHTML = 0;
        document.getElementById('away_foul').innerHTML = 0;
        document.getElementById('home').value = "";
        document.getElementById('away').value = "";

				let home_score = document.getElementById('home_score').innerHTML;
        let away_score = document.getElementById('away_score').innerHTML;
        let home_foul = document.getElementById('home_foul').innerHTML;
        let away_foul = document.getElementById('away_foul').innerHTML;
        let home = document.getElementById('home').value;
        let away = document.getElementById('away').value;
        let period = document.getElementById('period').innerHTML;

        $.ajax({
            type:'POST',
            url:"{{ route('scoreboard.post') }}",
            // url:"/skor/update",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
								id : id,
                home : home,
                away : away,
                home_score : home_score,
                away_score : away_score,
                home_foul : home_foul,
                away_foul : away_foul,
                period : period
            },
         });
    });

		// Update Scoreboard
		$('.update').on('click', function(){
        var id = 1;

				let home_score = document.getElementById('home_score').innerHTML;
        let away_score = document.getElementById('away_score').innerHTML;
        let home_foul = document.getElementById('home_foul').innerHTML;
        let away_foul = document.getElementById('away_foul').innerHTML;
        let home = document.getElementById('home').value;
        let away = document.getElementById('away').value;
        let period = document.getElementById('period').innerHTML;

        $.ajax({
            type:'POST',
            url:"{{ route('scoreboard.post') }}",
            // url:"/skor/update",
            data:{
                "_token": "{{ csrf_token() }}",
                id:id,
								id : id,
                home : home,
                away : away,
                home_score : home_score,
                away_score : away_score,
                home_foul : home_foul,
                away_foul : away_foul,
                period : period
            },
         });
    });


		// Count Down
    $(document).on('click','.start',function(){
        // var token = $('meta[name="csrf-token"]').attr('content');
        var id = 1;

        let countdown = 1;

        $.ajax({
            type: 'POST',
            url: "{{ route('scoreboard.post') }}",
            data: {
								"_token": "{{ csrf_token() }}",
                id : id,
                countdown : countdown
            },
        });
    });

    $(document).on('click','.stop',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = 1;

        let countdown = 0;

        $.ajax({
            type: 'POST',
            url: "{{ route('scoreboard.post') }}",
            data: {
								"_token": "{{ csrf_token() }}",
                id : id,
                countdown : countdown
            },
        });
    });

    $(document).on('click','.reset_timer',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = 1;

        let countdown = 3;

        $.ajax({
            type: 'POST',
            url: "{{ route('scoreboard.post') }}",
            data: {
								"_token": "{{ csrf_token() }}",
                id : id,
                countdown : countdown
            },
        });
    });

		// Audio
    $(document).on('click','.sound1',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = 1;

        let aud = 1;
        let status = document.getElementById('sound_status').value;

        if(status == 0){
            status = 1
            document.getElementById('sound_status').value = 1;
        }
        else{
            status = 0;
            document.getElementById('sound_status').value = 0;
        }

        $.ajax({
            type: 'POST',
            url: '/scoreboard-controller/update',
            data: {
                _token: token,
                id : id,
                id_sound : aud,
                status : status
            },
        });
    });

    $(document).on('click','.sound2',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = 1;

        let aud = 2;
        let status = document.getElementById('sound_status').value;

        if(status == 0){
            status = 1
            document.getElementById('sound_status').value = 1;
        }
        else{
            status = 0;
            document.getElementById('sound_status').value = 0;
        }

        $.ajax({
            type: 'POST',
            url: '/scoreboard-controller/update',
            data: {
                _token: token,
                id : id,
                id_sound : aud,
                status : status
            },
        });
    });

    $(document).on('click','.sound3',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var id = 1;

        let aud = 3;
        let status = document.getElementById('sound_status').value;

        if(status == 0){
            status = 1
            document.getElementById('sound_status').value = 1;
        }
        else{
            status = 0;
            document.getElementById('sound_status').value = 0;
        }

        $.ajax({
            type: 'POST',
            url: '/scoreboard-controller/update',
            data: {
                _token: token,
                id : id,
                id_sound : aud,
                status : status
            },
        });
    });
   







    $(".btn-submit").click(function(){
  
        // e.preventDefault();
   
				var id = 1;
				// var score = $("input[name=score]").val();
				let score = document.getElementById('hc').innerHTML;
        // var name = $("input[name=name]").val();
        // var password = $("input[name=password]").val();
        // var email = $("input[name=email]").val();
   
        $.ajax({
           type:'POST',
           url:"{{ route('ajaxRequest.post') }}",
           data:{"_token": "{{ csrf_token() }}",id:id,score:score},
					 success:function(data){
              alert(data.success);
           }
        });
  
    });
</script>
@endsection
