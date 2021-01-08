@extends('../home')

@section('header')
    <h2>Product</h2>
@endsection
@section('content')


<div class="col-md-4 offset-md-4">
@if(session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}}</div>
    {{session()->forget('success')}}
@endif
<form method="post" action="/product">
    @csrf
    <label>Name</label>
    <input type="text" class="form-control" name="name" />
    @error('name')
        <li class="list">{{$message}}</li>
    @enderror


    <br/>
    <button type="submit" class="btn btn-success form-control">Add</button>
</form>

</div>
@endsection