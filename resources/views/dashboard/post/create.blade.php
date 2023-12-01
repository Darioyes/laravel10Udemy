@extends('dashboard.layout')

@section('content')
    <h1>Crear post</h1>
    @include('fragment._errors-form')

    <form action="{{  route('post.store') }}" method="POST">
       @include('fragment._form')
    </form>
@endsection