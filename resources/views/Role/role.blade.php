@extends('../home')

@section('header')
    <h2>Role</h2>
@endsection
@section('content')


<div class="col-md-4 offset-md-4">
@if(session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}}</div>
    {{session()->forget('success')}}
@endif
<form method="post" action="/role">
    @csrf
    <label>Role name</label>
    <input type="text" class="form-control" name="name" />
    @error('name')
        <li class="list">{{$message}}</li>
    @enderror


    <br/>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Model</th>
            <th scope="col">Create</th>
            
            <th scope="col">Edit</th>
            <th scope="col">View</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>

            @php
              $models=['Role','User','Product'];
              $modelper=['role','user','product'];
              $operation=['create','edit','view','delete'];
            @endphp
            
            {{-- @foreach($modals as $modal)
                <tr>
                <td>{{$modal}}</td>
            @endforeach --}}

            @foreach($models as $mp)
              <tr>
                <td>{{$mp}}</td>
                @foreach($operation as $op)
                <td><input name="per[]" value={{ strtolower($mp)."_".$op}} type="checkbox" aria-label="Checkbox for following text input"></td>
                @endforeach
              </tr>
            @endforeach

            
            {{-- <tr>
                <td>Role</td>
                <td><input name="per[]" value="role_create" type="checkbox" aria-label="Checkbox for following text input"></td>
                <td><input name="per[]" value="role_edit" type="checkbox" aria-label="Checkbox for following text input"></td>
                <td><input name="per[]" value="role_view" type="checkbox" aria-label="Checkbox for following text input"></td>
                <td><input name="per[]" value="role_delete" type="checkbox" aria-label="Checkbox for following text input"></td>
            
          </tr>
          <tr>
            <td>User</td>
            <td> <input name="per[]" value="user_create"  type="checkbox" aria-label="Checkbox for following text input"></td>
            <td><input  name="per[]" value="user_edit" type="checkbox" aria-label="Checkbox for following text input"></td>
            <td><input   name="per[]" value="user_view" type="checkbox" aria-label="Checkbox for following text input"></td>
            <td><input  name="per[]" value="user_delete"  type="checkbox" aria-label="Checkbox for following text input"></td>
        
        </tr>

        <tr>
            <td>Product</td>
            <td> <input name="per[]" value="product_create"  type="checkbox" aria-label="Checkbox for following text input"></td>
            <td><input  name="per[]" value="product_edit"   type="checkbox" aria-label="Checkbox for following text input"></td>
            <td><input name="per[]" value="product_view"  type="checkbox" aria-label="Checkbox for following text input"></td>
            <td><input name="per[]" value="product_delete"  type="checkbox" aria-label="Checkbox for following text input"></td>
        
      </tr> --}}
        </tbody>
      </table>
    <button type="submit" class="btn btn-success form-control">Add Role</button>
</form>

</div>
@endsection