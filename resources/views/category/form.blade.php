<h1>{{$modo}} categoría</h1>

@if (count($errors)>0)

    <div class="alert alert-danger" role="alert">
    <ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </div>
    </ul>
    
@endif

<div class="form-group">

    <label for="Name">Nombre</label>
    <input type="text" class="form-control" name="Name" 
    value="{{ isset($category->name)?$category->Name:old('Name')  }}" id="Name">

</div>

<div class="form-group">

    <label for="Description">Descripción</label>
    <input type="text" class="form-control" name="Description" 
    value="{{ isset($category->description)?$category->Description: old('Description') }}" id="Description">
    <br>
    <br>

</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos">


<a class="btn btn-primary" href="{{url('category/')}}">Regresar</a>
<br>
<br>