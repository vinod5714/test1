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
							@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
                            @endif	
							<form action="" method="post" enctype="multipart/form-data" >
									<div class="form-group">
									<label class="col-lg-2">User</label>
									
									@php
									 $flights=App\User::where('type','user')->get();
									@endphp
									
									
									<select class="form-control" name="uid">
									
									@foreach($flights as $row)
									<option value="{{$row->id}}">{{$row->name}}</option>	
									@endforeach
									</select>
									</div>
								<div class="form-group">
								<label class="col-lg-2">User</label>
								
								<input type="file" name="upload" class="form-control"/>
								
								<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
								</div>
							    <input type="submit" name=""/>
							
							</form>	  
                          <table class="table table-bordered">
								<thead>
								  <tr>
									<th>Name</th>
									<th>Document</th>
									<th>Option</th>
								  </tr>
								</thead>
								    @php
										$flights =  App\Documents::all();
									@endphp		
									@foreach($flights as $row)
										<tbody>
											  <tr>
												  @php
												  $uid=$row->uid;
												  $name=App\User::find($uid)->name; 
												  @endphp
											  
											  
												<td>{{ $name }}</td>
												<td><a href="{{ url($row->upload) }}" class="btn btn-info" download>Download</a></td>
												<td><a href="{{ url('docdel/'.$row->id) }}" class="btn btn-primary">Delete</a></td>						 
											  </tr>				
									
									@endforeach
								        </tbody>
							</table>   
					
					
					@elseif(Auth::user()->type  == 'user')
						
					<table class="table table-bordered">
								<thead>
								  <tr>
									<th>Name</th>
									<th>Document</th>
									
								  </tr>
								</thead>
								    @php
									    $uid=Auth::user()->id;
										$flights =  App\Documents::where('uid', '=',$uid)->get();								
									@endphp		
										
										<tbody>
									@foreach($flights as $row)
									
											  <tr>
												  @php
												  $uid=Auth::user()->id;
												  $name=App\User::find($uid)->name; 
												  @endphp										  
											  
												<td>{{ $name }}</td>
												<td><a href="{{ url($row->upload) }}" class="btn btn-info" download>Download</a></td>
												
											  </tr>									
									@endforeach
								        </tbody>
								        		    

					</table>

					@endif                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
