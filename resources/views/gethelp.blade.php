@extends('layouts.master')

@section('contents')
	<div class="heading bg-warning p-5 mb-3">
		<h1><i class="fas fa-bullhorn"></i> Those are the problem you shared......</h1>
			<i style="margin-left: 40px " class="fas fa-mouse-pointer"></i> Click to see who wanna help!!
	</div>
<div class="row">
	<div class="col-md-8 offset-md-2">
		 @foreach($problems as $problem)
		 <div class="wow bounceInUp">
		 	<h1>
		 		<a type="button" class="btn btn-dark btn-block mt-1 text-white" onclick="event.preventDefault()" data-toggle="modal" href="" data-target="#aa{{ $problem->id }}"><h5>{{ $problem->problem }}</h5></a>
		 	</h1>
		</div> 
		 @endforeach
		
	</div>
</div>
 
 @foreach($problems as $problem)
 	
 		<div class="modal fade" id="aa{{ $problem->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title text-success" id="exampleModalLongTitle">Those Who wanted to help</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	@foreach($reactions as $reaction)
		      	@if($problem->id == $reaction->problem_id)
		        <h5>Name: {{ $reaction->user->name }}</h5>
		        Email: {{ $reaction->user->email }} <hr>
		        @endif
		        @endforeach
		      </div>
		    </div>
		  </div>
		</div>
 @endforeach

@endsection

@section('script')
  <script>
  	new WOW().init();
  </script>
@endsection