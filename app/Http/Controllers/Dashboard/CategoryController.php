<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\category\StoreRequest;
use App\Http\Requests\category\EditRequest;
use App\Models\Category; // Add this line to import the Category class

use Illuminate\View\View;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():view
    {
        // $posts = Post::get();
        $categories = Category::paginate(2);
        return view('dashboard.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():view
    {
        $category = new Category();
        //dd($categories);
        return view('dashboard.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeRequest $request) //crear registros con store y el storeRequest es validaciones
    {

        Category::create($request->validated());
        
        return to_route('category.index')->with('status','Registro creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('dashboard.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(editRequest $request, Category $category)
    {

        $data =$request->validated();
       

        $category->update($data);
        return to_route('category.index')->with('status','Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        
        $category->delete();
        return to_route('category.index')->with('status','Registro eliminado');
    }
}
