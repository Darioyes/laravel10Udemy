@extends('dashboard.layout')

@section('content')
    <h1>Actualizar Categoría {{$category->title}}</h1>
    @include('fragment._errors-form')

    <form action="{{  route('category.update',$category->id) }}" method="post">
        @method('PATCH')
        @include('dashboard.category._form')
    </form>
@endsection