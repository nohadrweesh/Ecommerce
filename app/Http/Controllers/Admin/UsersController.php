<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\UsersDatatable;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDatatable $admin)
    {
        //
        return $admin->render('admin.users.index',['title'=>'Users  Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create',['title'=>'Add new User']);
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

        $data=$this->validate($request,[
            'name'=>'required',
            'level'=>'required|in:user,vendor,company',
            'email'=>'required|email|unique:users',
            'password'=>'required:min:6'
        ],[],[
                'Name',
                'Level',
                'Email',
                'Password'
        ]);
        $data['password']=bcrypt(  $data['password']);

        User::create($data);
        session()->flash('success','Added New User');
        return redirect(admin_url('user'));
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
        //
        $admin=User::findOrFail($id);
        $title='Edit User';
        return view('admin.users.edit',compact('admin','title'));
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

          $data=$this->validate($request,[
            'name'=>'required',
            'level'=>'required|in:user,vendor,company',
            'email'=>'required|email|unique:users,id'.$id,
            'password'=>'sometimes|nullable|min:6'
        ],[],[
                'Name',
                'Level',
                'Email',
                'Password'
        ]);
          if(request()->has('password')){
            $data['password']=bcrypt(  $data['password']);
          }
        
          User::where('id',$id)->update($data);
        session()->flash('success','User Information updated successfullly');
        return redirect(admin_url('user'));

     //  return request()->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::where('id',$id)->delete();
        session()->flash('success','User deleted successfullly');
        return redirect(admin_url('user'));
    }

    public function multi_delete(){
//return request()->all();

        if(is_array(request('item')   ) ){
            User::destroy(request('item'));
        }else{
            User::find(request('item'))->delete();
        }

       
        session()->flash('success','User(s) deleted successfullly');
        return redirect(admin_url('user'));

    }
}
