
@extends('../home')

@section('header')
    <h2>Edit Role</h2>
@endsection
@section('content')

<div class="col-md-4 offset-md-4">
<form method="post" action="/roleupdate/{{$role->id}}">
    @csrf
    @method('put')
    <label>Name</label>
    <input type="text" class="form-control" name="name" value={{$role->name}} />
    <br/>
    <table class="table">
      @php
      $pernames= $permissions->pluck('name'); //array ma vako object vo value tanxa yesma name object ko key ho tyo key bata array niskinxa 
      // print($pernames);
      $models=array('Role','User','Product');
        
      $modelper=array('role','user','product');
      $operation=array('create','edit','view','delete');
      $countmodelper=count($modelper);
      $countoperation=count($operation);
  
    @endphp
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
        
             @foreach ($models as $item)
             <tr>
             <td>{{$item}}</td>
             @foreach ($operation as $op)
             <td>
              <input name="per[]" value={{strtolower($item).'_'.$op}} type="checkbox" aria-label="Checkbox for following text input" {{$pernames->contains(strtolower($item).'_'.$op) ? "checked" :""}}  />
             </td>
             @endforeach
             </tr>
             @endforeach


            {{-- <tr>
            <td colspan="5">GGGG</td>
            </tr> --}}
    
              {{-- @foreach ($models as $item)
              <tr id="{{$item}}">
              <td>{{$item}}</td>
              @endforeach

             @foreach ($modelper as $item)
              @foreach ($operation as $op)
              <td>
                {{$item.'-'.$op}}
              </td>
              @endforeach
             </tr>
             @endforeach --}}

             
             
             {{-- <h1>HEllo</h1>
             <hr/>
             @foreach($models as $model)
                <tr>
                  <td>{{$model}} </td> 
             @endforeach
                    
                  @for($i=0;$i<$countmodelper;$i++)
                    @for($j=0;$j<$countoperation;$j++)
                      {{$modelper[$i]."_".$operation[$j]}}</td>
                      
                    @endfor
                    
                    
                  </tr>
                  @endfor
                 --}}
              
      </tbody>
      </table>
    

    <br/>
    <button type="submit" class="btn btn-success form-control">Update</button>
</form>

</div>

@endsection