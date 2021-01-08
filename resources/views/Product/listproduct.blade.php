@extends('../home')
@section('header')
    <h2>List of Product</h2>
@endsection


@section('add')

@can('product_create')
  <a href="/product" class="btn btn-sm btn-outline-primary ">
    Add Product
  </a>
@endcan

@endsection 
@section('content')
<div class="col-md-8 offset-md-2">
    @if(session()->has('editproduct'))
    <div class="alert alert-success">
      
        {{session()->get('editproduct')}}
    
        
    </div>
    @endif

    @if(session()->has('deleteproduct'))
        <div class="alert alert-danger">
            
            {{session()->get('deleteproduct')}}
            
        </div>
    @endif
       
        
   
     {{session()->forget('deleteproduct')}}
   
    {{session()->forget('editproduct')}}
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
          <tr>
          
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                
                <td>
                  @can('product_edit')
                  <a href="productedit/{{$product->id}}" class="btn btn-success">Edit</a>&nbsp;&nbsp;
                  @endcan

                  @can('product_delete')
                    <a href="productdelete/{{$product->id}}" class="btn btn-danger">Delete</a>
                  @endcan
                </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
</div>

@endsection