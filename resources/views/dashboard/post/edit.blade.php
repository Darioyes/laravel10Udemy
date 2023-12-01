@extends('dashboard.layout')

@section('content')
    <h1>Actualizar post {{$post->title}}</h1>
    @include('fragment._errors-form')

    <form action="{{  route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @include('fragment._form',['tags'=>'edit'])
    </form>
@endsection