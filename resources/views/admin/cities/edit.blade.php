@extends('admin.index')
@section('content')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{$title}}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
  	{!! Form::model($city,['id'=>'form_data','url'=>admin_url('cities/'.$city->id),'method'=>'Put','files'=>true])!!}
    <div class="form-group">
             {!!  Form::label('city_name_ar','Arabic City Name')!!}
             {!! Form::text('city_name_ar',$city->city_name_ar,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
              {!!  Form::label('city_name_en','English City Name')!!}
             {!! Form::text('city_name_en',$city->city_name_en,['class'=>'form-control'])!!}
        </div>
        <div class="form-group">

              {!!  Form::label('country_id','Country Id')!!}
             {!! Form::select('country_id',$country_ids,$city->country_id,['class'=>'form-control'])!!}
        </div>


        
         
         <div class="form-group">
        
     {!! Form::submit('Edit',['class'=>'btn btn-primary'])!!}
</div>



  
    {!!Form::close()!!}
     
   
  </div>
  <!-- /.box-body -->
</div>




@stop