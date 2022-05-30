@extends('layouts.app')
@section('content')
<div class="container">
<br>
<br>

<form action="{{ url('/category/'.$category->id ) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('category.form',['modo'=>'Editar']);



</form>
</div>
@endsection