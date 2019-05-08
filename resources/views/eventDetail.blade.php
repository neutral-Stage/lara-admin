@extends('layouts.master')

@section('contents')
	<div class="row">
		<div class="col-md-12">
			
		<div class="card">
			<div class="card-header">
				<h3><strong>Event Name: </strong>{{ $events->comment }}</h3>
			</div>	
		</div>
		</div>
		@foreach($problems as $problem)
		<div class="col-md-6">
			<div class="p-2 pt-4 mb-5" style="min-height: 40vh; background-image: url({{ asset('img/bg.jpg') }}); background-position: center; background-size: cover; background-repeat: no-repeat;" class="bg-imag">
				<h4 class="text-white"><strong>{{ $problem->user->name }}: </strong> {{ $problem->problem }}</h4><hr>
				@if($problem->user_id == Auth::user()->id)
					<div class="wow bounceInUp">
						<h4 style="color: #3e9d41" class="text-center">You will get solution.</h4>
					</div> 
				@else
					@php $fix = array(); @endphp
					@foreach($problem->reaction as $re)
						@if($re->user_id == Auth::user()->id) {{ $re->user_id }} {{ Auth::user()->id }}
							@php $fix[] = 'y' @endphp
						@endif
					@endforeach
					@php
					 if(in_array('y', $fix)){
					 	echo 'reacted';
					 }else{
					 	echo 'help him';
					 }
					 @endphp
					 @if(in_array('y', $fix))
					 	<h4 style="color: #9b360e" class="text-center"><i class="far fa-heart"></i> You wanted to help!!</h4>
					 @else
					 <div class="wow pulse" data-wow-iteration="10" data-wow-duration="3s">
					    <h4 class="text-center"><a style="color: #9b360e" href="{{ route('reaction',['event_id'=>$events->id, 'problem_id'=>$problem->id]) }}">
					 	I Wanna help !!!</i></a></h4>
	                 </div>
					 @endif
					@foreach($fix as $t){{ $t }} @endforeach
				@endif
			<hr>
			<div class="reaction"><span style="color: #fff" class="float-right">
			@foreach($problems as $prb)
				@if($problem->id == $prb->id)
				{{ $problem->reaction->count() }}
				@endif
			@endforeach
			people reacted</span></div>
			</div>
		</div>
		@endforeach
	</div>
@endsection

@section('script')
  <script>
  	new WOW().init();
  </script>
@endsection