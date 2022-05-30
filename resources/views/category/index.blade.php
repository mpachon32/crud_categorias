
@extends('layouts.app')
@section('content')
<div class="container">

<div class="alert alert-success alert-dismissible" role="alert">
@if(Session::has('mensaje'))

{{Session::get('mensaje')}}
@endif

</div>

<br>
<br>
<a href="{{url('category/create')}}" class="btn btn-primary">Registrar nueva categoría</a>
<br>
<br>
<table class="table table-dark">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $categories as $category )
        <tr>
            <td>{{ $category->id}} </td>
            <td>{{ $category->Name}} </td>
            <td>{{ $category->Description}} </td>
            <td>
            <a href="{{ url('/category/'.$category->id.'/edit' ) }}" class="btn btn-info">
                    Editar
            </a>    
             | 
             
                <form action="{{ url('/category/'.$category->id ) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')"
                    value="Borrar">

                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $categories->links() !!}

</div>
@endsection