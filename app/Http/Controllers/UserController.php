<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserValidate;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy("id","asc")->paginate(5);
        
        return view('backend.users_read')->with(['data' => $data]);
    }

    /** Pagination option  */
    public function paginateUser($number)
    {
        $data = User::orderBy("id","asc")->paginate($number);
        return view('backend.users_read')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $action = url('admin/users');
        $record = User::where("id","=",$id)->first();

        return view("backend.users_update",["record"=>$record,"action"=>$action]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserValidate $request, $id)
    {
        $users = User::find($id);
        //update name
        $users->name = $request->name;
       if($request->password != ""){
                //mã hóa password
               $users->password = Hash::make($request->password);
            }
        $users->address = $request->address;
        $users->phone = $request->phone;
        $users->gender = isset($request->gender) != "" ? 1 : 0;
        $users->role = $request->role;
           if($request->photo != ''){        
            $path = public_path().'/upload/users/';
          //code for remove old file
          if($users->photo != '' && $users->photo != null){
               unlink($path.$users->photo);
          }

          //upload new file
          $image = $request->file('photo');
          $storedPath = $image->move('upload/users', $image->getClientOriginalName());
          
          if($image->getClientOriginalName() != null) 
            $users->photo = $image->getClientOriginalName(); 
          else 
            $users->photo = '';

        }
        $users->save();
        return redirect(url("admin/users"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedUsers = User::where('id', '=', $id)->delete();
        return redirect(route('users.index')); 
    }
}
