<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::select('id', 'name')
            ->orderBy("id","asc")
            ->paginate(5);
            
        return view('backend.categories_read', ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('categories.store');
        return view('backend.categories_create_update', ['action' => $action]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category              = new Category;
        $category->name        = $request->input('name');
        $category->description = $request->input('description');
        $category->save();
        return redirect(route('categories.index')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $action = url('admin/categories/'.$category->id);
        return view('backend.categories_create_update', ['record' => $category, 'action' => $action]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category              = Category::find($id);
        $category->name        = $request->input('name');
        $category->description = $request->input('description');
        $category->created_at  = $request->input('created_at');
        $category->save();
        
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', '=', $id)->delete();

        return redirect(route('categories.index')); 
    }
    public function searchCate(Request $request)
    {
        $data = Category::where('name','like','%'.$request->key.'%')->paginate(10);

        return view('backend.categories_read', ["data" => $data]);

    }
}
