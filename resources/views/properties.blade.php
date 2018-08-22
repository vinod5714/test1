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
										<label class="col-lg-2">Name</label>
										<input type="text" name="name" class="form-control"/>
									
									</div>
									
									<div class="form-group">
										<label class="col-lg-2">Capacity</label>
										<input type="text" name="capacity" class="form-control"/>
									
									</div>
									
									
									
								<div class="form-group">
									<label class="col-lg-2">price</label>
									
									<input type="number" name="price" class="form-control"/>
									
									<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
								</div>
								
								
							    <input type="submit" name=""/>
							
							</form>	  
                          <table class="table table-bordered">
								<thead>
								  <tr>
									<th>Name</th>
									<th>Capacity</th>
									<th>Price</th>
									<th>Option</th>
								  </tr>
								</thead>
								    @php
										$flights =  App\Property::all();
									@endphp		
									@foreach($flights as $row)
										<tbody>
											  <tr>								  
												<td>{{ $row->name }}</td>
												<td>{{ $row->capacity }}</td>
												<td>{{ $row->price }}</td>												
												<td><a href="{{ url('propertydel/'.$row->id) }}" class="btn btn-primary">Delete</a>
												<a href="#" onclick='window.open("{{ url('propertyassign/'.$row->id) }}", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500,left=500,width=400, height=700");' class="btn btn-primary">Assign</a>
												</td>						 
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
