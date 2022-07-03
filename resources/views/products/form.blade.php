@extends('welcome')
@section('content') 
<div class="card shadow rounded">
    <div class="card-header border-primary text-white bg-primary">
        Purchase Order
    </div>
    <div class="card-body">
                @if(isset($purchase))
                    {!! Form::model($purchase, ['route' => ['products.update', $purchase->id], 'method' => 'PUT']) !!}
                @else
                {!! Form::open(['route' => 'products.store','method' => 'POST']) !!}
                @endif

                {{ csrf_field() }}

        <div class="row">
            <div class="col-md-3">
                {{ Form::label('last_name','LAST NAME') }}
                {{ Form::text('last_name',null,['class'=>'form-control','id'=>'last_name']) }}
            </div>
            <div class="col-md-3">
                {{ Form::label('first_name','FIRST NAME') }}
                {{ Form::text('first_name',null,['class'=>'form-control','id'=>'first_name']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('middle_name','MIDDLE NAME') }}
                {{ Form::text('middle_name',null,['class'=>'form-control','id'=>'middle_name']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('suffix_name','SUFFIX NAME') }}
                {{ Form::select('suffix_name', $suffix,isset($purchase) ? null : 'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
            </div>
        </div> 
		<div class="row">    
                <div class="col-md-4">
                  	{{ Form::label('supplier_code','SUPPLIER') }}
                      @if(isset($purchase->supplier))
                      {{ Form::select('supplier_code', $supplierr,null, ['class' => 'form-control','id' => 'supplier_code','name' => 'supplier_code']) }}
                      @else
                      <select type="text" id="supplier_code" name="supplier_code" class="form-control">
                        <option disabled selected>Choose your option</option>
                        @foreach($suppliers as $supplier)
                          <option value="{{ $supplier->supplier_code }}">{{ $supplier->supplier_name }}</option>
						@endforeach
                      </select>
                      @endif
                 </div>
          
                <div class="col-md-4">
                  	{{ Form::label('category_code','CATEGORY') }}
                    @if(isset($purchase->category))
                    {{ Form::select('category_code', $categoryy,null, ['class' => 'form-control','id' => 'category_code','name' => 'category_code']) }}
                    @else
                      <select type="text" id="category_code" name="category_code" class="form-control">

                      </select>
                    @endif
                </div>
                <div class="col-md-4">
                  	{{ Form::label('product_code','PRODUCT') }}
                    @if(isset($purchase->products))
                    {{ Form::select('product_code', $productss,null, ['class' => 'form-control ','id' => 'product_code','name' => 'product_code']) }}
                    @else
                      <select type="text" id="product_code" name="product_code" class="form-control">

                      </select>
                    @endif  
                </div>
      		</div>
            <div class="row">
                <div class="col-md-9">
                {{ Form::label('desig_id','DESIGNATION') }}
                @if(isset($purchase->purchaseDesignation))
                {{ Form::select('desig_id', $designationss,NULL, ['class' => 'js-example-basic-single form-control','id' => 'desig_id','name' => 'desig_id']) }}
                @else
                <select type="text" id="desig_id" name="desig_id" class="js-example-basic-single form-control">
                  <option value="" disabled selected>Choose your option</option>
                  @foreach(App\Models\Designation::get() as $desig)
                        <option value="{{ $desig['id'] }}">{{ $desig['designation'] }}</option>  
                   @endforeach
                </select>
                @endif
            </div>

            </div>asdasfdds
        <br>
    </div>
            <div class="card-footer border-primary">
              {{ Form::button( isset($purchase) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
              <a href="{{ route('products.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                  <i class="fa fa-arrow-left"></i>
                  Go Back
              </a>
            </div>                
</div>
  {!! Form::close() !!}

@endsection

@section('scripts')        

<script>

      $('#supplier_code').on('change',function(){
      // Get the suplier code select id value
      var supplierID = $(this).val();  
      // alert(supplierID);  
      if(supplierID){
          $.ajax({
             type:"GET",
             // route
            url:"{{url('supplier/get-supplier-list')}}?supplier_id="+supplierID,
            success:function(res){
                if(res){
                    $("#category_code").empty();
                    $("#category_code").append("<option disabled selected>Choose your Category</option>");
 	                $.each(res,function(key,value){
                      $('#category_code').html();
                    $("#category_code").append('<option value="'+key+'">'+value+'</option>');
                });
             
                }else{
                $("#category_code").empty();
                	}
                } 
            });
        }
        else{
            	$("#category_code").empty();
            	$("#product_code").empty(); 
			}
     	});

		$('#category_code').on('change',function(){
        // Get the category code select id value
        var categoryID = $(this).val();  
        // alert(categoryID);
		if(categoryID){
        $.ajax({
             type:"GET",
             // route
            url:"{{url('category/get-category-list')}}?category_id="+categoryID,
            success:function(res){
                if(res){
					$("#product_code").empty();
	                    $("#product_code").append("<option disabled selected>Choose your Category</option>");
	 	                $.each(res,function(key,value){
	                      $('#product_code').html();
	                    $("#product_code").append('<option value="'+key+'">'+value+'</option>');
	                });
	                }else{    	
	            $("#product_code").empty();
				}
                } 
            	});
        	}

		});

        // $('#supplier_code')
        //     .select2()
        //     .on('select2:open', () => {
        //         $(".select2-results:not(:has(a))").append('<a href="{{ route('products.create') }}" style="padding: 6px;height: 20px;display: inline-table;">CREATE NEW SUPPLIER</a>');
        // })

</script>
@endsection   
