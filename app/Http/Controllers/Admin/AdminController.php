<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\AdminDatatable;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDatatable $admin)
    {
        //
        return $admin->render('admin.admins.index',['title'=>'Admin Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
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
            'email'=>'required|email|unique:admins',
            'password'=>'required:min:6'
        ],[],[
                'Name',
                'Email',
                'Password'
        ]);
        $data['password']=bcrypt(  $data['password']);

        Admin::create($data);
        session()->flash('success','Added New Admin');
        return redirect(admin_url('admin'));
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
        $admin=Admin::findOrFail($id);
        return view('admin.edit',compact('admin'));
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
            'email'=>'required|email|unique:admins,id'.$id,
            'password'=>'sometimes|nullable|min:6'
        ],[],[
                'Name',
                'Email',
                'Password'
        ]);
          if(request()->has('password')){
            $data['password']=bcrypt(  $data['password']);
          }
        
          Admin::where('id',$id)->update($data);
        session()->flash('success','Admin Information updated successfullly');
        return redirect(admin_url('admin'));

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
        Admin::where('id',$id)->delete();
        session()->flash('success','Admin deleted successfullly');
        return redirect(admin_url('admin'));
    }

    public function multi_delete(){
//return request()->all();

        if(is_array(request('item')   ) ){
            Admin::destroy(request('item'));
        }else{
            Admin::find(request('item'))->delete();
        }

       
        session()->flash('success','Admin(s) deleted successfullly');
        return redirect(admin_url('admin'));

    }
}
