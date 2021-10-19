<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy("id","asc")->paginate(10);
        
        return view('backend.products_read')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('products.store');      

        return view('backend.products_create_update', ['action' => $action]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product             = new Product();
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->content     = $request->content;
        $product->hot         = isset($request->hot) != "" ? 1 : 0;
        $product->status      = isset($request->status) != "" ? 1 : 0;
        $product->price       = $request->price;
        $product->discount    = $request->discount; 
        $product->category_id = $request->category_id;
        $product->created_at   = Carbon::now()->format('Y-m-d H:i:s');
        // Upload Image
        if (!$request->hasFile('photo')) {
            $product->photo = '';
          } else {
            $image = $request->file('photo');
            $storedPath = $image->move('upload/products', $image->getClientOriginalName());
            $product->photo = $image->getClientOriginalName();
          }

        $product->save();

        return redirect(route('products.index')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $detail = Product::find($id);
        // return view('backend.products_read')->with(['data' => $detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $action = url('admin/products/'.$product->id);
        return view('backend.products_create_update', ['record' => $product, 'action' => $action]);
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
        $product              = Product::find($id);
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->content     = $request->content;
        $product->hot         = isset($request->hot) != "" ? 1 : 0;
        $product->status      = isset($request->status) != "" ? 1 : 0;
        $product->price       = $request->price;
        $product->discount    = $request->discount; 
        $product->category_id = $request->category_id;
        $product->updated_at   = Carbon::now()->format('Y-m-d H:i:s');
        if($request->photo != ''){        
            $path = public_path().'/upload/products/';
          //code for remove old file
          if($product->photo != '' && $product->photo != null){
               unlink($path.$product->photo);
          }

          //upload new file
          $image = $request->file('photo');
          $storedPath = $image->move('upload/products', $image->getClientOriginalName());
          $product->photo = $image->getClientOriginalName();

        }
        $product->save();
        return redirect(url("admin/products"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedProducts = Product::where('id', '=', $id)->delete();

        return redirect(route('products.index')); 
    }

    // Paginate Product
    public function paginateProduct($number)
    {
        $data = Product::orderBy("id","asc")->paginate($number);

        return view('backend.products_read')->with(['data' => $data]);
    }

    public function searchProd(Request $request)
    {
        $data = Product::where('name','like','%'.$request->key.'%')
        ->orWhere('price',$request->key)
        ->paginate(10);

        return view('backend.products_read', ["data" => $data]);

    }
}
