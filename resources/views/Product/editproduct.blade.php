
@extends('../home')

@section('header')
    <h2>Edit Product</h2>
@endsection
@section('content')
<h1>Edit Product</h1>

<a href="/productlist" class="btn btn-primary">View</a>
<br/>
<div class="col-md-4 offset-md-4">


<form method="post" action="/productupdate/{{$product->id}}">
    @csrf
    @method('put')
    <label>Name</label>
    <input type="text" class="form-control" name="name" value={{$product->name}} />
    

    

    <br/>
    <button type="submit" class="btn btn-success form-control">Update</button>
</form>

</div>
@endsection