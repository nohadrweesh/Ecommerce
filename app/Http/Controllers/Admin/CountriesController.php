<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CountryDatatable;
use App\Model\Country;
use Up;
use Storage;
class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CountryDatatable $country)
    {
        //
        return $country->render('admin.countries.index',['title'=>'Countries Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.Countries.create',['title'=>'Add New Country']);
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
            'country_name_ar'=>'required',
            'country_name_en'=>'required',
            'mob'=>'required',
            'code'=>'required',
            'logo'=>'required|'.validate_image()
        ],[],[
                'Arabic Country Name',
                'English Country Name',
                'Mob',
                'Code',
                'Logo'
        ]);
        $data['logo']=Up::upload([
     				//'new_name'=>'',
     				'file'=>'logo',
     				//'delete_file'=>setting()->logo,
     				'path'=>'countries',
     				'upload_type'=>'single',


     		]);
        

        Country::create($data);
        session()->flash('success','Added New Country');
        return redirect(admin_url('countries'));
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
        $country=Country::findOrFail($id);
        $title='Edit Country';
        return view('admin.countries.edit',compact('country','title'));
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
        //return request()->all();

         $data=$this->validate($request,[
            'country_name_ar'=>'required',
            'country_name_en'=>'required',
            'mob'=>'required',
            'code'=>'required',
            'logo'=>'sometimes|nullable|'.validate_image()
        ],[],[
                'Arabic Country Name',
                'English Country Name',
                'Mob',
                'Code',
                'Logo'
        ]);
        $data['logo']=Up::upload([
     				//'new_name'=>'',
     				'file'=>'logo',
     				'delete_file'=>Country::find($id)->logo,
     				'path'=>'countries',
     				'upload_type'=>'single',


     		]);
        
        
          Country::where('id',$id)->update($data);
        session()->flash('success','Country Information updated successfullly');
        return redirect(admin_url('countries'));

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
        $country=Country::where('id',$id);
        Storage::delete($country->logo);
        $country->delete();
        session()->flash('success','Admin deleted successfullly');
        return redirect(admin_url('admin'));
    }

    public function multi_delete(){

        if(is_array(request('item')   ) ){
            foreach(request('item') as $item){
                $country=Country::where('id',$item);
                Storage::delete($country->logo);
                $country->delete();

            }
        }
        else{
            $country=Country::where('id',request('item'));
            Storage::delete($country->logo);
            $country->delete();
        }
        

       
        session()->flash('success','Country(s) deleted successfullly');
        return redirect(admin_url('countries'));

    }
}
