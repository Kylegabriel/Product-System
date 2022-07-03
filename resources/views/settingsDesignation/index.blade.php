@extends('settings.index')
@section('settings')
<div class="loader"></div> 
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
    <a class="navbar-brand" href="">Designation</a>
		<div class="collapse navbar-collapse" id="nav-inner-primary">
	        <div class="navbar-collapse-header">
		        <div class="row">
		          <div class="col-6 collapse-brand">
		          </div>
		          <div class="col-6 collapse-close">
		            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-inner-primary" aria-controls="nav-inner-primary" aria-expanded="false" aria-label="Toggle navigation">
		              <span></span>
		              <span></span>
		            </button>
		          </div>
		        </div>
	        </div>
		<ul class="navbar-nav ml-lg-auto">
			<li class="nav-item">
	    		<a data-toggle="modal" data-target="#createdesignation" class="btn btn-link text-white" data-toggle="tooltip" data-placement="left" title="Add Course">
	            <span class="btn-inner--icon"></span>
	            <span class="btn-inner--text">
	            	<i class="fa fa-handshake-o"></i>
	            	Add Designation
	            </span>
	      		</a>
        	</li>
      </ul>
    </div>
</nav> 

<div class="card shadow border-0" id="example2" style="display:none">
	<div class="card-body">  <!-- div card body -->
		<table id="example" class="table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Site Designation</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $designation as $desig )
					<tr>
						<td>{{ $desig->id }}</td>
						<td>{{ $desig->designation }}</td>
						<td>
							<a data-toggle="modal" data-target="#editSite{{ $desig->id }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
							<a data-toggle="modal" data-target="#deleteSite{{ $desig->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
						</td>
					</tr>

					<!--modal -->
					<div class="modal fade" id="editSite{{ $desig->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		              		<div class="modal-dialog modal-dialog-centered" role="document">
		                		<div class="modal-content">
				                  	<div class="modal-header">
					                    <h5 class="modal-title">EDIT SITE DESIGNATION</h5>
					                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                      <span aria-hidden="true">×</span>
					                    </button>
				                  	</div>
				                  	<div class="modal-body">
			                        	{!! Form::model($desig, ['route' => ['designation.update', $desig->id], 'method' => 'PUT']) !!}	
					    				{{ csrf_field() }}  
					                	<div class="row">
					                		<div class="col s12">
					    	            		<div class="input-field col s12">
					    	            			{{ Form::label('designation','SITE DESIGNATION') }}
													{{ Form::text('designation',null,['class'=>'form-control','id'=>'designation','required' => 'required']) }} 
					    					    </div>
					    	            	</div>
					    	            </div>	    
				                  	</div>
				                    <div class="modal-footer">
										<button type="submit" class="btn btn-primary">Save changes</button>
				                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				                    </div>
				                  	{!! Form::close() !!}
				                </div>
		              		</div>
		            	</div>
		           	</div>
		           	<!--modal -->

		           	<!--modal -->
					<div class="modal fade" id="deleteSite{{ $desig->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		              	<div class="modal-dialog modal-dialog-centered" role="document">
		                	<div class="modal-content">
				                <div class="modal-header">
				                    <h5 class="modal-title">Please Confirm!</h5>
				                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                      <span aria-hidden="true">×</span>
				                    </button>
				                </div>
				                 <div class="modal-body">
			                        {!! Form::model($desig, ['route' => ['designation.destroy', $desig->id], 'method' => 'DELETE']) !!}	
					    			{{ csrf_field() }}  
					    			<h5>Would you like to Delete this record?</h5>
				                </div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Save</button>
			                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			                    </div>
				                  	{!! Form::close() !!}  
				                </div>
		              		</div>
		            	</div>
		           	</div>
		           	<!--modal -->
				@endforeach
			</tbody>
		</table>
	</div><!-- end div card body -->

	<div class="modal fade" id="createdesignation" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
		        <h5 class="modal-title">ADD DESIGNATION</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">×</span>
		        </button>
	      	</div>
	            <div class="modal-body">
	                {!! Form::open(['route' => 'designation.store','method' => 'POST']) !!}	
	    			{{ csrf_field() }}  
	            	<div class="row">
	            		<div class="col s12">
		            		<div class="input-field col s12">
						        {{ Form::label('designation','DESIGNATION') }}
								{{ Form::text('designation',null,['class'=>'form-control','id'=>'designation','required' => 'required']) }}  
						    </div>
		            	</div>
		            </div>	    
	            </div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
               {!! Form::close() !!}
            </div>
  		</div>
	</div>

</div>

@endsection