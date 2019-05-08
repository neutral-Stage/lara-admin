@extends('layouts.master')

@section('contents')
	<table class="table">
		<tr>
			<th>#</th>
			<th>Person(Click to see detail)</th>
			<th>Problem</th>
		</tr>
		@foreach($reactions as $reaction)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>
					@foreach($users as $user)
						@if($reaction->problem->user_id == $user->id)
							<a type="button" onclick="event.preventDefault()" data-toggle="modal" href="" data-target="#aa{{ $user->id }}">{{ $user->name }}</a>
						@endif
					@endforeach
				</td>
				<td>{{ $reaction->problem->problem }}</td>
			</tr>
		@endforeach
	</table>



	<!-- Modal -->
	@foreach($users as $u)
	<div class="modal fade" id="aa{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Detail</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <h5>{{ $u->name }}</h5>
	        {{ $u->email }}
	      </div>
	      
	    </div>
	  </div>
	</div>
	@endforeach
@endsection