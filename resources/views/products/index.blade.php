@extends('welcome')
@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
  <a class="navbar-brand" href="">Products</a>
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
        <a href="{{ route('products.create') }}" role="button" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Purchase" >  
          <i class="fa fa-user-plus fa-2x"></i> Purchase
        </a>
      </li>
    </ul>
  </div>
</nav>

<div class="card shadow border-0" id="example2" style="display:none">
  <div class="card-body">  
    <table id="example" class="table-striped">
      <thead>
        <tr>
          <th>ID.</th>
          <th>First Name</th>
          <th>Designation</th>
          <th>Supplier</th>
          <th>Category</th>
          <th>Products</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $supp)
        <tr>
          <td>{{ $supp->id }}</td>
          <td>
            {{ 
              $supp->first_name . " " . 
              $supp->middle_name . " " . 
              $supp->last_name 
              }} {{ $supp->suffix_name == "NOTAP" ? ' ' : $supp->purchaseSuffix['suffix_code'] }}
          </td>
          <td>{{ $supp->purchaseDesignation['designation'] }}</td>
          <td>{{ $supp->supplier['supplier_name'] }}</td>
          <td>{{ $supp->category['category_name'] }}</td>
          <td>{{ $supp->products['product_name'] }}</td>
          <td>
            <a  href="{{ route('products.edit',$supp->id) }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
            <a data-toggle="modal" data-target="#deleteCourse{{ $supp->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
          </td>
        </tr>

            <!--modal -->
            <div class="modal fade" id="deleteCourse{{ $supp->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Please Confirm!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                 <div class="modal-body">
                    <form method="POST" action="{{ route('products.destroy',$supp->id) }}">
                    {{ csrf_field() }}  
                    <h5>Would you like to Delete this record?</h5>
                 </div>
                  <div class="modal-footer">
                    {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                    {{ Form::button('Close', ['type' => 'submit', 'class' => 'btn btn-secondary' , 'data-dismiss' => 'modal'] )  }}
                    {{ method_field('DELETE') }}
                    </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
          <!-- Modal -->

        @endforeach         
      </tbody>
    </table>
  </div>  
</div>
    
@endsection

 