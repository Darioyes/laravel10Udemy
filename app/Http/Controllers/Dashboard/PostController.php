<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\post\StoreRequest;
use App\Http\Requests\post\EditRequest;
use App\Models\Post;
use App\Models\Category; // Add this line to import the Category class
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():view
    {
        // $posts = Post::get();
        $posts = Post::paginate(2);
        return view('dashboard.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():view
    {
        $categories = Category::pluck('id','title');//trae solo los campos que necesito

        $post = new Post();
        //dd($categories);
        return view('dashboard.post.create', compact('categories','post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeRequest $request) //crear registros con store y el storeRequest es validaciones
    {
        // $validated = $request->validate([
        //     'title' => 'required|min:5|max:500|unique:posts',
        //     'slug' => 'required|min:5|max:500',
        //     'content' => 'required|min:7',
        //     'category_id' => 'required|integer|exists:categories,id',
        //     'description' => 'required|min:7',
        //     'posted' => 'required',
        // ]);
        //dd($validated);
        //dd($request);

        //pasar una imagen por defecto
        // $data = array_merge($request->all(),['image'=>'uiuiubdibd.img']);

        //dd($data);

        //para el slug colocar guiones en vez de espacios y letra minuscula

        // $data = $request->validated();


        // $data['slug'] = Str::slug($data['title']);

        // dd($data);

        Post::create($request->validated());
        //Post::create($request->all());

        //redireccionar
        return to_route('post.index')->with('status','Registro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id','title');//trae solo los campos que necesito
        //dd($categories);
        return view('dashboard.post.edit', compact('categories',  'post'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(editRequest $request, Post $post)
    {

        $data =$request->validated();
        //guardar imagen si existe
        if(isset($data['image'])){

            //nombrar la imagen
            $filename = time().'.'.$data['image']->extension();
            $data['image'] = $filename;

            //dd($filename);

            //mover la foto a la carpeta publica y hay en la carpeta post
            $request->image->move(public_path('images/post'),$filename);
        }

        $post->update($data);
        //$request->session()->flash('status','Registro actualizado');
        return to_route('post.index')->with('status','Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        
        $post->delete();
        return to_route('post.index')->with('status','Registro eliminado');
    }
}
