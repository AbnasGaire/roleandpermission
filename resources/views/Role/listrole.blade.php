@extends('../home')
@section('header')
    <h2>List of Role</h2>
@endsection


@section('add')
{{-- @role('admin|editor')
    <a href="/role" class="btn btn-sm btn-outline-primary ">
    Add Role
    </a>
@endrole --}}

@can('role_create')
    <a href="/role" class="btn btn-sm btn-outline-primary ">
    Add Role
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
            @foreach($roles as $role)
          <tr>
          
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                
                <td>
                    @can('role_edit')
                        <a href="roleedit/{{$role->id}}" class="btn btn-success">Edit</a>&nbsp;&nbsp;
                    @endcan

                    @can('role_delete')
                        <a href="roledelete/{{$role->id}}" class="btn btn-danger">Delete</a>
                    @endcan
                </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
</div>

@endsection