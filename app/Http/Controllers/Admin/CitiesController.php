<?php

namespace App\Http\Controllers\Admin;
use App\Model\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CityDatatable;
use App\Model\City;

use Up;
use Storage;
class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CityDatatable $city)
    {
        //
        return $city->render('admin.cities.index',['title'=>'Cities Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title='Add New City';
         $country_ids=Country::pluck('country_name_'.lang(),'id');
        return view('admin.cities.create',compact('title','country_ids'));
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
            'city_name_ar'=>'required',
            'city_name_en'=>'required',
            'country_id'=>'required'
           
        ],[],[
                'Arabic City Name',
                'English City Name',
                'Country Id'
                
        ]);
       

        City::create($data);
        session()->flash('success','Added New City');
        return redirect(admin_url('cities'));
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
        $city=City::findOrFail($id);
        $title='Edit City';
        $country_ids=Country::pluck('country_name_'.lang(),'id');
        return view('admin.cities.edit',compact('city','title','country_ids'));
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
            'city_name_ar'=>'required',
            'city_name_en'=>'required',
            'country_id'=>'required'
           
        ],[],[
                'Arabic City Name',
                'English City Name',
                'Country Id'
               
        ]);
       
        
        
          City::where('id',$id)->update($data);
        session()->flash('success','CityInformation updated successfullly');
        return redirect(admin_url('cities'));

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
        $city=City::where('id',$id);
      
        $city->delete();
        session()->flash('success','City deleted successfullly');
        return redirect(admin_url('cities'));
    }

    public function multi_delete(){
//dd(request('item') );
        if(is_array(request('item')   ) ){
            foreach(request('item') as $item){
                $city=City::where('id',$item);
                
                $city->delete();

            }
        }
        else{
            $city=City::where('id',request('item'));

           
            $city->delete();
        }
        

       
        session()->flash('success','City(s) deleted successfullly');
        return redirect(admin_url('cities'));

    }
}
