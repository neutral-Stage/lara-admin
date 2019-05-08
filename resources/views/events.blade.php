@extends('layouts.master')

@section('contents')
 <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Bordered Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Event Name</th>
                  <th>Action</th>
                </tr>
                @foreach($events as $event)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $event->comment }}</td>
                  
                  <td>
                  	<a href="{{ route('admin.event',['id'=>$event->id, 'name'=>$event->comment]) }}">View</a>
                  </td>
                </tr>
                @endforeach                
              </tbody></table>
            </div>
            <!-- /.box-body -->
            

          <!-- /.box -->
        </div>
@endsection