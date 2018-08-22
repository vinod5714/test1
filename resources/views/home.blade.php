@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome {{ Auth::user()->name }}</div>

                <div class="card-body">
                     @if (\Session::has('success'))
					  <div class="alert alert-success">
						<p>{{ \Session::get('success') }}</p>
					  </div><br />
					 @endif
					
					@if(Auth::user()->type  == 'admin')
								
									@php
										$flights =  App\User::all();
									@endphp				
							<table class="table table-bordered">
								<thead>
								  <tr>
									<th>Name</th>
									<th>Email</th>
									<th>Option</th>
								  </tr>
								</thead>
									@foreach($flights as $row)
										<tbody>
											  <tr>
												<td>{{ $row->name }}</td>
												<td>{{ $row->email }}</td>
												<td><a href="{{ url('userdel/'.$row->id) }}" class="btn btn-primary">Delete</a>
											   @if($row->status == '1')												   
											   <a href="{{ url('userstat/'.$row->id) }}" class="btn btn-danger">Dis approve</a>
											  @else
											  <a href="{{ url('userstat/'.$row->id) }}" class="btn btn-primary">Approve</a></td>
											  @endif
											  </tr>				
									
									@endforeach
								        </tbody>
							</table>

   
   
					
					
					@elseif(Auth::user()->type  == 'user')
						
					
					@endif

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
