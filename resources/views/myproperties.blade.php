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

                        		
					<table class="table table-bordered">
								<thead>
								  <tr>
									<th>Property Name</th>
                                    <th>User Name</th>
                                    <th>Plot</th>
                                    <th>Amount</th>
                                    <th>Options</th>
								
									
								  </tr>
								</thead>
								    @php
									    $uid=Auth::user()->id;

                                           $flights=DB::table('assigns')
                                            ->select('assigns.id as aid','assigns.amount','assigns.plotno','properties.name as pname','users.name')
                                            ->join('properties','properties.id','=','assigns.pid')
                                            ->join('users', 'users.id', '=', 'assigns.uid')                                           
                                            ->get();                                  
									@endphp		
                                    
                                  


										<tbody>
									@foreach($flights as $row)
									
											  <tr>											
												<td> {{ $row->pname }}</td>
                                                <td> {{ $row->name }}</td>
                                                <td> {{ $row->plotno }}</td>
                                                <td> {{ $row->amount }}</td>
                                                <td><a href="assigndelete/{{$row->aid}}" class="btn btn-info">Delete</td>											
											  </tr>									
									@endforeach
								        </tbody>
								        		    

					</table>
					
					@elseif(Auth::user()->type  == 'user')

						
					<table class="table table-bordered">
								<thead>
								  <tr>
                                  <th>Property Name</th>
                                    <th>User Name</th>
                                    <th>Plot</th>
                                    <th>Amount</th>
                                   
									
								  </tr>
								</thead>
								    @php
									    $uid=Auth::user()->id;

                                           $flights=DB::table('assigns')
                                            ->select('assigns.id as aid','assigns.amount','assigns.plotno','properties.name as pname','users.name')
                                            ->join('properties','properties.id','=','assigns.pid')
                                            ->join('users', 'users.id', '=', 'assigns.uid')       
                                            ->where('assigns.uid','=',$uid)
                                            ->get();

                                  
									@endphp		
                                    
                                  


										<tbody>
									@foreach($flights as $row)
									
											  <tr>
                                              <td> {{ $row->pname }}</td>
                                                <td> {{ $row->name }}</td>
                                                <td> {{ $row->plotno }}</td>
                                                <td> {{ $row->amount }}</td>
											
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
