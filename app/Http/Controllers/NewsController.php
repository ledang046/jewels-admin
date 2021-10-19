<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\DB;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = News::orderBy("id","asc")->get();
        return view('backend.news_read', ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('news.store');
        return view('backend.news_create_update', ['action' => $action]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $image = array();
            if($files = $request->file('image')){
                foreach ($files as $file) {
                    $image_name = md5(rand(1000, 10000));
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $image_name.'.'.$ext;
                    $upload_path = 'upload/news/';
                    $image_url = $upload_path.$image_full_name;
                    $file->move($upload_path, $image_full_name);
                    $image[] = $image_url;
                }
            }
            News::insert([
                'title' => $request->title,
                'photo' => implode('|', $image),
            ]);
            return redirect(route('news.index')); 
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
        $new = News::find($id);
        $action = url('admin/news/'.$new->id);
        return view('backend.news_create_update', ['record' => $new, 'action' => $action]);
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

        $new              = News::find($id);
        $new->title       = $request->input('title');
        if($request->file('image') != ''){        
            $path = public_path()."/";
        //code for remove old file
        if($new->photo != '' && $new->photo != null){     
                 $photos = explode("|",$new->photo);
                 foreach($photos as $item) {
                    unlink($path.$item);
                 }
        }
        $image = array();
            if($files = $request->file('image')){
                foreach ($files as $file) {
                    $image_name = md5(rand(1000, 10000));
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $image_name.'.'.$ext;
                    $upload_path = 'upload/news/';
                    $image_url = $upload_path.$image_full_name;
                    $file->move($upload_path, $image_full_name);
                    $image[] = $image_url;
                }
            }
        }
        $new->photo = implode('|', $image); 
        $new->save();
        return redirect(route('news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = News::where('id', '=', $id)->delete();

        return redirect(route('news.index')); 
    }
}
