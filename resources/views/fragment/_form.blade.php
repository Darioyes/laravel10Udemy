@csrf

<label for="">Título</label>
<input type="text" name="title" value="{{old('title',$post->title)}}">

<label for="">Slug</label>
<input type="text" name="slug" value="{{old('slug',$post->slug)}}">

<label for="">Categoria</label>
<select name="category_id" >
    <option value="">Categorias</option>
    @foreach ($categories as $title => $id) //foreach para mostrar clave y valor
        <option {{ old('category_id',$post->category_id) == $id ? 'selected':'' }} value="{{$id}}">{{$title}}</option>        
    @endforeach
</select>

<label for="">Posteado</label>
<select name="posted">
    <option value="">
        <option {{old('posted',$post->posted) == 'not' ? 'selected':''}} value="not">No</option>
        <option {{old('posted',$post->posted) == 'yes' ? 'selected':''}} value="yes">Si</option>

    </option>
</select>

<label for="">Contenido</label>
<textarea name="content">{{old('content',$post->content)}}</textarea>

<label for="">Descripcion</label>
<textarea name="description">{{old('description',$post->description)}}</textarea>

@if (isset($tags) && $tags == 'edit')
    <label for="">Imagen</label>
    <input type="file" name="image" id="">
@endif

<button type="submit">Enviar</button>