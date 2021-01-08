@extends('../home')


@section('header')
    <h2>List of User</h2>
@endsection


@section('add')
{{-- @role('admin|editor')
  <a href="/user" class="btn btn-sm btn-outline-primary ">
    Add User
  </a>
@endrole --}}
@can('user_create')
<a href="/user" class="btn btn-sm btn-outline-primary ">
  Add User
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
            <th scope="col">Role</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
            @php($id=0)
            @foreach($users as $user)
          <tr>
          
                <td>{{++$id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->role}}</td>
                
                <td>
                  @can('user_edit')
                    <a href="useredit/{{$user->id}}" class="btn btn-success">Edit</a>&nbsp;&nbsp;
                  @endcan

                  @can('user_delete')
                    <a href="userdelete/{{$user->id}}" class="btn btn-danger">Delete</a>
                  @endcan
                </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
</div>

@endsection