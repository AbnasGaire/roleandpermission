
@extends('../home')

@section('content')
<h1>Edit User</h1>


<div class="col-md-4 offset-md-4">


<form method="post" action="/userupdate/{{$user->id}}">
    @csrf
    @method('put')
    <label>Name</label>
    <input type="text" class="form-control" name="name" value={{$user->name}} />

    <label>Email</label>
    <input type="text" class="form-control" name="email" value={{$user->email}} />
    
    <label>Role</label>
    <select class="form-control" name="role">
        @if($role)
            <option>{{$role}}</option>
        
        @endif
        @foreach($roles as $r)
            @if($r->name !=$role)
                <option value={{$r->id}}>{{$r->name}}</option>
            @endif
        @endforeach
        
    </select>

    

    <br/>
    <button type="submit" class="btn btn-success form-control">Update</button>
</form>

</div>
@endsection